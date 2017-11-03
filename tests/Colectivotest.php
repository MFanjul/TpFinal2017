<?php

namespace TpFinal;

use PHPUnit\Framework\TestCase;

class ColectivoTest extends TestCase {
  
  public function testLineaYEmpresa(){
    $colectivo= new Colectivo("144 negro");
    $this->assertEquals($cole->mostrarLinea(),"122 negro");
    
    }
    
    }
