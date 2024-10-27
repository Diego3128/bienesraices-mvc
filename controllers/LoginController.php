<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginController
{
    public static function login(Router $router)
    {
        $errors = Admin::getErrors();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $auth = new Admin($_POST["user"]);

            $auth->validateInputs();

            $errors = Admin::getErrors();

            if (empty($errors)) {
                //check if the user exists
                $resultado = $auth->userExists();

                //
                if (!$resultado)  $errors = Admin::getErrors();

                if (empty($errors)) {
                    //check password
                    $match =  $auth->checkPassword($resultado);
                    //authenticate user
                    if ($match) {
                        //authenticate user
                        $auth->authenticate();
                    } else {
                        //wrong password
                        $errors = Admin::getErrors();
                    }
                }
            }

            $errors = Admin::getErrors();
        }

        $data = [
            "errors" => $errors
        ];
        $router->render("auth/login", $data);
    }

    public static function logout()
    {
        session_start();

        $_SESSION = [];

        header("location: /");
    }
}
