<?php
require_once('Controllers/Gender.php');
require_once('Controllers/Countries.php');

$case = $_GET['function'];

switch ($case) {
    case "countries":
        $countries = new Countries();
        $countries = $countries->get_all();
        echo(json_encode($countries));
    break;
    case "gender":
        $gender = new Gender();
        $gender = $gender->get_gender($_GET['name'], $_GET['country']);
        echo(json_encode($gender));
    break;
}
