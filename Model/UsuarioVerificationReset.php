<?php 
App::uses('AppModel', 'Model');

class UsuarioVerificationReset extends AppModel
{
    public $name = 'UsuarioVerificationReset';
    public $useTable = 'usuario_verification_resets';
    
    public $belongsTo = array(
        'Usuario' => array(
            'className' => 'Usuario',
            'foreignKey' => 'user_id',
        )
    );
}
?>