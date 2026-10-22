<?php

class Ejemplar {
    public $tipoPrenda;
    public $color;
    public $talla;
    public $stock;

    public function __construct($tipoPrenda, $color, $talla, $stock) {
        $this->tipoPrenda = $tipoPrenda;
        $this->color = $color;
        $this->talla = $talla;
        $this->stock = $stock;
    }
}