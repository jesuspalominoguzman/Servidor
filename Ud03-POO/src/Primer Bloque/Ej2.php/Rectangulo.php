<?php

class Rectangulo {
    public float $base = 0.0;
    public float $altura = 0.0;


    public function calcularArea(): float {

        return $this->base * $this->altura;

    }   

    public function calcularPerimetro(): float {

        return 2 * ($this->base + $this->altura);

    }   


    public function esCuadrado(): bool {

        return $this->base == $this->altura;

    }   

}
?>

