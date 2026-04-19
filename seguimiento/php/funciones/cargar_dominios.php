<option value="" selected disabled>Seleccione</option>
<?php
include("../../../php/config/db.php");
$localidad_r  = $_POST['localidad'];
$categoria     = $_POST['categoria'];
#$cats = mysqli_query($conn, "SELECT DOMINIO FROM seg_cats WHERE LOCALIDAD='$localidad_r' AND CATEGORIA ='$categoria' GROUP BY DOMINIO;");
$cats = mysqli_query($conn, "SELECT DOMINIO FROM seg_cats WHERE  CATEGORIA ='$categoria' GROUP BY DOMINIO;");
while ($z = mysqli_fetch_assoc($cats)) {
?>
    <option value="<?php echo $z['DOMINIO']; ?>"><?php echo $z['DOMINIO']; ?></option>
<?php
}
?>