<?php
declare(strict_types=1);

class Categoria
{
    public function __construct(private string $nombre)
    {
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }
}

class Articulo
{
    public const IVA = 0.21;

    // HUECO 1: static (el contador es compartido por toda la clase)
    private static int $totalCreados = 0;

    private float    $precio;
    private Categoria $categoria;

    public function __construct(float $precio, Categoria $categoria)
    {
        $this->precio    = $precio;
        // HUECO 2: $categoria (guardar el objeto recibido)
        $this->categoria = $categoria;
        // HUECO 3: self::$totalCreados (incrementar el contador de clase)
        self::$totalCreados++;
    }

    public function getCategoria(): Categoria
    {
        return $this->categoria;
    }

    public function calcularPrecioConIva(): float
    {
        // HUECO 4: self::IVA (usar la constante de clase)
        return $this->precio * (1 + self::IVA);
    }

    public static function getTotalCreados(): int
    {
        return self::$totalCreados;
    }
}

$categoria = new Categoria('Periféricos');
$articulo1 = new Articulo(100.0, $categoria);
$articulo2 = new Articulo(50.0,  $categoria);

$articulos = [$articulo1, $articulo2];

foreach ($articulos as $articulo) {
    echo htmlspecialchars(
        // HUECO 5: getNombre() (método del objeto Categoria)
        $articulo->getCategoria()->getNombre(),
        ENT_QUOTES,
        'UTF-8'
    );
    echo ': ';
    echo number_format($articulo->calcularPrecioConIva(), 2, ',', '.');
    echo ' €<br>';
}

// HUECO 6: Articulo::getTotalCreados() (consultar el contador sin usar un artículo concreto)
echo 'Artículos creados: ' . Articulo::getTotalCreados();

/*
 * RESPUESTAS:
 * Hueco 1: static
 * Hueco 2: $categoria
 * Hueco 3: self::$totalCreados
 * Hueco 4: self::IVA
 * Hueco 5: getNombre()
 * Hueco 6: Articulo::getTotalCreados()
 *
 * ¿Cuántos objetos se han creado en total? 3 (1 Categoria + 2 Articulo).
 * Si al final añadimos $otro = $articulo1; ¿aumenta el contador? NO.
 *   La asignación crea una nueva variable que apunta al MISMO objeto;
 *   no llama al constructor, por lo que el contador no se incrementa.
 */
