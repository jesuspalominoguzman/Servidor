# Actividad Final Unidad 3: Tienda Informática (Catálogo Orientado a Objetos)

- **Módulo:** Desarrollo Web en Entorno Servidor (DWES)
- **Curso:** 2.º DAW
- **Finalidad:** Aplicación orientada a objetos en PHP para la gestión de un catálogo de productos físicos y digitales, calculando importes con gastos de envío basados en polimorfismo y gestionando operaciones de stock con control de excepciones.

---

## 1. Instrucciones de ejecución

Para ejecutar este proyecto en el entorno de desarrollo (Docker Apache/PHP o servidor embebido de PHP):

1. Situarse en la carpeta raíz del proyecto o montar el volumen en el contenedor Docker:
   ```bash
   cd actividad-final-ud3
   ```
2. Si se utiliza el servidor integrado de PHP para pruebas locales:
   ```bash
   php -S localhost:8000
   ```
3. Abrir en el navegador:
   - **Catálogo principal y operaciones:** `http://localhost:8000/index.php`
   - **Batería de pruebas automatizadas:** `http://localhost:8000/pruebas.php`

---

## 2. Responsabilidad de cada clase e interfaz

- **`Describible`**: Interfaz común que define el contrato formal para que cualquier clase proporcione una descripción textual mediante `obtenerDescripcion(): string`.
- **`Categoria`**: Modela una categoría de productos (nombre) e implementa `Describible` para identificar el tipo de elemento.
- **`Producto`**: Clase abstracta base que implementa `Describible`, encapsula los datos comunes (nombre, precio, categoría y contador estático) y define el cálculo unificado de total delegando en el método abstracto de envío.
- **`ProductoFisico`**: Especialización de `Producto` que incorpora peso, control de existencias (stock), constante de tarifa por kilogramo y métodos de reserva y reposición.
- **`ProductoDigital`**: Especialización inmutable y final de `Producto` que establece los gastos de envío en 0,00 € y adapta la descripción para descargas digitales.
- **`Catalogo`**: Agregación que gestiona una colección de objetos `Producto` y calcula el valor monetario global mediante polimorfismo sin condicionales de tipo.

---

## 3. Justificación del diseño orientado a objetos

### ¿Por qué `Producto` es una clase abstracta y `Describible` es una interfaz?
- **`Producto` es abstracta** porque representa un concepto genérico que no debe instanciarse directamente (en la tienda real solo se venden productos físicos o digitales específicos). Además, permite compartir atributos privados (`$nombre`, `$precio`, `$categoria`), un constructor con validación común, lógica implementada (`calcularTotal()`) y obligar a las clases hijas a definir su propio método `calcularGastosEnvio()`.
- **`Describible` es una interfaz** porque define una capacidad común ("ser descrito") entre clases que no comparten jerarquía de herencia ni estado interno. 
- **Clases que implementan directamente la interfaz:** `Categoria` y `Producto` (las clases `ProductoFisico` y `ProductoDigital` la implementan de forma indirecta por herencia de `Producto`).

### Objeto `$this` en `calcularTotal()` sobre el teclado
Cuando se ejecuta `$teclado->calcularTotal()`:
- **`$this` representa** la instancia concreta de `ProductoFisico` correspondiente al teclado.
- Aunque el método `calcularTotal()` está definido en la clase padre `Producto`, la llamada `$this->calcularGastosEnvio()` invoca por ligadura dinámica (late binding) la implementación de **`ProductoFisico::calcularGastosEnvio()`**, calculando `0.5 kg * 2.0 €/kg = 1.00 €`.

### Usos de `final`, constante de envío y contador estático
1. **`final` en `Producto::getPrecio()`**: Garantiza que ninguna clase hija pueda sobrescribir ni alterar cómo se consulta el precio base de un producto, protegiendo la regla de negocio.
2. **`final` en `ProductoDigital`**: Impide que se creen clases derivadas de ella, cerrando la jerarquía para este tipo de producto.
3. **Constante `TARIFA_POR_KG` (`ProductoFisico`)**: Define un valor fijo e inmutable (2.0 €/kg) asociado a la clase física, accesible mediante `self::TARIFA_POR_KG`.
4. **Contador estático `$totalCreados` (`Producto`)**: Propiedad compartida a nivel de clase que contabiliza únicamente las instancias de productos creadas con éxito durante la ejecución actual, sin depender de un objeto en particular.

---

## 4. Tabla de resultados de las pruebas (`pruebas.php`)

| ID | Caso de prueba | Resultado esperado | Resultado observado | ¿Coincide? |
|---|---|---|---|:---:|
| **T01** | Catálogo vacío | Cero productos y valor total 0,00 € | 0 productos y valor total 0,00 € | **SÍ** |
| **T02** | Catálogo de los 4 productos | Cuatro productos y valor total 284,40 € | 4 productos y valor total 284,40 € | **SÍ** |
| **T03** | Producto digital | Envío 0,00 €; total igual al precio | Envío 0,00 €; total: 15,00 € | **SÍ** |
| **T04** | Físico (stock 5): reservar 5 | Se completa y deja stock 0 | Se completa correctamente y stock queda en 0 | **SÍ** |
| **T05** | Físico (stock 5): reservar 6 | Excepción y stock conservado en 5 | Excepción capturada (stock insuficiente). Stock = 5 | **SÍ** |
| **T06** | Físico (stock 5): reservar 0 | Excepción y stock conservado en 5 | Excepción capturada (no positivo). Stock = 5 | **SÍ** |
| **T07** | Físico (stock 5): reponer -1 | Excepción y stock conservado en 5 | Excepción capturada (no positivo). Stock = 5 | **SÍ** |
| **T08** | Producto con precio negativo | Excepción; no se completa la construcción | Excepción capturada (precio no puede ser negativo) | **SÍ** |
| **T09** | Físico de peso 0.0 | Excepción; el contador estático no varía | Excepción capturada (peso debe ser positivo). Contador conservado | **SÍ** |
| **T10** | Categoría con solo espacios | Excepción; no se completa la construcción | Excepción capturada (nombre no puede estar vacío) | **SÍ** |
