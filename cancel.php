<?php
    require_once "connection.php";
    if ($_GET){
        extract($_GET);
        $query = "delete from reservation where idReservation ='$id'";
        mysqli_query($conn, $query);
        header("location:reservation.php");
    }
?>