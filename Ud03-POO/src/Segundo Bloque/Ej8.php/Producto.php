<?php

class Producto {
    private string $nombre;
    private float $precio;

    public function __construct(string $nombre, float $precio) {

        $this->nombre = trim($nombre);

        if ($nombre === '') {
            throw new InvalidArgumentException("El nombre no puede estar vacío");
        }

        $this->precio = $precio;

        if ($precio < 0) {
            throw new InvalidArgumentException("El precio no puede ser negativo");
        }


    }
    


    public function getNombre(): string {        
        return $this->nombre;
    }

    public function getPrecio(): float {
        return $this->precio;
    }

    public function setPrecio(float $nuevoPrecio): bool {
        if ($nuevoPrecio < 0) {
            return false;
        }else{
            $this->precio = $nuevoPrecio;
            return true;
        }

    }

    public function calcularImporte(int $cantidad): float {

            if ($cantidad < 0) {
                throw new InvalidArgumentException("El cantidad no puede ser negativa");
            }else{
                return $this->precio * $cantidad;
            }

        
    }

}   

?>

