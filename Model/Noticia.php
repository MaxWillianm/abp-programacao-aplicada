<?php
class Noticia extends AppModel
{

	public $useTable = 'noticias';
	public $displayField = 'name';

	public $actsAs = array(
		'Containable',
		'Sluggable',
		'Uploader' => array(
			'files' => array(),
		),
	);

	public $order = array(
		"Noticia.data DESC",
		"Noticia.created ASC",
	);

	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => 'notBlank',
				'message' => 'Informe um título para o sua Notícia',
				'allowEmpty' => false,
			),
		),
	);

	public $hasMany = array(
		'NoticiaFoto' => array(
			'className' => 'NoticiaFoto',
			'foreignKey' => 'noticia_id',
			'order' => array(
				'FIELD(NoticiaFoto.default, \'Y\', \'N\') ASC',
				'NoticiaFoto.order ASC',
				'NoticiaFoto.created DESC',
			),
			'dependent' => true,
		),
		'NoticiaTag' => array(
			'className' => 'NoticiaTag',
			'foreignKey' => 'noticia_id',
			'dependent' => true,
		),
	);

	public $listFields = array(
		'Noticia.id',
		'Noticia.data',
		'Noticia.name',
		'Noticia.ativo',
		'NoticiaFoto.id',
		'NoticiaFoto.name',
		'NoticiaFoto.img',
	);

	public function setListBinds()
	{
		$this->unbindModel(array(
			'hasMany' => array('NoticiaFoto', 'NoticiaTag'),
		), false);

		$this->bindModel(array(
			'hasOne' => array(
				'NoticiaFoto' => array(
					'className' => 'NoticiaFoto',
					'foreignKey' => 'noticia_id',
					'type' => 'LEFT OUTER',
					'fields' => array(
						'NoticiaFoto.id',
						'NoticiaFoto.noticia_id',
						'NoticiaFoto.name',
					),
					'conditions' => array(
						'NoticiaFoto.ativo' => 'Y',
					),
					'order' => array(
						'FIELD(NoticiaFoto.default, \'Y\', \'N\')',
						'NoticiaFoto.order ASC',
						'NoticiaFoto.created DESC',
					),
				),
			),
		), false);
	}

}
