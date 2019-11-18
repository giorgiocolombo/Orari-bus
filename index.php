<?php

include "connection.php";
    
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orari Bus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Tutte le corse</h2>
    <div class="container space">
        <a href="andata.php">Andata</a>
        <a href="ritorno.php">Ritorno</a>
    </div>
    <h2>I prossimi orari</h2>
    <div style="text-align:center"><em style="font-size:20px;">Andata</em></div>
    <div class="container">

    <?php
            $statement = $conn->prepare ("SELECT ID, LINEA, DATE_FORMAT(`GARLASCO_vittoria`, '%H.%i') AS `GARLASCO_vittoria`, DATE_FORMAT(`GARLASCO_pavia`, '%H.%i') AS `GARLASCO_pavia`, DATE_FORMAT(`GROPELLO`, '%H.%i') AS `GROPELLO`, DATE_FORMAT(`FAMAGOSTA`, '%H.%i') AS `FAMAGOSTA`  FROM `andata` WHERE GARLASCO_vittoria >= now() ORDER BY GARLASCO_vittoria LIMIT 3");
            $statement->execute();
            while ($risultato = $statement->fetch(PDO::FETCH_ASSOC) ) {
                echo "<div class=\"orario\"><p><em>Da<br></em> Garlasco, <span>".$risultato["GARLASCO_vittoria"]."</span></p><p><em>A<br></em> Famagosta,<span> ".$risultato["FAMAGOSTA"]."</span></p><p><em>Linea</em><span> ".$risultato["LINEA"]."</span></p><p><em>Intermedie</em><br> Garlasco Pavia, ".$risultato["GARLASCO_pavia"]."<br>Gropello, ".$risultato["GROPELLO"]."</p></div>";
            }
            
    ?>

    </div><br><br><br>
        <div style="text-align:center"><em style="font-size:20px;">Ritorno</em></div>
        <div class="container">
        <?php
            $statement = $conn->prepare ("SELECT ID, LINEA, DATE_FORMAT(`GARLASCO_vittoria`, '%H.%i') AS `GARLASCO_vittoria`, DATE_FORMAT(`GARLASCO_pavia`, '%H.%i') AS `GARLASCO_pavia`, DATE_FORMAT(`GROPELLO`, '%H.%i') AS `GROPELLO`, DATE_FORMAT(`FAMAGOSTA`, '%H.%i') AS `FAMAGOSTA`  FROM `ritorno` WHERE FAMAGOSTA >= now() ORDER BY FAMAGOSTA LIMIT 3");
            $statement->execute();
            while ($risultato = $statement->fetch(PDO::FETCH_ASSOC) ) {
                echo "<div class=\"orario\"><p><em>Da<br></em> Famagosta, <span>".$risultato["FAMAGOSTA"]."</span></p><p><em>A<br></em> Garlasco,<span> ".$risultato["GARLASCO_vittoria"]."</span></p><p><em>Linea</em><span> ".$risultato["LINEA"]."</span></p><p><em>Intermedie</em><br> Gropello, ".$risultato["GROPELLO"]."<br>Garlasco Pavia, ".$risultato["GARLASCO_pavia"]."</p></div>";
            }
    ?>
    </div>
</body>
</html>
