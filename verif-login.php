<?php
    require_once "connection.php";
    session_start();
    if ($_POST){
        extract($_POST);
        if(empty(trim($login)) || empty(trim($password))){
            $_SESSION['info'] = "Invalid Login or Password";
            header("location:login.php");
            exit;
        }
        $login = trim($login);
        $password = trim($password); 

        $query = "select * from client where login = '$login'";
        $res = mysqli_query($conn, $query);
        $cnt = mysqli_num_rows($res);
        $tab = mysqli_fetch_assoc($res);

        if ($cnt === 0){
            $_SESSION['info'] = "User not found";
            header("location:login.php");
            exit;
        }
        if(!password_verify($password , $tab["password"])){
            $_SESSION["info"] = "Incorrect password, retry!";
            header("location:login.php");
            exit;
        }
        $_SESSION['user'] = $tab;
        header("location:dashboard.php");
        exit;
    }
?>