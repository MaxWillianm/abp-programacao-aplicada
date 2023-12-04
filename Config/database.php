<?php
class DATABASE_CONFIG
{
  public $default = array(
    'datasource' => 'Database/Mysql',
    'persistent' => false,
    'host' => 'localhost', // em uso de docker 'host.docker.internal'; no XAMPP/Laragon 'localhost'
    'login' => 'root',
    'password' => '',
    'database' => 'abp_pa', // não se esqueça de definir uma dabatase própria para este novo projeto
    'encoding' => 'UTF8',
  );

}
