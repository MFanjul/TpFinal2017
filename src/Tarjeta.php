<?php

namespace TpFinal;

class Tarjeta {
    protected $saldo;
    
    protected $dni;

    
    public function saldo() {
        return $this->saldo;
    }
    public function recargar($monto){
        if($monto==500){
        $this->saldo = $this->saldo + 640;
        }
        else{
        if($monto==272){
        $this->saldo = $this->saldo + 320;
            }
            else{
            if($monto==320){
            $this->saldo = $this->saldo + 388;
                }
                else{
                $this->saldo = $this->saldo + $monto;
                }
            }
        }
        
    }
    public function viajesRealizados(){
    }
    public function pagar(Transporte $transporte, $fecha_y_hora){
    }


}
