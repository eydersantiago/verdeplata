<?php

namespace Model;

class Articulo extends ActiveRecord {

    // Base DE DATOS
    protected static $tabla = 'articulos';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'tipo', 'creado', 'vendedor_id'];


    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $tipo;
    public $creado;
    public $vendedor_id;

    //asignar los atributos
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->tipo = $args['tipo'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedor_id = $args['vendedor_id'] ?? '';
    }

    public function validar() {

        if(!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        }

        if(!$this->precio) {
            self::$errores[] = 'El Precio es Obligatorio';
        }

        if( strlen( $this->descripcion ) < 50 ) {
            self::$errores[] = 'La descripción es obligatoria y debe tener al menos 50 caracteres';
        }

        if(!$this->tipo) {
            self::$errores[] = 'El Tipo de Artículo es obligatorio';
        }
        
        if(!$this->vendedor_id) {
            self::$errores[] = 'Elige un vendedor';
        }

        if(!$this->imagen ) {
            self::$errores[] = 'La Imagen es Obligatoria';
        }

        return self::$errores;
    }

}