<html> 
<head> 
   <title>Ejemplo de Eliminaci�n</title> 

<script LANGUAGE="JavaScript">
function confirmSubmit()
{
var eli=confirm("Est� seguro de eliminar este registro?");
if (eli) return true ;
else return false ;
}
</script>

</head> 
<body> 

<H2>Eliminaci�n de Registros en la tabla pelicula</H2> 

<?php 
   $link=mysqli_connect("localhost","root","");
   mysqli_select_db($link,"vidioteca");
   $result=mysqli_query($link,"select * from pelicula");

?> 
   <TABLE BORDER=1> 
      <TR><TD bgcolor="#FFFFCC"><B>ID</B></TD>
          <TD bgcolor="#FFFFCC"><B>Titulo</B></TD> 	  
          <TD bgcolor="#FFFFCC"><B>Director</B></TD> 	  
		  <TD bgcolor="#FFFFCC"><B>Eliminar</B></TD> 
		  <TD bgcolor="#FFFFCC"><B>Actualizar</B></TD>
		  
     </TR> 
<?php       

  while($row = mysqli_fetch_array($result)) 
  { 
    $ti=$row["titulo"];
    $di=$row["director"];
	$id=$row["id_pelicula"];
    printf("<tr><td>%d</td><td>%s</td><td>%s</td>
	       <td><center>
          <a onclick=\"return confirmSubmit()\"href=\"peliculasAB2.php?id_pelicula=%s\"><img src='eliminar.bmp' width='14' height='14' border='0'></a>
		   </center>
           </td>
		   <td><center>
		   <a href=\"actualizanew.php?id_pelicula=%s\"><img src='actualiza.jpg' width='25' height='25' border='0'></a>
		   </center></td>
		   </tr>",$id,$ti,$di,$id,$id); 
   } 

   mysqli_free_result($result); 
   mysqli_close($link); 
?> 
</table> 
</body> 
</html> 

