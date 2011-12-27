<?php

function presenation_display( $Litem_src, $presentationstartedat)
{
  echo "<div>";
  echo "<div>";
  echo "<p> <a href='$Litem_src'> Presentation Started at : $presentationstartedat </a> </p> ";
  echo "</div> ";
  echo "<hr class='hr1'>";
  echo "</div>";
}

if ($USERLOGGED != 1)
{
    echo  "<h2>ATTENTION: Please Log in to access Presentations </h2>";
}
else 
{
    echo "<h2> List of Presentations </h2>";
    $Lid = 0;
    $counter = 0;
    while($row = mysql_fetch_array($qMemProd)){
        $counter++;
	    echo presenation_display($row['presentation_url'], $row['presentation_url_created_at']);
    }
    if( !$counter ) { //  warn about not having products
    echo  "<h4> No Presentation Found</h4>";
    } 

}

?>

