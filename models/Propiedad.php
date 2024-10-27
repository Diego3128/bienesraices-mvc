<?php

declare(strict_types=1);

namespace Model;

class Propiedad extends ActiveRecord
{
    //name that represents the table in the db of the class
    protected static $tableName = 'propiedades';
    // each column name of propiedad table
    protected static $dbColumns = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];
    // Possible erros when trying to create an instance
    protected static $errors = [];
    //Atributes of  a property the instance
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;
    //Constructor
    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? NULL;
        $this->titulo = $args["titulo"] ?? '';
        $this->precio = $args["precio"] ?? '';
        $this->imagen = $args["imagen"] ?? '';
        $this->descripcion = $args["descripcion"] ?? '';
        $this->habitaciones = $args["habitaciones"] ?? '';
        $this->wc = $args["wc"] ?? '';
        $this->estacionamiento = $args["estacionamiento"] ?? '';
        $this->creado = $args["creado"] ?? date("Y/m/d");
        $this->vendedorId = $args["vendedorId"] ?? '';
    }
    //validate inputs
    public function validateInputs(): array
    {
        //::self references $erros IN THIS CLASS, because the attribute was explicitly defined, otherwise it would reference the one in ActiveRecord
        if (!$this->titulo) {
            self::$errors[] = "El titulo es necesario";
        }
        if (!$this->precio) {
            self::$errors[] = "El precio es necesario";
        }
        if (strlen($this->descripcion) < 50) {
            self::$errors[] = "La descripción es muy corta";
        } elseif (!$this->descripcion) {
            self::$errors[] = "La descripción es obligatoria";
        }
        if (!$this->wc) {
            self::$errors[] = "El numero de baños es requerido";
        }
        if (!$this->habitaciones) {
            self::$errors[] = "El numero de habitaciones es requerido";
        }
        if (!$this->estacionamiento) {
            self::$errors[] = "El numero de lugares de estacionamiento es requerido";
        }
        if (!$this->vendedorId) {
            self::$errors[] = "Elija un vendedor";
        }
        // validate image
        if (!$this->imagen) {
            self::$errors[] = "La imagen de la propiedad es obligatoria";
        }

        return self::$errors;
    }
}
