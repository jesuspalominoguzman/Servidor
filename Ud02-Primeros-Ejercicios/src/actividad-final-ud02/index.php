<?php
require_once __DIR__ . '/productos.php';
require_once __DIR__ . '/funciones.php';

require_once __DIR__ . '/encabezado.php';

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nombre</th><th>Categoria</th><th>Precio Unitario</th></tr>";
foreach ($productos as $clave => $producto) {
    echo "<tr>";
    echo "<td>" . $clave . "</td>";
    echo "<td>" . htmlspecialchars($producto["nombre"]) . "</td>";
    echo "<td>" . htmlspecialchars($producto["categoria"]) . "</td>";
    echo "<td>" . number_format($producto["precio unitario"], 2, ',', '.') . " €</td>";
    echo "</tr>";
}
echo "</table>";

echo "El total de productos es: " . count($productos);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad Final</title>
</head>
<body>

    <h2>Calculadora de Presupuesto</h2>

    <form action="" method="POST">
        
        <div>
            <label for="nombre">Nombre del cliente:</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>

        <div>
            <label for="producto">Producto:</label>
            <select name="producto" id="producto">
                <?php
                foreach ($productos as $id => $datos) {
                    echo "<option value='" . htmlspecialchars($id) . "'>" . htmlspecialchars($datos['nombre']) . "</option>";
                }
                ?>
            </select>
        </div>

        <div>
            <label for="cantidad">Cantidad:</label>
            <select name="cantidad" id="cantidad">
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
        </div>

        <div>
            <label>Tipo de cliente:</label>
            <input type="radio" name="tipo_cliente" id="particular" value="particular" checked>
            <label for="particular">Particular</label>
            
            <input type="radio" name="tipo_cliente" id="estudiante" value="estudiante">
            <label for="estudiante">Estudiante</label>
        </div>

        <div>
            <label for="observaciones">Observaciones (opcional):</label><br>
            <textarea name="observaciones" id="observaciones" rows="4" cols="50"></textarea>
        </div>

        <div>
            <button type="submit">Calcular presupuesto</button>
        </div>

    </form>

    <?php

    
    $errores = [];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
        $nombre = trim($_POST['nombre'] ?? '');
        if ($nombre === '') {
            $errores[] = "El nombre del cliente no puede estar vacío.";
        }

        $id_producto = $_POST['producto'] ?? '';
        if (!array_key_exists($id_producto, $productos)) {
            $errores[] = "El producto seleccionado no existe en el catálogo.";
        }

        $cantidad = $_POST['cantidad'] ?? '';
        if (!is_numeric($cantidad) || $cantidad < 1 || $cantidad > 10 || $cantidad != (int)$cantidad) {
            $errores[] = "La cantidad debe ser un número entero entre 1 y 10.";
        } else {
            $cantidad = (int)$cantidad;
        }

        $tipo_cliente = $_POST['tipo_cliente'] ?? '';
        if ($tipo_cliente !== 'particular' && $tipo_cliente !== 'estudiante') {
            $errores[] = "El tipo de cliente no es válido. Debe ser 'particular' o 'estudiante'.";
        }

        $observaciones = trim($_POST['observaciones'] ?? '');

        if (empty($errores)) {

        $precio_producto = $productos[$id_producto]['precio unitario']; 
        
        $subtotal = calcularSubtotal($precio_producto, $cantidad);

        $porcentaje_descuento = obtenerDescuento($tipo_cliente);

        $importe_descuento = calcularDescuento($subtotal, $porcentaje_descuento);

        $base = $subtotal - $importe_descuento;

        $importe_iva = calcularIVA($base);

        $total = $base + $importe_iva;
        

  
        echo "<div class='resultado'>";
        echo "<h2>Presupuesto generado para: " . htmlspecialchars($nombre) . "</h2>";
        
        echo "<table>";
        $nombre_prod = $productos[$id_producto]['nombre'];
        $categoria_prod = $productos[$id_producto]['categoria'];
        
        echo "<tr><th>Producto</th><td>" . htmlspecialchars($nombre_prod) . " (" . htmlspecialchars($categoria_prod) . ")</td></tr>";
        echo "<tr><th>Tipo de cliente</th><td>" . htmlspecialchars(ucfirst($tipo_cliente)) . "</td></tr>";
        echo "<tr><th>Precio y cantidad</th><td>" . formatearPrecio($precio_producto) . " x $cantidad ud(s).</td></tr>";
        echo "<tr><th>Subtotal</th><td>" . formatearPrecio($subtotal) . "</td></tr>";
        
        echo "<tr><th>Descuento ($porcentaje_descuento%)</th><td>- " . formatearPrecio($importe_descuento) . "</td></tr>";
        
        echo "<tr><th>Base Imponible</th><td>" . formatearPrecio($base) . "</td></tr>";
        echo "<tr><th>IVA (21%)</th><td>" . formatearPrecio($importe_iva) . "</td></tr>";
        echo "<tr><th>TOTAL PRESUPUESTO</th><td><strong>" . formatearPrecio($total) . "</strong></td></tr>";
        echo "</table>";

        if ($observaciones !== '') {
            echo "<h3>Observaciones:</h3>";
            echo "<p style='background: #fff; padding: 10px; border: 1px dashed #ccc;'>" . nl2br(htmlspecialchars($observaciones)) . "</p>";
        }
        
        echo "</div>";
            
        } else {
            echo "<h3>Atención: Revisa los siguientes errores</h3>";
            echo "<ul>";
            foreach ($errores as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
            echo "</div>";
        }
    }

    
    require_once __DIR__ . '/pie.php';


    ?>
        
</body>
</html>

