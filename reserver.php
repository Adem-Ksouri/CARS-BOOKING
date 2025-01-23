<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href = "style/reserver.css">
        <title>Successful Reservation</title>
    </head>
<body>
    
</body>
</html>

<?php
    require_once "connection.php";
    session_start();
    extract($_GET) ;

    // taking info of reservation from session
    $idClient = $_SESSION['user']['id'];
    $location = $_SESSION['location'] ; 
    $pudate = $_SESSION['pudate'] ; 
    $podate = $_SESSION['podate'] ;

    // taking one available idCar of that model
    $query = "select * from car where model='$name'" ; 
    $result = mysqli_query($conn, $query) ;
    $row_car = mysqli_fetch_assoc($result);
    $idCar = $row_car["idCar"];

    // computing the total price
    $date1 = new DateTime($pudate) ; 
    $date2 = new DateTime($podate) ; 
    $total_period = $date1->diff($date2) ;
    $total_days = $total_period->y*365 + $total_period->m*30+$total_period->d ; 
    $totalPrice = $total_days * $price ; 

    $query = "insert into reservation (idReservation, idCar, idClient, location, pudate, podate, totalPrice)
        values('', '$idCar', '$idClient', '$location', '$pudate', '$podate', '$totalPrice')";
    mysqli_query($conn, $query);
    ?>

    <header>
        <div class="status">
            <p>&#9989; La reservation a été effectuée avec succés</p>
        </div>
        <a href="dashboard.php">Back Home</a>
    </header>
        
<?php
    mysqli_close($conn);
?>