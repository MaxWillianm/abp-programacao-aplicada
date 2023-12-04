<?php
class DATABASE_CONFIG
{
  public $default = array(
    'datasource' => 'Database/Mysql',
    'persistent' => false,
<<<<<<< HEAD
    'host' => 'localhost', // em uso de docker 'host.docker.internal'; no XAMPP/Laragon 'localhost'
    'login' => 'root',
    'password' => '',
    'database' => 'abp_pa', // não se esqueça de definir uma dabatase própria para este novo projeto
=======
    'host' => 'localhost', 
    'login' => 'root',
    'password' => '',
    'database' => 'abp_pa',
>>>>>>> 5ef38173baac4cdc74979bba481b30bc561084e8
    'encoding' => 'UTF8',
  );

}
