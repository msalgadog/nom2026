<option value="" selected disabled>Seleccione</option>
<?php
include("../../../php/config/db.php");
$localidad_r  = $_POST['localidad'];
$categoria     = $_POST['categoria'];
$dominio     = $_POST['dominio'];
#$cats = mysqli_query($conn, "SELECT ACCION FROM seg_cats WHERE LOCALIDAD='$localidad_r' AND CATEGORIA ='$categoria' AND DOMINIO ='$dominio' GROUP BY ACCION;");
$cats = mysqli_query($conn, "SELECT ACCION FROM seg_cats WHERE  CATEGORIA ='$categoria' AND DOMINIO ='$dominio' GROUP BY ACCION;");
while ($z = mysqli_fetch_assoc($cats)) {
?>
    <option value="<?php echo $z['ACCION']; ?>"><?php echo $z['ACCION']; ?></option>
<?php
}
?>
