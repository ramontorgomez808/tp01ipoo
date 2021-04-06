<?php
class Teatro{
    private $nombre;
    private $direccion;
    private $funciones4=array();
    public function __construct($nombreE,$direccionE,$funcionesE){
        $this->nombre=$nombreE;
        $this->direccion=$direccionE;
        $this->funciones4=$funcionesE;
    }

        public function getNombre(){
        return $this->nombre;
        }
        public function getDireccion(){
            return $this->direccion;
        }
        public function getFunciones(){
            return $this->funciones4;
        }
    
        public function setNombre($nombre){
            $this->nombre=$nombre;
        }
        public function setDireccion($direccion){
            $this->direccion=$direccion;
        }
        public function setFunciones($funciones){
            $this->funciones4=$funciones;
        }

}