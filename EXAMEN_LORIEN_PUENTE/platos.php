<?php

class platos
{
    public $nombre;
    public $precio;

    function __construct($nombre, $precio)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }
}
?>