<?php

namespace Model;

class Admin extends ActiveRecord
{
    //name that represents the table in the db of the class
    protected static $tableName = 'usuarios';
    // each column name of propiedad table
    protected static $dbColumns = ['id', 'email', 'password'];
    // Possible erros when trying to create an instance
    protected static $errors = [];
    //Atributes of  a property the instance
    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? null;
        $this->email = $args["email"] ??  '';
        $this->password = $args["password"] ??  '';
    }
    public function validateInputs(): array
    {
        if (!$this->email) {
            self::$errors[] = "El email es obligatorio";
        } elseif (!preg_match("/^[\w\.\-]+@[a-zA-Z\d\-]+\.[a-zA-Z]{2,}$/", $this->email)) {
            self::$errors[] = "El email es invalido.";
        }

        if (!$this->password) {
            self::$errors[] = "El password es obligatorio";
        }
        return self::$errors;
    }
    public function userExists(): null | object
    {
        $query = "SELECT * FROM " . self::$tableName . " WHERE email = '{$this->email}' LIMIT 1";
        $result = self::$db->query($query);
        if (!$result->num_rows) {
            self::$errors[] = "El correo no está registrado";
            return null;
        }
        return $result;
    }
    public function checkPassword($record): bool
    {
        $result = $record->fetch_assoc();
        if ($result) {
            $password = $result["password"];
            //check if password matches the hash
            $auth = password_verify($this->password, $password);

            if (!$auth) {
                self::$errors[] = "La contraseña es incorrecta";
            }
            return $auth;
        }
    }
    public function authenticate()
    {
        session_start();

        $_SESSION["user"] = $this->email;
        $_SESSION["loggedin"] = true;

        header("location: /admin");
    }
}
