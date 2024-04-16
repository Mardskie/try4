<?php

include "../util/dbhelper.php";

$db = new DbHelper;


if (isset($_POST["submit"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $age = $_POST["age"];
    $position = $_POST["position"];

    if (!empty(trim($fname)) && !empty(trim($lname)) && !empty(trim($age)) && !empty(trim($position))) {
        $addEmployee = $db->addRecord("employees", ["fname" => $fname, "lname" => $lname, "age" => $age, "position" => $position]);
        if ($addEmployee > 0) {
            header("Location: ../");
            exit();
        } else {
            header("Location: ../?m=NO+DATA+WAS+ADDED");
            exit();
        }
    } else {
        header("Location: ../");
        exit();
    }
} else {
    header("Location: ../");
    exit();
}