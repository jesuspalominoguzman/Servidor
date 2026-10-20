<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Aquí escapamos el título que definiremos previamente en index.php -->
    <title><?php echo htmlspecialchars($titulo ?? 'Tienda Informática'); ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
        table { border-collapse: collapse; width: 100%; max-width: 600px; margin-bottom: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; width: 40%; }
        .error { color: #d8000c; background-color: #ffd2d2; border: 1px solid #d8000c; padding: 10px; margin-bottom: 20px; }
        .resultado { background-color: #eef9f1; border: 1px solid #4caf50; padding: 20px; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Catálogo y Presupuestos</h1>

</body>
</html>