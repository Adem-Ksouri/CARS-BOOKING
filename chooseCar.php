<?php
    require_once "connection.php";
    session_start();
    if($_POST) {
        extract($_POST); 
        if(empty(trim($location)) || empty(trim($pudate)) || empty(trim($podate))) {
            $_SESSION['info'] = "Missed informations !" ; 
            header("location:dashboard.php");
            exit;
        }
        $location = trim($location);
        
        $pudate = trim($pudate);
        $podate = trim($podate);
        if($location==="default") {
            $_SESSION['info'] = "Choose a location please !" ; 
            header("location:dashboard.php");
            exit;
        }
        if($podate <= $pudate) {
            $_SESSION['info'] = "pick-up date must be before drop-off date !" ; 
            header("location:dashboard.php");
            exit;
        }

        $_SESSION['location'] = $location ; 
        $_SESSION['pudate'] = $pudate ; 
        $_SESSION['podate'] = $podate ;
    }
    $query = "select distinct name , gearBox , nbSeats , price, rate 
              from model m , car c
              where m.name = c.model and c.idCar not in (
              select R.idCar from reservation R  
              where
              ('$pudate' >= R.pudate && '$pudate' <= R.podate)
              or('$podate' >= R.pudate && '$podate' <= R.podate)
              or('$pudate' <= R.pudate && '$podate' >= R.podate)
              )
              "; 
    $result = mysqli_query($conn , $query);  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Oswald:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>chooseCar</title>
</head>
<body>
    <div class="row" id="row">
        <div class="CARS"><h1>Available cars</h1></div>
        <?php     
            while ($row = mysqli_fetch_assoc($result)) {  
                ?>
                <div class="col">
                    <div class="left">   
                        <div class="image">
                            <img class="car-img" src="img/<?php echo $row['name']?>.jpg" alt="">
                            <div class= "img-border"></div>
                        </div>
                    </div>
                    <div class="right">
                        <h3><?php echo $row['name']?></h3>
                        <ul>
                            <li>
                                <p><?php echo $row['gearBox']?></p>
                            </li>
                            <li>
                                <p><?php echo $row['nbSeats']?> Seats</p>
                            </li>
                            <li>
                                <p>Price : <?php echo $row['price']?> per day</p>
                            </li>
                            <li>
                                <p>Rate : <?php echo $row['rate']?></p>
                            </li>
                        </ul>
                        <button class="Valider"><a href="reserver.php?name=<?php echo $row['name']?>&price=<?php echo $row['price']?>">Valider</a></button>

                    </div>

                </div>
            <?php } ?>
            <div class="back-home"><a href="dashboard.php">Back Home</a></div>
    </div>
    
    
    
    <div class="contact" id="contact">
        <h3>Comment pouvons-nous vous aider?</h3>
        <p> Nous avons pour mission de vous conseiller sur les voitures qu’offre CARSbooking.<br> 
            Contactez-nous, on veut connaître votre voiture préféré et qui sait, <br>
            peut-être vous en faire découvrir de nouveaux!
        </p>
        <br>
        <i class="fa fa-envelope-o info-icon"></i>
        <span class="info-text">
            Contactez-nous par Email
            <br>
            <a class="bold" href="adam.ksouri@etudiant-isi.utm.tn">adam.ksouri@etudiant-isi.utm.tn</a>
            <br>
            <a class="bold" href="firas.briki@etudiant-isi.utm.tn">firas.briki@etudiant-isi.utm.tn</a>
            <br>
            <br>
        </span> 
        <i class="fa fa-phone info-icon"></i>
        <span class="info-text">
            Contactez-nous par téléphone
            <br>
            <a class="bold" href="tel:+216 55 910 124">+216 55 910 124</a>
            <span> / </span>
            <a class="bold" href="tel:+216 21 763 001">+216 21 763 001</a>
            <br>
            <br>
        </span>
        <i class="fa fa-facebook"></i>
        <span class="info-text">
            Contactez-nous sur facebook
            <br>
            <a class="bold" href="https://www.facebook.com/adem.ksouri.712/">Adem Ksouri</a>
            <br>
            <a class="bold" href="https://www.facebook.com/firas.briki54tls">Firas Briki</a>
        </span>
    </div>
    <script>
        const menubtn = document.querySelector('.menu-btn');
        const navlinks = document.querySelector('.nav-links');
        menubtn.addEventListener('click', ()=>{
            navlinks.classList.toggle('mobile-menu');
        });
    </script>
</body>
</html>