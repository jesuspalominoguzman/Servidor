<?php

class Libro {
    public string $titulo = '';
    public string $autor = '';
    public int $paginas = 0;


    public function obtenerFicha(): string {

        return nl2br(
            "Titulo: $this->titulo\n" .
            "Autor: $this->autor\n" .
            "Número de páginas: $this->paginas\n"
        );

}

}
?>

