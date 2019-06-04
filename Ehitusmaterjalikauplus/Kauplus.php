<?php
require ('conf.php');
if(!empty ($_REQUEST["materjalikast"])){
    $kask=$yhendus->prepare("INSERT INTO Ehitusmaterjalid(Nimetus,Suurus, Varv) VALUES (?, ?, ?)");
    $kask->bind_param("s", $_REQUEST["materjalikast"]);
    $kask->execute();
    header("Location: $_SERVER[PHP_SELF]");
    $yhendus->close();

    exit();
}
?>
<!doctype html>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<script>

    function OpenFunction() {
      document.getElementById("auth").style.display = "block";
      document.getElementById("form").style.display = "none";
    }
    function closeForm() {
        document.getElementById("auth").style.display = "none";
      document.getElementById("form").style.display = "block";
      }   
    function check(form)
      {
        if(form.userid.value == "admin" && form.pswrd.value == "admin")
        {
          window.open("admin.php","_self")
          document.getElementById("auth").style.display = "none";
            }
        else
        {
          alert(" Password or Username incorrect")
            }
      }
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
<body>
  <nav>
    <ui>
      <button class="nav-item"><a href="#" onclick="OpenFunction();" class="nav-link">Admin menüü</a></button>
    </ui>  
  </nav>
<main>
  <div id="auth" class="form-popup" style='display:none'>
    <form name="login" class="form-container">
        Username: <input type="text" name="userid" placeholder="Enter Username" required/>
      <br>
        Password:  <input type="password" name="pswrd"placeholder="Enter Password" required/>
      <br>
        <input type="button" onclick="check(this.form)" class="btn" value="Login" />
        <input type="button" value="Cancel" class="btn cancel" onclick="closeForm();"/>
      </form>
    </div>
<br>
    <div id="form">
  <table border="2">
        <h2>Meiei materjalid</h2>
        <?php
        $kask=$yhendus->prepare("SELECT ID, Nimetus, Suurus, Varv FROM Ehitusmaterjalid");
        $kask->bind_result($ID, $Nimetus, $Suurus, $Varv);
        $kask->execute();
        echo "<td><h3>Materjali nimetus</h3></td>";
        echo "<td><h3>Materjali suurus(m)</h3></td>";
        echo "<td><h3>Materjali värv</h3></td>";
        echo "</tr>";
        while($kask->fetch()){
            echo "<td>".htmlspecialchars($Nimetus)."</td>";
            echo "<td>".htmlspecialchars($Suurus)."</td>";
            echo "<td>".htmlspecialchars($Varv)."</td>";
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
