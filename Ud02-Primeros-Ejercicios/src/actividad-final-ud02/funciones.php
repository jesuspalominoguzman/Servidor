<?php

function calcularSubtotal(float $precio, int $cantidad): float {
    return $precio * $cantidad;
}

function obtenerDescuento(string $tipoCliente): int {
    if ($tipoCliente === 'estudiante') {
        return 10;
    } else {
        return 0;
    }
}

function calcularDescuento(float $subtotal, int $porcentaje): float {
    return $subtotal * ($porcentaje / 100);
}

function calcularIVA(float $base, float $porcentaje = 21): float {
    return $base * ($porcentaje / 100);
}

function formatearPrecio(float $importe): string {
    return number_format($importe, 2, ',', '.') . ' €';
}

?>