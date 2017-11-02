<?php

namespace TpFinal;

class Bicicleta {
    protected $id;
    public function __construct ($id) {
        $this->id = $id;
    }
    public function mostrarId(){
    return $this->id;
  }
}
