<?php

include "connection.php";
    $statement = $conn->prepare ("SELECT ID, LINEA, DATE_FORMAT(`GARLASCO_vittoria`, '%H.%i') AS `GARLASCO_vittoria`, DATE_FORMAT(`GARLASCO_pavia`, '%H.%i') AS `GARLASCO_pavia`, DATE_FORMAT(`GROPELLO`, '%H.%i') AS `GROPELLO`, DATE_FORMAT(`FAMAGOSTA`, '%H.%i') AS `FAMAGOSTA`  FROM `ritorno` ORDER by FAMAGOSTA asc");
    $statement->execute( );

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
    <br><br>
    <div class="container space">
        <a href="index.php">Home</a>
    </div>
    <h2>Andata</h2>
    <div class="container">
    <?php

        while ($risultato = $statement->fetch(PDO::FETCH_ASSOC) ) {
            echo "<div class=\"orario\"><p><em>Da<br></em> Famagosta, <span>".$risultato["FAMAGOSTA"]."</span></p><p><em>A<br></em> Garlasco,<span> ".$risultato["GARLASCO_vittoria"]."</span></p><p><em>Linea</em><span> ".$risultato["LINEA"]."</span></p><p><em>Intermedie</em><br> Gropello, ".$risultato["GROPELLO"]."<br>Garlasco Pavia, ".$risultato["GARLASCO_pavia"]."</p></div>";
        }

    ?>
    </div>

</body>
</html>