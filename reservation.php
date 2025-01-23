<?php
    require_once "connection.php";
    session_start();
    $user = $_SESSION['user'];
    $id = $user['id'];
    $query = "select * from reservation where idClient = '$id'";
    $res = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>My Reservations</title>
</head>
<body>
    <header></header>
    <div class="my-reservation">
        <table>
            <tr>
                <th>idReservation</th>
                <th>location</th>
                <th>carModel</th>
                <th>pick-up date</th>
                <th>drop-off date</th>
                <th colspan = "2">cancel</th>
            </tr>
        <?php
            while ($tab = mysqli_fetch_assoc($res)){
                $idCar = $tab['idCar'] ;
                $query_car = "select * from Car where idCar='$idCar'" ;
                $res_car = mysqli_query($conn, $query_car);
                $tab_car = mysqli_fetch_assoc($res_car);
        ?>
                <tr>
                    <td><?php echo $tab['idReservation'] ?></td>
                    <td><?php echo $tab['location'] ?></td>
                    <td><?php echo $tab_car['model'] ?></td>
                    <td><?php echo $tab['pudate'] ?></td>
                    <td><?php echo $tab['podate'] ?></td>
                    <td align = "center"><a href = "cancel.php?id=<?php echo $tab['idReservation'] ?>"><img src="img/delete.png" alt=""></a></td>
                </tr>
        <?php
            }
        ?>
        </table>
        <div class="back-home"><a href="dashboard.php">Back Home</a></div>
    </div>
</body>
</html>