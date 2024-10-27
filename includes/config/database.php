 <?php
    // database settings
    function connectToDB(): mysqli
    {
        $dbConecction = new mysqli("localhost", "root", "root", "bienesraices_crud");

        if (!$dbConecction) {
            die("There was an error trying to connect to db");
        } else {
            // echo ("conection successful <br>");
            return $dbConecction;
        }
    }
