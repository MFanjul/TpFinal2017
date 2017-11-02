<?php

namespace TpFinal;

Class Colectivo {
public $linea;
public function __construct($linea) {
$this->linea=$linea;
}

  public function mostrarlinea(){
    return $this->linea;
  }
}
