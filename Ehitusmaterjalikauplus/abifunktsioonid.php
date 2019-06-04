<?php
require ('conf.php'); 


  function looRippMenyy($sqllause, $valikunimi, $valitudid=""){
     global $yhendus;
     $kask=$yhendus->prepare($sqllause);
     $kask->bind_result($id, $sisu);
     $kask->execute();
     $tulemus="<select name='$valikunimi'>";
     while($kask->fetch()){
       $lisand="";
       if($id==$valitudid){$lisand=" selected='selected'";}
       $tulemus.="<option value='$id' $lisand >$sisu</option>";
     }
     $tulemus.="</select>";
     return $tulemus;
  }
  
  
  function Materjalilisa($Nimetus, $Suurus, $Varv){
     global $yhendus;
     $kask=$yhendus->prepare("INSERT INTO 
       Ehitusmaterjalid (Nimetus, Suurus, Varv)
       VALUES (?, ?, ?)");
     $kask->bind_param("sdi", $Nimetus, $Suurus, $Varv);
     $kask->execute();
  }
  
    function Varvilisa($Varvnimetus){
     global $yhendus;
     $kask=$yhendus->prepare("INSERT INTO 
       Varv (Varvnimetus)
       VALUES (?)");
     $kask->bind_param("s", $Varvnimetus);
     $kask->execute();
  }
  
  function kustutaMaterjal($ID){
     global $yhendus;
     $kask=$yhendus->prepare("DELETE FROM Ehitusmaterjalid WHERE id=?");
     $kask->bind_param("i", $ID);
     $kask->execute();
  }
  
  function muudaKaup($kauba_id, $nimetus, $kaubagrupi_id, $hind){
     global $yhendus;
     $kask=$yhendus->prepare("UPDATE kaubad SET nimetus=?, kaubagrupi_id=?, hind=?
                      WHERE id=?");
     $kask->bind_param("sidi", $nimetus, $kaubagrupi_id, $hind, $kauba_id);
     $kask->execute();
  }
