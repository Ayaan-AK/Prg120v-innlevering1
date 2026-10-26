<?php  /* slett-student */
include("dynamiske-funksjoner.php");  /* dynamiske funksjoner inkludert */
?> 
<script src="funksjoner.js"></script>
<h3>Slett student</h3>

<form method="post" action="" id="Slettstudent" name="Slettstudent">
  Student
  <select id="student" name="student" required> 
    <option value="">Velg Brukernavn</option>
    <?php listeboksStudentkode();  /* funksjon for å lage listeboks for studentkode kalt */ ?>
  </select> <br/>
  <input type="submit" value="Slett student" id="slettStudentKnapp" name="slettStudentKnapp" onclick="return bekreft()" /> 
</form>

<?php 
  if (isset($_POST["slettStudentKnapp"]))
    {
      $brukernavn = $_POST["student"];   /* samme navn som i select-feltet */

      include("db-tilkobling.php");

      $sqlSetning = "SELECT * FROM student WHERE brukernavn='$brukernavn';";
      $sqlResultat = mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
      $antallRader = mysqli_num_rows($sqlResultat);

      if ($antallRader == 0)   /* ingen student funnet */
        {
          print ("Finner ikke studenten, sletting er ikke mulig");
        }
      else
        {
          $sqlSetning = "DELETE FROM student WHERE brukernavn='$brukernavn';";
          mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");

          print ("F&oslash;lgende student er n&aring; slettet: $brukernavn <br />");
        }
    }
?>