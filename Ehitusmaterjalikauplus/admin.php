<?php
require ('conf.php');
require("abifunktsioonid.php");
  if(isSet($_REQUEST["Materjalilisa"])){
    Materjalilisa($_REQUEST["Nimetus"], $_REQUEST["Suurus"], $_REQUEST["Varv"]);
    header("Location: admin.php");
    exit();
}
?>
<!doctype html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<script>
    function notifyMe() {
    alert("Material on lisatud")
    }
</script>
<head>
    <title>Ehitus materjali kauplus</title>
</head>
<header>
    <h1>Ehitus materjali kauplus</h1>

</header>
  <nav>
    <ui>
    <button><a href="Kauplus.php">Valja</a></button>
    <button><a href="Varvid.php">Värvid</a></button>
    </ui>  
  </nav>
<body>
<main>

  
    <h2>Materjali lisamine</h2>
<form action="?">
   Materjali nimetus:
    <input type="text" name="Nimetus" ><!--input box-->
  <br>
  Materjali suurus(m):
    <input type="number" name="Suurus" >
  <br>
  Materjali värv:
  <input type="number" name="Varv" >
    <br>
    <button type="submit" name="Materjalilisa" value="Lisa materjal" onclick="notifyMe()">Lisa materjal</button>  
  <table border="2">
        <h2>Meiei materjalid</h2>
        <?php
        $kask=$yhendus->prepare("SELECT ID, Nimetus, Suurus, Varv FROM Ehitusmaterjalid");//sql query
        $kask->bind_result($ID, $Nimetus1, $Suurus1, $Varv1);
        $kask->execute();
        echo "<td><h3>Materjali nimetus</h3></td>";//colums nimetused
        echo "<td><h3>Materjali suurus(m)</h3></td>";
        echo "<td><h3>Materjali värv</h3></td>";
        echo "</tr>";
        while($kask->fetch()){
            echo "<td>".htmlspecialchars($Nimetus1)."</td>";//näitab andme baasi materjalid
            echo "<td>".htmlspecialchars($Suurus1)."</td>";
            echo "<td>".htmlspecialchars($Varv1)."</td>";
            echo "</tr>";
        }
        ?>
    </table>
  <br>
</main>  
</body>
<footer>
  <div id="jalus">&copy; See leht tegi Kirill Lavrov</div>
  </footer>
</html>
