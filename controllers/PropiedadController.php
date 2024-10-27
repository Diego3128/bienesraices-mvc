<?php

namespace Controllers;
//import classes
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
//intervention image
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class PropiedadController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $result = null;

        $data = [
            "propiedades" => $propiedades,
            "vendedores" => $vendedores,
            "result" => $result
        ];

        $router->render("propiedades/admin", $data);
    }
    //
    public static function create(Router $router)
    {
        //Get all sellers
        $vendedores = Vendedor::all();
        //init $propiedad object
        $propiedad = new Propiedad;
        //init array of errors
        $errors = Propiedad::getErrors();

        ///POST REQUEST
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            //create a new instance of Propiedad based on the data from the form
            $propiedad = new Propiedad($_POST["propiedad"]);
            //img variables
            $image = "";
            $imageName = "";

            // check if the image was correctly uploaded:
            if ($_FILES["propiedad"]["error"]["imagen"] === UPLOAD_ERR_OK && $_FILES["propiedad"]["tmp_name"]["imagen"]) {
                // create image manager with GD driver
                $manager = new ImageManager(new Driver());
                //file temporary location
                $imgTempDir = $_FILES["propiedad"]["tmp_name"]["imagen"];
                // random name plus the extension
                $imageName = md5(uniqid(mt_rand())) . ".jpg";
                //save the name of the image in the attribute of the instance
                $propiedad->setImage($imageName);
                //RESIZE IMAGE
                // read image from file system
                $image = $manager->read($imgTempDir);
                // resize image proportionally to 800 width 600 height
                $image->cover(800, 600);
            }
            // check for errors
            $errors = $propiedad->validateInputs();

            // if there are no errors, save the new property and also the image
            if (empty($errors)) {
                // Folder in the server to save the image
                if (!is_dir(IMAGES_DIR)) {
                    mkdir(IMAGES_DIR);
                }
                //save the image in the server
                // save modified image in new format in the server
                $image->toJpeg()->save(IMAGES_DIR . $imageName);

                //save the property into the database
                $propiedad->save();
            }
        }
        ///Data to be sent
        $data = [
            "propiedad" => $propiedad,
            "vendedores" => $vendedores,
            "errors" => $errors
        ];
        //render view with the data
        $router->render("propiedades/create", $data);
    }
    //
    public static function update(Router $router)
    {
        $propertyId = validateIdOrRedirect("/admin?result=4");
        //Get property
        $propiedad = Propiedad::findById($propertyId);
        //if the id doesn't exist return to the admin panel
        if (!$propiedad) header("location: /admin?result=5");

        //array with all the sellers
        $vendedores = Vendedor::all();
        //init var for possible errors
        $errors = Propiedad::getErrors();

        //Process update request
        $image = null;
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            //array with the changes made in the form
            $args = $_POST["propiedad"];
            //update property in memory
            $propiedad->synchronize($args);
            // check if the a new image was uploaded:
            if ($_FILES["propiedad"]["error"]["imagen"] === UPLOAD_ERR_OK && $_FILES["propiedad"]["tmp_name"]["imagen"]) {
                // create image manager with GD driver
                $manager = new ImageManager(new Driver());
                //file temporary location
                $imgTempDir = $_FILES["propiedad"]["tmp_name"]["imagen"];
                // random name plus the extension
                $imageName = md5(uniqid(mt_rand())) . ".jpg";
                //save the name of the new image in the attribute of the instance
                $propiedad->setImage($imageName);
                // read image from file system
                $image = $manager->read($imgTempDir);
                // resize image proportionally to 800 width 600 height
                $image->cover(800, 600);
            }
            //input validation
            $propiedad->validateInputs();
            //check errors
            $errors = Propiedad::getErrors(); //check inputs for possible errors

            // if there are no errors update in database
            if (empty($errors)) {
                //save the possible new image in the server
                if (isset($image)) {
                    $image->toJpeg()->save(IMAGES_DIR . $imageName);
                }
                //update the property into the database
                $propiedad->save();
            }
        }
        ///Data to be sent
        $data = [
            "propiedad" => $propiedad,
            "vendedores" => $vendedores,
            "errors" => $errors
        ];
        //render view with the data
        $router->render("propiedades/update", $data);
    }
    //
    public static function delete()
    {
        // get objects's id to delete
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            //validate id
            $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);
            //type of content (property || seller)
            $type = $_POST["type"];
            //check correct type
            if (validateContentType($type) && $id) {
                //identify the type
                $propiedad = Propiedad::findById($id);
                if ($propiedad) $propiedad->delete();
            } else {
                header("location: /admin?result=4");
            }
        }
    }
}
