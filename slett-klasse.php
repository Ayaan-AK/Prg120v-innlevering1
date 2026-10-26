<?php 
	print ("<h3>Slett klasse</h3>"); 
?> 

<?php  /* slett-klasse */
/*
/*  Programmet lager et skjema for å velge en klasse som skal slettes  
/*  Programmet sletter den valgte klassen
*/
?> 

<script src="funksjoner.js"> </script>

<h3>Slett klasse</h3>

<form method="post" action="" id="slettKlasseSkjema" name="slettKlasseSkjema" onSubmit="return bekreft()">
  Klassekode <input type="text" id="klassekode" name="klassekode" required /> <br/>
  <select id="slettklassekode" name="slettklassekode" required> 
    <option value="">Velg klasse</option>
    <?php listeboksKlassekode();  /* funksjon for å lage listeboks for klassekode kalt */ ?>
  </select> <br/>
  <input type="submit" value="Slett klasse" name="slettKlasseKnapp" id="slettKlasseKnapp" /> 
</form>

<?php
  if (isset($_POST ["slettKlasseKnapp"]))
    {	
      $klassekode=$_POST ["klassekode"];

          include("db-tilkobling.php");  /* tilkobling til database-serveren utført og valg av database foretatt */

          $sqlSetning="SELECT * FROM klasse WHERE klassekode='$klassekode';";
          $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
          $antallRader=mysqli_num_rows($sqlResultat); 

          if ($antallRader==0)  /* klasse er ikke registrert */
            {
              print ("Klassen finnes ikke");
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