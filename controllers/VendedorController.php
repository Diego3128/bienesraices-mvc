<?php

namespace Controllers;

use MVC\Router;
//import model
use Model\Vendedor;

class VendedorController
{
    public static function create(Router $router)
    {
        $vendedor = new Vendedor;
        $errors = Vendedor::getErrors();

        //recibe data from the form
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            //create a seller 
            $vendedor = new Vendedor($_POST["vendedor"]);
            $errors = $vendedor->validateInputs();
            // debugAndFormat($errors);
            if (empty($errors)) {
                $vendedor->save();
            }
        }

        $data = [
            "vendedor" => $vendedor,
            "errors" => $errors
        ];

        $router->render("vendedores/create", $data);
    }
    public static function update(Router $router)
    {
        //get seller's id
        $sellerId = validateIdOrRedirect("/admin?result=4");

        $vendedor = Vendedor::findById($sellerId);

        if (!$vendedor) header("location: /admin?result=5");

        $errors = Vendedor::getErrors();

        //get data from the form
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            //synchronize the object in memor with the data from the form
            $vendedor->synchronize($_POST["vendedor"]);
            //validate inputs
            $vendedor->validateInputs();
            $errors = Vendedor::getErrors();
            //if everything is correct then save in memory
            if (empty($errors)) {
                $vendedor->save();
            }
        }

        $data = [
            "vendedor" => $vendedor,
            "errors" => $errors
        ];

        $router->render("vendedores/update", $data);
    }
    public static function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);
            $type = $_POST["type"] ?? "";
            //check type and id
            if ($id || validateContentType($type)) {
                $vendedor = Vendedor::findById($id);
                if ($vendedor) $vendedor->delete();
            } else {
                header("location: /admin?result=4");
            }
            debugAndFormat($_POST);
        }
    }
}
