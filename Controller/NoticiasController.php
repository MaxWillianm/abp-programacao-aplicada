<?php
App::uses('AppController', 'Controller');

class NoticiasController extends AppController
{

  public $uses = array('Noticia', 'NoticiaFoto', 'NoticiaTag');
  public $components = array('RequestHandler');

  public $paginate = array(
    'Noticia' => array(
      'order' => 'Noticia.data DESC',
      'limit' => 50,
    ),
  );

  /* ACTIONS */
  public function index()
  {
    $this->Noticia->setListBinds();

    $conditions = array(
      'Noticia.data <=' => date('Y-m-d H:i:s'),
      'Noticia.ativo' => 'S',
    );
    if (!empty($this->request->params['named']['tag']))
    {
      $this->Noticia->bindModel(array(
        'hasOne' => array(
          'NoticiaTag' => array(
            'className' => 'NoticiaTag',
            'foreignKey' => 'noticia_id',
          ),
        ),
      ), false);

      $conditions['NoticiaTag.name LIKE'] = "%{$this->request->params['named']['tag']}%";

      $title = "#{$this->request->params['named']['tag']}";
    }
    else
    {
      $title = "Notícias";
    }

    $this->Paginator->settings = array(
      'fields' => $this->Noticia->listFields,
      'conditions' => $conditions,
      'order' => array(
        'Noticia.data DESC',
        'Noticia.created ASC',
      ),
      'group' => 'Noticia.id',
      'limit' => 36,
    );

    $noticias = $this->paginate('Noticia');
    $this->set(compact('noticias', 'title'));
  }

  public function view($slug)
  {
    $custom_js = array();
    $slug = explode('-', $slug);
    $id = end($slug);
    $previewKey = null;

    $conditions = array(
      'Noticia.id' => $id,
    );
    if (!isset($this->request->params['named']['preview']))
    {
      $conditions = array_merge($conditions, array(
        'Noticia.data <=' => date('Y-m-d H:i:s'),
        'Noticia.ativo' => 'S',
      ));
    }
    else
    {
      $previewKey = $this->request->params['named']['preview'];
    }

    $noticia = $this->Noticia->find('first', array(
      'conditions' => $conditions,
      'contain' => array(
        'NoticiaFoto' => array(
          'conditions' => array(
            'NoticiaFoto.ativo' => 'Y',
          ),
        ),
        'NoticiaTag',
      ),
    ));
    if (empty($noticia))
    {
      throw new NotFoundException('Conteúdo indisponível ou não encontrado.');
    }

    /* CHECAGEM DE ACESSO VIA PREVIEW DO ADMIN */
    if (!empty($previewKey) && $previewKey !== md5($noticia['Noticia']['id']))
    {
      throw new UnauthorizedException('Conteúdo indisponível ou não encontrado.');
    }

    $title = array();
    $title[] = $noticia['Noticia']['name'];
    $title[] = "Notícias";

    $title = implode(' - ', $title);

    $thumb_page = !empty($noticia['NoticiaFoto'][0]['img']) ? "/{$noticia['NoticiaFoto'][0]['img']}" : null;
    $description_for_layout = Util::truncate(strip_tags($noticia['Noticia']['texto']), 200);
    $this->set(compact('noticia', 'description_for_layout', 'thumb_page', 'title', 'custom_js'));
  }

  /* ADMIN */
  public function admin_index()
  {
    $this->Noticia->setListBinds();

    $this->Paginator->settings['Noticia'] = array(
      'fields' => $this->Noticia->listFields,
      'order' => array(
        "Noticia.data DESC",
        "Noticia.created ASC",
      ),
      'group' => 'Noticia.id',
      'limit' => 50,
    );

    $conditions = $this->getSearchConditions();

    if (!empty($this->request->named))
    {
      if (isset($this->request->named['as']))
      {
        $conditions[] = array('Noticia.ativo' => 'S');
      }
      if (isset($this->request->named['an']))
      {
        $conditions[] = array('Noticia.ativo' => 'N');
      }
    }

    $items = $this->Paginator->paginate('Noticia', $conditions);
    $this->set(compact('items'));
  }

  public function admin_image_update($field, $id)
  {
    Configure::write("debug", 0);

    $this->autoRender = false;

    header("Pragma: no-cache");
    header("Cache-Control: no-store, no-cache, max-age=0, must-revalidate");
    header('Content-Type: application/json; charset=' . Configure::read('App.encoding'));

    if ($field == "delete")
    {
      $this->NoticiaFoto->id = $id;
      if ($this->NoticiaFoto->delete())
      {
        echo json_encode(array("deleted" => true));
      }
      else
      {
        echo json_encode(array("error" => true));
      }

      exit;
    }

    if ($field == "default")
    {
      if (empty($this->request->data['NoticiaFoto']['noticia_id']))
      {
        exit;
      }

      $this->NoticiaFoto->updateAll(array(
        "NoticiaFoto.default" => "'N'",
      ), array(
        "NoticiaFoto.noticia_id" => $this->request->data['NoticiaFoto']['noticia_id'],
      ));
    }

    if (isset($this->request->data['NoticiaFoto'][$field]))
    {
      $this->NoticiaFoto->id = $id;
      if ($this->NoticiaFoto->saveField($field, $this->request->data['NoticiaFoto'][$field]))
      {
        echo json_encode($this->request->data['NoticiaFoto']);
      }
      else
      {
        echo json_encode(array("error" => true));
      }
    }
    else
    {
      echo json_encode(array("error" => true));
    }
    exit;
  }

  public function admin_add()
  {
    if (!empty($this->request->data['Noticia']))
    {
      $psubtitles = !empty($this->request->data['NoticiaFotoTemp']) ? $this->request->data['NoticiaFotoTemp'] : array();

      $tags = explode(',', $this->request->data['Noticia']['tags']);
      unset($this->request->data['Noticia']['tags']);

      $this->request->data['Noticia']['img_content'] = json_encode(Util::extractImages($this->request->data['Noticia']['texto']));

      $this->Noticia->create();
      if ($this->Noticia->save($this->request->data['Noticia']))
      {
        $this->registerAudit("add", sprintf("Criação: %s", $this->request->data['Noticia']['name']), array(
          "entity" => "Noticia",
          "entity_id" => $this->Noticia->id,
        ));

        $this->NoticiaTag->saveTags($tags, $this->Noticia->id);

        $images = $this->NoticiaFoto->fileform2data($this->request->params['form'], array("noticia_id" => $this->Noticia->id));
        foreach ($images as $i => $img)
        {
          if (!is_uploaded_file($img['img']['tmp_name']))
          {
            continue;
          }

          /* INJETANDO LEGENDAS */
          if (isset($psubtitles[$i]) && !empty($psubtitles[$i]['name']))
          {
            $img['name'] = $psubtitles[$i]['name'];
          }

          if ($i === 0)
          {
            $img['default'] = 'Y';
          }

          $this->NoticiaFoto->create();
          $this->NoticiaFoto->save($img);
        }

        Util::clearCache();
        Util::clearSpecificCache("Noticia", $this->Noticia->id);

        $returnData = array(
          "success" => true,
          "error" => false,
          "message" => "Dados atualizados com sucesso",
          "redirect_url" => $this->autoReferer(array('action' => 'index')),
        );

        $this->Flash->success($returnData['message']);

        /* RESPONDING AJAX SUCCESS */
        if ($this->request->is('ajax'))
        {
          $this->response->type('json');

          $this->set($returnData);
          $this->set('_serialize', array_keys($returnData));
          return;
        }

        /* RESPONDING NORMAL REQUEST */
        return $this->redirect($returnData['redirect_url']);
      }
      else
      {
        $returnData = array(
          "success" => false,
          "error" => true,
          "validationErrors" => $this->Noticia->validationErrors,
        );

        /* RESPONDING AJAX SUCCESS */
        if ($this->request->is('ajax'))
        {
          $this->response->type('json');

          $this->set($returnData);
          $this->set('_serialize', array_keys($returnData));
          return;
        }
      }
    }

    $tagsOptions = $this->NoticiaTag->getTags();
    $add = true;

    $this->set(compact('tagsOptions', 'add'));
    $this->render('admin_edit');
  }

  public function admin_edit($id)
  {
    if (!empty($this->request->data['Noticia']['name']))
    {
      $psubtitles = !empty($this->request->data['NoticiaFotoTemp']) ? $this->request->data['NoticiaFotoTemp'] : array();

      $tags = explode(',', $this->request->data['Noticia']['tags']);
      unset($this->request->data['Noticia']['tags']);

      $this->request->data['Noticia']['img_content'] = json_encode(Util::extractImages($this->request->data['Noticia']['texto']));

      if ($this->Noticia->save($this->request->data['Noticia']))
      {
        $this->registerAudit("edit", sprintf("Edição: %s", $this->request->data['Noticia']['name']), array(
          "entity" => "Noticia",
          "entity_id" => $id,
          "data" => $this->request->data['Noticia'],
          "skip" => array("visitas", "slug"),
        ), true);
        $this->NoticiaTag->saveTags($tags, $id);

        $images = $this->NoticiaFoto->fileform2data($this->request->params['form'], array("noticia_id" => $id));
        foreach ($images as $i => $img)
        {
          if (!is_uploaded_file($img['img']['tmp_name']))
          {
            continue;
          }

          /* INJETANDO LEGENDAS */
          if (isset($psubtitles[$i]) && !empty($psubtitles[$i]['name']))
          {
            $img['name'] = $psubtitles[$i]['name'];
          }

          $this->NoticiaFoto->create();
          $this->NoticiaFoto->save($img);
        }

        Util::clearCache();
        Util::clearSpecificCache("Noticia", $id);

        $returnData = array(
          "success" => true,
          "error" => false,
          "message" => "Dados atualizados com sucesso",
          "redirect_url" => $this->autoReferer(array('action' => 'index')),
        );

        $this->Flash->success($returnData['message']);

        /* RESPONDING AJAX SUCCESS */
        if ($this->request->is('ajax'))
        {
          $this->response->type('json');

          $this->set($returnData);
          $this->set('_serialize', array_keys($returnData));
          return;
        }

        /* RESPONDING NORMAL REQUEST */
        return $this->redirect($returnData['redirect_url']);
      }
      else
      {
        $returnData = array(
          "success" => false,
          "error" => true,
          "validationErrors" => $this->Noticia->validationErrors,
        );

        /* RESPONDING AJAX SUCCESS */
        if ($this->request->is('ajax'))
        {
          $this->response->type('json');

          $this->set($returnData);
          $this->set('_serialize', array_keys($returnData));
          return;
        }
      }
    }

    $this->request->data = $this->Noticia->find('first', array(
      'conditions' => array(
        'Noticia.id' => $id,
      ),
    ));
    if (empty($this->request->data))
    {
      $this->flash('Cadastro de Notícia não encontrado', $this->referer(), 'alert');
      return;
    }

    $this->freezeState('Noticia', $id, $this->request->data);

    $tags = implode(',', Hash::extract($this->request->data, 'NoticiaTag.{n}.name'));
    $tagsOptions = $this->NoticiaTag->getTags();
    $add = false;

    $this->set(compact('tags', 'tagsOptions', 'add'));
  }

  public function admin_delete($id)
  {
    $label = $this->Noticia->find('label', array('conditions' => compact('id')));

    $this->Noticia->id = $id;
    if ($this->Noticia->delete())
    {
      $this->unfreezeState("Noticia", $id);

      $this->registerAudit("delete", sprintf("Exclusão: %s", $label), array(
        "entity" => "Noticia",
        "entity_id" => $id,
      ));

      Util::clearCache();
      Util::clearSpecificCache("Noticia", $id);

      $this->flash('Cadastro de Notícia deletado com sucesso', $this->autoReferer(array('action' => 'index')), 'success');
      return;
    }
  }

}
