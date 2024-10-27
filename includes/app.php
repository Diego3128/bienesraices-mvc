<?php

require 'functions.php';

require 'config/database.php';

require __DIR__ . '/../vendor/autoload.php';

// connect to the database
$db = connectToDB();

// set db to the main class ActiveRecord
Model\ActiveRecord::setDB($db);
