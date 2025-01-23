<?php
    require_once "connection.php";
    session_start();
    if ($_POST){
        extract($_POST);

        if(empty(trim($first_name)) || empty(trim($last_name)) || empty(trim($phoneNumber)) || empty(trim($login)) || empty(trim($password))){
            $_SESSION['info'] = "You missed required informations";
            header("location:signUp.php");
            exit;
        }
        $first_name = trim($first_name);
        $last_name = trim($last_name);
        $login = trim($login);
        $password = trim($password);

        $enc_password = password_hash($password, PASSWORD_DEFAULT) ; 

        $query_verif = "select * from client where login='$login'" ; 
        $res = mysqli_query($conn,$query_verif) ; 
        $cnt = mysqli_num_rows($res);
        if ($cnt == 1){
            $_SESSION['info'] = "User already has account";
            header("location:signUp.php");
            exit;
        }

        $query = "insert into client (first_name,last_name,phoneNumber,login,password,id) values ('$first_name','$last_name','$phoneNumber','$login','$enc_password','')";
        if(!mysqli_query($conn, $query)) {
            $_SESSION['info'] = "Error" ;
            header("location:signUp.php");
            exit ;
        }
        $query = "select * from client where login='$login'";
        $res = mysqli_query($conn, $query) ;
        $tab = mysqli_fetch_assoc($res);
        $_SESSION['user'] = $tab;
        header("location:dashboard.php");
        exit;
    }
?>