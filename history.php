<?php
include('./gameScript.php');

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
                    <img src="images/tim_icon.png" class="img-fluid">
                </div>
                <div class="col-12 col-sm align-self-center text-center">
                    <div class="row justify-content-center text-center">
                        <h1>HISTORY</h1>
                    </div>
                    <div class="row justify-content-center text-center">
                        <a role="button" type="button" id="next_button" class="btn btn-lg btn-default btn-block back_button btn-sm" href="index.html">
                            BACK</a>
                    </div>
                </div>
                <div class="col-12 col-sm-3 align-self-center text-center">
                    <img src="images/evil_icon.png" class="img-fluid">
                </div>
            </div> 
        </div>
    </header>
    <div class="container">
        <br>
        <br>
        <div class="row row-header allign-items-center text-center">
            <table class="table table-striped table-bordered table-hover table-light">
                <thead>
                    <tr>
                        <th scope="col">Battle Number</th>
                        <th scope="col">Winner</th>
                        <th scope="col">Loser</th>
                        <th scope="col">No. of Rounds</th>
                        <th scope="col">Winner's health</th>
                        <th scope="col">Loser's health</th>
                    </tr>
                </thead>
                <tbody>
            <?php

                $aux = 1;
                $battles = base::query('SELECT * FROM minionsbattle.history', array());
                foreach ($battles as $battle) {
                    echo "<tr>";
                    echo "<th scope=\"row\">".$aux."</th>";
                    echo "<td>".$battle['Winner']."</td>";
                    echo "<td>".$battle['Loser']."</td>";
                    echo "<td>".$battle['No_of_rounds']."</td>";
                    echo "<td>".$battle['Winner_health']."</td>";
                    echo "<td>".$battle['Loser_health']."</td>";
                    echo "</tr>";
                    $aux++;
                }
                
            ?>
            </tbody>
            </table>
        </div>
        <br>
        <br>
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