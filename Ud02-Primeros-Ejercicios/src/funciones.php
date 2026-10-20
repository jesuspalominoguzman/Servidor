<?php
function aplicarDescuento(float $precio, float $porcentaje): float {
    return $precio - ($precio * ($porcentaje / 100));
}

function formatearPrecio(float $precio): string {
    return number_format($precio, 2, ',', '.') . ' €';
}