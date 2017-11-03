<?php

namespace TpFinal;

use PHPUnit\Framework\TestCase;

class TestTarjeta extends TestCase {

    
    	public function testSaldoCero() {
        	$tarjeta = new Tarjeta(41559067,"Normal");
        	$this->assertEquals($tarjeta->saldo(),0);
	}
   
    	public function testcincuenta(){
        	$tarjeta50 = new Tarjeta(41559067,"Normal");
        	$tarjeta50->recargar(50);
        	$this->assertEquals($tarjeta50->saldo(),50);
    	}
    	
	public function test332(){
    
        	$tarjeta332 = new Tarjeta(41559067,"Normal");
        	$tarjeta332->recargar(332);
		$this->assertEquals($tarjeta332->saldo(),388);
    
    	}
    
	
	public function test624(){
    
        	$tarjeta624 = new Tarjeta(41559067,"Normal");
        	$tarjeta624->recargar(624);
		$this->assertEquals($tarjeta624->saldo(),776);
    
    	}
    	public function testviaje() {
	 	$roja144 = new Colectivo ( "144 roja" );
		$tarjeta3 = new Tarjeta(41559067,"Normal");
        	$tarjeta3->recargar(332);
	 	$tarjeta3->pagar("Colectivo", 13.45, 14.10, $roja144);
	 	$this->assertEquals($tarjeta3->saldo(), (388-9.70));
     }
    
    
	public function testviajex2() {
		$roja144 = new Colectivo ( "144 roja" );
		$tarjeta50 = new Tarjeta(23456789, "Normal");
		$tarjeta50->recargar(50);
	    	$tarjeta50->pagar("Colectivo", 13.45, 14.10, $roja144);
	    	$tarjeta50->pagar("Colectivo", 13.45, 14.10, $roja144);
	    	$this->assertEquals( $tarjeta50->saldo(), (50-9.70-9.70));
    }
    
    
    	public function testViajeTransbordo() {
		$roja144 = new Colectivo ( "144 roja" );
        	$Q = new Colectivo ( "Q" );
		$tarjet = new Tarjeta(41559067,"Normal");
		$tarjet->recargar(50);
	    	$tarjet->pagar("Colectivo", 13.35, 14.10, $roja144);
		$tarjet->pagar("Colectivo", 13.49, 14.10, $Q);
	    	$this->assertEquals( $tarjet->saldo(), ((50-9.70)-3.20));
        
    }
        
	     
	
	public function trasbordox1viajesx2(){
		$tar1 = new Tarjeta (22345678, "Normal");
		$K = new Colectivo( "K" );
		$colectivo153 = new Colectivo( "153" );
		$tar1->recargar(50);
		$tar1->pagar("Colectivo", 13.45, 14.10, $K);
		$tar1->pagar("Colectivo", 14.00, 14.10, $colectivo153);
		$tar1->pagar("Colectivo", 14.00, 14.10, $colectivo153);
		$this->assertEquals( $tar1->saldo(), ((388-9.70)-3.20)-9.70 );
	
	}
	    
	    
	public function testbici(){
		$tar2 = new Tarjeta(34567890, "bici");
		$bici = new Bicicleta(2345);
		$tar2->recargar(332);
		$tar2->pagar("Bicicleta", 13.45, 14.11, "bici");
		$this->assertEquals( $tar2->saldo(), 388-14.55 );
	
	}
	
	public function testbicix2(){
		$tar3 = new Tarjeta(34567890, "bici");
		$bici = new Bicicleta(2345);
		$bici = new Bicicleta(7890);
		$tar3->recargar(332);
		$tar3->pagar("Bicicleta", 13.45, 14.11, "bici");
		$tar3->pagar("Bicicleta", 15.30, 14.11, "bici");
		$this->assertEquals( $tar3->saldo(), 388-14.55 );
	
	}
	    
	
	public function testvplusmedio(){
	
		$Tar = new Tarjeta(23567890, "MedioBoleto");
		$Tar->recargar(10);
		$colectivo120 = new Colectivo( "120" );
		$Tar->pagar("Colectivo",13.45, 14.11,$colectivo120);
		$Tar->pagar("Colectivo",13.45, 14.11,$colectivo120);
		$Tar->pagar("Colectivo",13.45, 14.11,$colectivo120);
		$this->assertEquals( $Tar->vplus(), 1 );
	
	
	}
	
	public function testvplustrasbordo(){
	
		$Tarta = new Tarjeta(23567890, "MedioBoleto");
		$Tarta->recargar(10);
		$colectivo359 = new Colectivo( "35/9" );
		$colectivo146 = new Colectivo( "146" );
		$Tarta->pagar("Colectivo",13.05, 14.11,$colectivo359);
		$Tarta->pagar("Colectivo",13.05, 14.11,$colectivo359);
		$Tarta->pagar("Colectivo",13.35, 14.11,$colectivo146);
		$Tarta->pagar("Colectivo",13.35, 14.11,$colectivo146);
		$this->assertEquals( $Tarta->vplus(), 2 );
}
	    
	
	
	
	
}    
