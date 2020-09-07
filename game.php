<?php
include('./gameScript.php');
 
$timMinion = new Minion;
$evilMinion = new Minion;
$evilMinion->setType(2);

?>

<html lang="en">
    
<head>
    <!-- Required meta tags always come first -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="./node_modules/bootstrap-social/bootstrap-social.css">
        <link rel="stylesheet" href="./stylesheet2.css">
        <title>Minions Battle</title>
</head>
<body style="background-color:#fdd462;">
    <header class="jumbotron">
        <div class="container">
            <div class="row row-header">
                <div class="col-12 col-sm-3 align-self-center text-center">
                    <h1>TIM</h1>
                    <img src="images/tim_icon.png" class="img-fluid">
                </div>
                <div class="col-12 col-sm-3 align-self-center stats">
                    <?php echo $timMinion->showStats(); ?>
                </div>
                <div class="col-12 col-sm-3 align-self-center stats text-right">
                    <?php echo $evilMinion->showStats(); ?>
                </div>
                <div class="col-12 col-sm-3 align-self-center text-center">
                    <h1>EVIL</h1>
                    <img src="images/evil_icon.png" class="img-fluid">
                </div>
            </div> 
        </div>
    </header>
    <div class="container">
        <div class="row row-content">
            <div class="col-12 align-items-center text-center">
                <?php 
                    $battle = new Battle($timMinion, $evilMinion);
                    $battle->doBattle();
                ?>
            </div>
        </div>
    </div>
    <div class="jumbotron">
        <div class="container align-items-center text-center">
            <?php $battle->getWinner();?>
        </div>
    </div>
    <footer class="footer">
        <div class="container text-center allign-self-center">
            <br>
            <span> Copyright @ 2020 <a href="https://www.instagram.com/andreea.n_n/" style="color:floralwhite">Andreea-Cristina Negoita</a>, All Rights Reserved.</span>
            
        </div>
    </footer>
    <script src="./node_modules/jquery/dist/jquery.slim.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    
</body>
</html>