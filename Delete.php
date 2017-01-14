<?php 
 $link=mysqli_connect("localhost","selsebiil","wt");
 mysqli_select_db($link,"spajz");
 ?>
<html>
<body>
<?php

if(isset($_GET['id']))
{
$id=$_GET['id'];
$query1=mysqli_query($link,"delete from proizvod where id='$id'");
if($query1)
{
header('location:DodajProizvod.php');
}
}
?>

</body>
</html>