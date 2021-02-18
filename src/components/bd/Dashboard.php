<?php

//classe Dashboard
class Dashboard{
  public $data_inicio;
  public $data_fim;

  public function __get($atributo){
    return $this->$atributo;
  }
  public function __ser($atributo, $valor){
    $this->$atributo = $valor;
    return $this;
  }
}
