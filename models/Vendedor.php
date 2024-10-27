<?php

namespace Model;

class Vendedor extends ActiveRecord
{
    //name that represents the table in the db of the class
    protected static $tableName = 'vendedores';
    // each column name of propiedad table
    protected static $dbColumns = ['id', 'nombre', 'apellido', 'telefono'];
    // Possible erros when trying to create an instance
    protected static $errors = [];

    //Atributes of the instance (name of the columns)
    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    //Constructor
    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? NULL;
        $this->nombre = $args["nombre"] ?? '';
        $this->apellido = $args["apellido"] ?? '';
        $this->telefono = $args["telefono"] ?? '';
    }
    //validate inputs
    public function validateInputs(): array
    {
        //::self references $erros IN THIS CLASS, because the attribute was explicitly defined
        if (!$this->nombre) {
            self::$errors[] = "El nombre es necesario";
        }
        if (!$this->apellido) {
            self::$errors[] = "El apellido es necesario";
        }
        if (strlen($this->telefono) > 10 || !preg_match('/^[0-9]{10}$/', $this->telefono)) {
            self::$errors[] = "El telefono es invalido";
        }
        if (!$this->telefono) {
            self::$errors[] = "El telefono es obligatorio";
        }
        return self::$errors;
    }
}
