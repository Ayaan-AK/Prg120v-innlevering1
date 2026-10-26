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
  if (isset($_POST ["slettStudentKnapp"])) /* Sjekker om knappen er trykket*/
    {
      $studentkode=$_POST ["brukernavn"];

      include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

          $sqlSetning="SELECT * FROM student WHERE klassekode='$brukernavn';";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
          $antallRader=mysqli_num_rows($sqlResultat); 

         if ($antallRader > 0)  /* Sjekker om antall rader er større enn 0 */
            {
              print ("Finner ikke noen elever i klassen, slette klassen er ikke mulig");
            }
          else
            {	  
              $sqlSetning="DELETE FROM student WHERE klassekode='$brukernavn';";
              mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
                /* SQL-setning sendt til database-serveren */
		
              print ("F&oslash;lgende student er n&aring; slettet: $brukernavn  <br />");
            }

    }
?>