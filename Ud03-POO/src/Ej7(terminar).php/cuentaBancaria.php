<?php

class CuentaBancaria {
    private string $titular;
    private float $saldo;

    public function __construct(string $titular, float $saldo = 0.0) {
        $this->titular = trim($titular);
        $this->saldo = $saldo;
        
        
        if ($titular === '') {
            throw new Exception("El titular no puede estar vacío");
        }

        if ($saldo < 0) {
            throw new Exception("El saldo no puede ser negativo");
        }


    }
    


    public function getTitular(): string {
        return $this->titular;
    }

    public function getSaldo(): float {
        return $this->saldo;
    }

    public function ingresar(float $importe): bool {

    if ($importe > 0) {

        $this->saldo += $importe;

        return true;

    }else {
        echo "El importe no puede ser negativo";

        return false;

    }
        
    }


    public function retirar(float $importe): bool {

    if ($importe > $this->saldo || $importe <= 0) {
        echo "No hay suficiente saldo";

        return false;

    }else{

        $this->saldo -= $importe;

        return true;
    }
        
    }

}
?>

