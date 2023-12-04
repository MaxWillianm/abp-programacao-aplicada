<?php
class NoticiaTag extends AppModel {

	public $useTable = 'noticia_tags';
	public $displayField = 'name';

  public function saveTags($tags=array(), $noticia_id)
  {
    $this->deleteAll(array('NoticiaTag.noticia_id' => $noticia_id));

    foreach($tags as $tag)
    {
      $tag = trim($tag);
      if($tag === "") continue;

      $tagData = array(
        'noticia_id' => $noticia_id,
        'name' => $tag
      );

      $this->create();
      $this->save($tagData);
    }
  }

  public function getTags()
  {
    $tags = $this->find('list', array(
      'conditions' => array(
        'TRIM(NoticiaTag.name) <>' => ''
      ),
      'group' => array(
        'NoticiaTag.name'
      ),
      'recursive' => -1
    ));

    $_tags = array();
    foreach($tags as $tag)
    {
      $_tags[] = array(
        'value' => $tag,
        'text' => $tag
      );
    }

    return $_tags;
  }

}
