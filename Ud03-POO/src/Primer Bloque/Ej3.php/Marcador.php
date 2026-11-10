<?php

class Marcador {
    public int $puntos = 0;


    public function anotarPunto(): void {

        $this->puntos++;

    }

    public function reiniciar(): void {

        $this->puntos = 0;

    }

    public function obtenerPuntos(): int {

        return $this->puntos;

    }

}
?>

