<?php
    require_once "connection.php";
    session_start();
    $fullname = $_SESSION['user']['first_name'].' '.$_SESSION['user']['last_name'];

    $query = "select * from model";
    $result = mysqli_query($conn, $query);
    if(isset($_SESSION['info'])) {
        $info = $_SESSION['info'] ; 
        unset($_SESSION['info']) ; 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Oswald:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>CARSbooking.tn</title>
</head>
<body>
    <nav class="navbar">
        <h1 class="logo">CARSbooking.tn</h1>
        <div>
            <div calss="login">
                <ul class="nav-links">
                    <li><a href="dashboard.php"><?php echo $fullname ?></a></li>
                    <li><a href="logout.php">logout</a></li>
                </ul>
            </div>
            <div>
                <ul class="nav-links" id="nav-links">
                    <li><a>Home</a></li>
                    <li><a href="reservation.php">My reservation</a></li>
                    <li><a href="#contact">Contact us</a></li>
                </ul>
            </div>
        </div>
        <img src="img/bar-white2.png" alt="img" class="menu-btn" id="menu-btn">
    </nav>
    <header>
        <h1>Car Rental – Search, Compare & Save</h1>
        <div class="desc">
            <p>&#10003; Free cancellation </p>
            <p>&#10003; 6+ locations</p>
        </div>
        <div class="reserve" id="reserve">
            <fieldset>
                <legend>Reserve your car</legend>
                <form method="post" action="chooseCar.php">
                    <label class="label-class">Select your location</label>
                    <select name="location" id="">
                        <option value="default" selected>Your location</option>
                        <option value="nabeul">Nabeul</option>
                        <option value="ariana">Ariana</option>
                        <option value="tunis">Tunis</option>
                        <option value="kelibia">Kelibia</option>
                        <option value="monastir">Monastir</option>
                        <option value="manzel_tmim">Manzel temime</option>
                    </select>
                    <label class="label-class">Pick-up date</label>
                    <input type="date" name = "pudate" id="">
                    <br>
                    <label class="label-class">Drop-off date</label>
                    <input type="date" name = "podate" id="">
                    <br>
                    <input type="submit" name="" id="" href="chooseCar.php">
                    <?php
                        if(isset($info)) {
                            echo "<p style='font-size:11px; color:red;'>".$info."</p>";
                        }
                    ?>
                </form>
            </fieldset>
        </div>
    </header>
    
    
    <div class="presentation" id="presentation">
        <div class="ABOUT">
            <h1>About us</h1>
            <p>
                Welcome to CARSbooking, your premier destination for hassle-free car rentals! At CARSbooking, we understand the importance of seamless travel experiences, which is why we strive to provide top-notch vehicles and exceptional service to meet all your transportation needs.
                We prioritize customer satisfaction above all else, which is why we offer a range of optional services and extras to enhance your rental experience. From GPS navigation systems and child car seats to comprehensive insurance coverage and roadside assistance, we've got everything you need to travel with peace of mind.
            </p>
        </div>
        <div><img src="img/background.jpg" alt=""></div>
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