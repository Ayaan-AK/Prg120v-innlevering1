<?php 
	print ("<h3>Vis alle klasser</h3>"); 
?> 

<?php  /* vis-alle-klasser */
/*
/*  Programmet skriver ut alle registrerte klasser
*/
  include("db-tilkobling.php");  /* tilkobling til database-serveren utfrt og valg av database foretatt */

  $sqlSetning="SELECT * FROM klasse;";
  
  $sqlResultat=mysqli_query($db,$sqlSetning) or die ("ikke mulig &aring; hente data fra databasen");
    /* SQL-setning sendt til database-serveren */
	
  $antallRader=mysqli_num_rows($sqlResultat);  /* antall rader i resultatet beregnet */

  print ("<h3>Registrerte klasser</h3>");
  print ("<table border=1>");  
  print ("<tr><th align=left>klassekode</th> <th align=left>klassenavn</th></tr>"); 

  for ($r=1;$r<=$antallRader;$r++)
    {
      $rad=mysqli_fetch_array($sqlResultat);  /* ny rad hentet fra sprringsresultatet */
      $klassekode=$rad["klassekode"];        /* ELLER $klassekode=$rad[0]; */
      $klassenavn=$rad["klassenavn"];    /* ELLER $klassenavn=$rad[1]; */

      print ("<tr> <td> $klassekode </td> <td> $klassenavn </td> </tr>");
    }
  print ("</table>"); 
?>