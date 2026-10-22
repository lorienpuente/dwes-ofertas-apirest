<?php

class Prenda {
    public $marca;
    public $tipo;

    public function __construct($marca, $tipo) {
        $this->marca = $marca;
        $this->tipo = $tipo;
    }
}