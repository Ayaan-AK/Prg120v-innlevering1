<?php  /* slett-klasse */
include("dynamiske-funksjoner.php");  /* dynamiske funksjoner inkludert */
?> 
<script src="funksjoner.js"></script>
<h3>Slett klasse</h3>

<form method="post" action="" id="Slettklasse" name="Slettklasse">
  Klassekode 
  <select id="klassekode" name="klassekode" required> 
    <option value="">Velg klasse</option>
    <?php listeboksKlassekode();  /* funksjon for å lage listeboks for klassekode kalt */ ?>
  </select> <br/>
  <input type="submit" value="Slett klasse" id="slettKlasseKnapp" name="slettKlasseKnapp" onclick="return bekreft()" /> 
</form>

<?php 
  if (isset($_POST ["slettKlasseKnapp"])) /* Sjekker om knappen er trykket*/
    {
      $klassekode=$_POST ["klassekode"];

      include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

          $sqlSetning="SELECT * FROM student WHERE klassekode='$klassekode';";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
          $antallRader=mysqli_num_rows($sqlResultat); 

         if ($antallRader > 0)  /* Sjekker om antall rader er mindre enn = 0 hvis rader er mer tilsvarer det at en bruker er i klassen*/
            {
              print ("Elever er registrert i klassen, slette klassen er ikke mulig");
            }
          else
            {	  
              $sqlSetning="DELETE FROM klasse WHERE klassekode='$klassekode';";
              mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; slette data i databasen");
                /* SQL-setning sendt til database-serveren */
		
              print ("F&oslash;lgende klasse er n&aring; slettet: $klassekode  <br />");
            }

    }
?>