<?php

require_once "../util/dbhelper.php";

$db = new DbHelper();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty(trim($username)) && !empty(trim($password))) {
        $login = $db->getRecord('employee_account', ['username' => $username, 'password' => $password]);
        if ($login != null) {
            header('Location: ../?m=SUCCESSFULLY+SIGNED+UP');
            exit();
        } else {
            header('Location: ../login.php?m=ERROR+SIGNING+UP');
            exit();
        }
    } else {
        header('Location: ../login.php?m=FILL+OUT+THE+MISSING+FIELDS');
        exit();
    }
}