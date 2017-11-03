<?php


namespace TpFinal;

use PHPUnit\Framework\TestCase;

class BicicletaTest extends TestCase {
    public function mostrarId(){
        $bici= new Bicicleta(5678);
        $this->assertEquals($bici->mostrarId(),5678);
    }
    
    }
