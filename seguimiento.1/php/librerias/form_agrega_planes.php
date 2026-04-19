<?php
if (!function_exists('nom035_h')) {
    function nom035_h($value) {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

// Saneo de GET parameters
$seg_planes_idParam = trim((string) ($_GET['seg_planes_id'] ?? ''));
$seg_consecutivoParam = trim((string) ($_GET['seg_consecutivo'] ?? ''));
$seg_localidadParam = trim((string) ($_GET['seg_localidad'] ?? ''));
$seg_nempleadoParam = trim((string) ($_GET['seg_nempleado'] ?? ''));
?>
<form action="php/guardar/planes_accion.php" method="post" id="agrega_plan_accion">
    <input type="hidden" name="action" value="add">
    <input type="hidden" name="seg_planes_id" value="<?php echo nom035_h($seg_planes_idParam) ?>">
    <input type="hidden" name="seg_consecutivo" value="<?php echo nom035_h($seg_consecutivoParam) ?>">
    <input type="hidden" name="seg_localidad" value="<?php echo nom035_h($seg_localidadParam) ?>">
    <input type="hidden" name="seg_nempleado" value="<?php echo nom035_h($seg_nempleadoParam) ?>">
    <input type="hidden" name="seg_planes_accion_consecutivo" value="<?php echo $but ?>">
    <div class="alert alert-primary mt-3" role="alert">
        <strong>Agregar un nuevo plan</strong>
        <p>Debe agregar un plan para posteriormente agregar actividades.</p>
        <div class="border rounded-0">
            <table class="table table-striped table-bordered table-sm table-dark">
                <caption>
                    <?php if ($but < 5) : ?>
                        <button class="btn btn-success btn-sm" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-plus-square-fill">
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"></path>
                            </svg>&nbsp;Guardar plan
                        </button>
                    <?php endif; ?>
                </caption>
                <thead>
                    <tr>
                        <th style="width:33%;">Categoría</th>
                        <th style="width:33%;">Dominio</th>
                        <th style="width:33%;">Acción NOM-035</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="form-group"><select class="form-control" name="categoria" id="categoria" data-validation="required">
                                    <optgroup label="Categorías">
                                        <option value="" selected disabled>Seleccione</option>
                                        <?php
                                        $cats = mysqli_query($conn,"SELECT CATEGORIA FROM seg_cats WHERE LOCALIDAD='$localidad_r' group by CATEGORIA;");
                                        while ($z=mysqli_fetch_assoc($cats)) {
                                            ?>
                                            <option value="<?php echo $z['CATEGORIA']; ?>"><?php echo $z['CATEGORIA']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </optgroup>
                                </select></div>
                        </td>
                        <td>
                            <div class="form-group"><select class="form-control" name="dominio" id="dominio" data-validation="required">
                                    <optgroup label="Dominios">

                                    </optgroup>
                                </select></div>
                        </td>
                        <td>
                            <div class="form-group"><select class="form-control" name="accion" id="accion" data-validation="required">
                                    <optgroup label="Acciones">

                                    </optgroup>
                                </select></div>
                        </td>
                    </tr>
                    <tr></tr>
                </tbody>
            </table>
        </div>
    </div>

</form>