<?php
class NoticiaFoto extends AppModel
{

  public $useTable = 'noticia_fotos';
  public $displayField = 'name';

  public $actsAs = array(
    'Uploader' => array(
      'files' => array(
        'img' => array('type' => 'file', 'src' => 'media/noticias/:clean_filename_:id.jpg', 'virtual' => false),
      ),
    ),
  );

  public $belongsTo = array(
    'Noticia' => array(
      'className' => 'Noticia',
      'foreignKey' => 'noticia_id',
    ),
  );

  public $order = array(
    'FIELD(NoticiaFoto.default, \'Y\', \'N\')',
    'NoticiaFoto.order ASC',
    'NoticiaFoto.created DESC',
  );

}
