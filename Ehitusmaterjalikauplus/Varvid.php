<?php
require ('conf.php');
require("abifunktsioonid.php");
  if(isSet($_REQUEST["Varvilisa"])){
    Varvilisa($_REQUEST["Varvnimetus"]);
    header("Location: Varvid.php");
    exit();
}
?>
<!doctype html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<script>
    function notifyMe() {
    alert("Värv on lisatud")
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
    <button><a href="admin.php">Materjalid</a></button>
    </ui>  
  </nav>
<body>
<main>
<br>
    <div id="form">
      <h2>Värvi lisamine</h2>
<form action="?">
   Värv:
    <input type="text" name="Varvnimetus" >
    <br>
    <button type="submit" name="Varvilisa" value="Lisa värvi" onclick="notifyMe()">Lisa värvi</button>  
  <table border="2">
        <h2>Värvid</h2>
        <?php
        $kask=$yhendus->prepare("SELECT VarvID, Varvnimetus FROM Varv");
        $kask->bind_result($VarvID, $Varvnimetus);
        $kask->execute();
        echo "<td><h3>Värvid</h3></td>";
        echo "</tr>";
        while($kask->fetch()){
            echo "<td>".htmlspecialchars($Varvnimetus)."</td>";
            echo "</tr>";
        }
        ?>
    </table> 
  </div>
  <br>
</main>  
</body>
<footer>
  <div id="jalus">&copy; See leht tegi Kirill Lavrov</div>
  </footer>
  
</html>
