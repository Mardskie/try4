<?php

require_once "../util/dbhelper.php";

$db = new DbHelper();

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty(trim($username)) && !empty(trim($password))) {
        $signup = $db->addrecord('employee_account', ['username' => $username, 'password' => $password]);
        if ($signup > 0) {
            header('Location: ../login.php?m=SUCCESSFULLY+SIGNED+UP');
            exit();
        } else {
            header('Location: ../signup.php?m=ERROR+SIGNING+UP');
            exit();
        }
    } else {
        header('Location: ../signup.php?m=FILL+OUT+THE+MISSING+FIELDS');
        exit();
    }
}