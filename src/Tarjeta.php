<?php
namespace TpFinal;

class Tarjeta {
    protected $saldo; 
    protected $dni;
    protected $tipo;
    public $vplus; //test
    protected $horaviaje;
    protected $horaant;
    protected $diaviaje;
    protected $diaant;
    public $lineas; //test
    protected $lineasant;
    public function __construct($dni, $tipos){
    $this->saldo = 0;
    $this->dni = $dni;
    $this->horaant = 10.91;
    $this->diaant = 32.13;
    $this->lineasant = 0;
    $this->tipo = $tipos; //LOS TIPOS SON NORMAL, MEDIO BOLETO O BICI, ES PARA HACER LAS FUNCIONES DESPUES
    $this->vplus = 0; //ESTO ES PARA VER CUANTOS VIAJES PLUS LE QUEDAN, SE VA MODIFICANDO CON LAS FUNCIONES, Y VUELVE A 0 CUANDO SE LE CARGA MAS SALDO DE LO QUE SE DEBE
}
    public function saldo() {
        return $this->saldo;
    }
    public function recargar($monto){
        if($monto==332){
        $this->saldo = $this->saldo + 388;
        $this->saldo = $this->saldo - ($this->vplus * 9.70);
        $this->vplus = 0;
        }
        else{
        if($monto==624){
        $this->saldo = $this->saldo + 776;
        $this->saldo = $this->saldo - ($this->vplus * 9.70);
        $this->vplus = 0;
            }
            else{
            if($monto==10 || $monto==20 || $monto==30 || $monto==50 || $monto==100){
            $this->saldo = $this->saldo + $monto;
                if($monto==10){
                    if($this->vplus != 0){
                        $this->saldo = $this->saldo - 9.70;
                        $this->vplus = $this->vplus - 1;
                        }
                    }
                    else{                       
                        $this->saldo = $this->saldo - ($this->vplus * 9.70);
                        $this->vplus = 0;
                    }
                }
                else{
                return "Seleccione un monto valido para cargar saldo";
                }
            }
        }
    }
    public function pagar($transporte, $hora, $dia, $linea){ 
        $this->horaviaje = $hora;
	$this->diaviaje = $dia;
	$this->lineas = $linea;
	if($transporte == "Colectivo"){
	    if($this->diaviaje == $this->diaant && ($this->horaviaje-$this->horaant)<0.30 && $this->lineas != $this->lineasant){
                $this->trasbordo();
		}
	    else{
	        if( $this->tipo == "Normal" ){
                    $this->normal();
        }
        if( $this->tipo == "MedioBoleto" ){
            $this->medio(); 
        }   
	    }
        }	
        if($this->tipo == "bici"){
	    $this->bici();
    	}		
	    $this->horaant = $this->horaviaje;
	    $this->diaant = $this->diaviaje;
	    $this->lineasant = $this->lineas;
    }
    public function normal(){
        if($this->saldo < 9.70){
            $this->plus();
        }
        else{
            $this->saldo = $this->saldo - 9.70;
        }
    }
    public function medio(){
        if($this->saldo < 4.85){
            $this->plus();
        }
        else{
            $this->saldo = $this->saldo - 4.85;
        }
    }
    public function plus(){
        if($this->vplus == 2){
            return "Su saldo es insuficiente para viajar";
        }
        else{
            $this->vplus = $this->vplus + 1;
        }
    }
    public function trasbordo(){
        if($this->tipo == "MedioBoleto"){
	    if($this->saldo < 1.60){
	        $this->plus();
	 }
		else{
		    $this->saldo = $this->saldo - 1.60;
		}
	}
	    else{
	        if($this->saldo < 3.20){
	            $this->plus();
	 }
		else{
		    $this->saldo = $this->saldo - 3.20;
		}
	    }
    }
    public function bici(){
	    if($this->diaviaje != $this->diaant){
	        if($this->saldo > 14.55){
	            $this->saldo = $this->saldo - 14.55;
	    }
		else{
		    return "saldo insuficiente";
		    }
	    }
	    else{
	        return "retire su bicicleta";
	    }	    
    }
}
