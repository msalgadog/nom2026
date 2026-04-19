<div class="card mt-2">
    <div class="card-body bg-light border rounded shadow">
        <form action="php/guardar/actividad.php" method="post" id="agrega_actividad">
            <input type="hidden" name="action" value="add_actividad">
            <input type="hidden" name="seg_actividades_plan_accion_id" value="<?php echo $a['idseg_planes_accion']; ?>">
            <input type="hidden" name="seg_planes_id" value="<?php echo $_GET['seg_planes_id'] ?>">
            <input type="hidden" name="seg_consecutivo" value="<?php echo $_GET['seg_consecutivo'] ?>">
            <input type="hidden" name="seg_planes_accion_consecutivo" value="<?php echo $_GET['seg_planes_accion_consecutivo'] ?>">
            <input type="hidden" name="seg_localidad" value="<?php echo $_GET['seg_localidad'] ?>">
            <input type="hidden" name="seg_nempleado" value="<?php echo $_GET['seg_nempleado'] ?>">
            <input type="hidden" name="seg_planes_accion_cat" value="<?php echo $a['seg_planes_accion_cat'] ?>">
            <input type="hidden" name="seg_planes_accion_dom" value="<?php echo $a['seg_planes_accion_dom'] ?>">
            <input type="hidden" name="seg_planes_accion_acc" value="<?php echo $a['seg_planes_accion_acc'] ?>">
            <input type="hidden" name="seg_actividades_plan_accion_id" value="<?php echo $a['idseg_planes_accion'] ?>">
            <input type="hidden" name="seg_actividades_planes_consecutivo" value="<?php echo $a['seg_planes_accion_consecutivo'] ?>">
            <input type="hidden" name="seg_num_consecutivo_act" value="<?php echo $acc_nums ?>">
            <input type="hidden" name="seg_actividades_estatus">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered table-sm">
                    <caption>
                        <?php if ($acc_nums < 6||$actividades_sin_canceladas_cnt<5) : ?>
                            <button class="btn btn-success btn-sm" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-save-fill">
                                    <path d="M8.5 1.5A1.5 1.5 0 0 1 10 0h4a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6c-.314.418-.5.937-.5 1.5v7.793L4.854 6.646a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l3.5-3.5a.5.5 0 0 0-.708-.708L8.5 9.293V1.5z"></path>
                                </svg>&nbsp;Guardar</button>
                        <?php endif; ?>
                    </caption>
                    <thead>
                        <tr>
                            <th style="width:30%;">Actividad</th>
                            <th style="width:30%;">Evidencia</th>
                            <th style="width:15%;">Programación</th>
                            <th style="width:15%;">Fecha</th>
                            <th style="display:none;width:10%;">Estatus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-group">
                                    
                                    <select class="form-control form-control-sm" name="seg_actividades_nombre" id="seg_actividades_nombre" data-validation="required">
                                        <optgroup>
                                            <option value="" selected disabled>Seleccione</option>
                                            <?php
                                            $categoria = $a['seg_planes_accion_cat'];
                                            $dominio = $a['seg_planes_accion_dom'];
                                            $accion =  $a['seg_planes_accion_acc'];
                                            #$cats = mysqli_query($conn, "SELECT ACTIVIDAD FROM seg_cats WHERE LOCALIDAD='$localidad_r' AND CATEGORIA ='$categoria' AND DOMINIO ='$dominio' AND ACCION ='$accion' GROUP BY ACTIVIDAD");
                                            $cats = mysqli_query($conn, "SELECT ACTIVIDAD FROM seg_cats WHERE CATEGORIA ='$categoria' AND DOMINIO ='$dominio' AND ACCION ='$accion' GROUP BY ACTIVIDAD");
                                            while ($z = mysqli_fetch_assoc($cats)) {
                                            ?>
                                                <option value="<?php echo $z['ACTIVIDAD']; ?>"><?php echo $z['ACTIVIDAD']; ?></option>
                                            <?php
                                            }
                                            ?>
                                            <option value="otro">Otro</option>
                                        </optgroup>
                                    </select>
                                    <input type="text" id="otro_text" name="otro_text" class="form-control" style="display:none;" data-validation="required">
                                </div>
                            </td>
                            <td>
                                <div class="form-group"><input class="form-control form-control-sm" type="text" autocomplete="off" name="seg_actividades_evidencia" data-validation="required"></div>
                            </td>
                            <td>
                                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-2" name="seg_actividades_tipo_tiempo" value="1" data-validation="required"><label class="form-check-label" for="formCheck-2">Programada</label></div>
                                <div class="form-group">
                                    <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1" name="seg_actividades_tipo_tiempo" value="2"><label class="form-check-label" for="formCheck-1">Permanente</label></div>
                                </div>
                            </td>
                            <td>
                                <div class="form-group"><input class="form-control form-control-sm" type="text" id="seg_actividades_tipo_duedate" name="seg_actividades_tipo_duedate" data-validation="date required" data-validation-format="dd-mm-yyyy" style="display:none;"></div>
                            </td>
                            <td style="display:none;">
                                <div class="form-group">
                                    <span class="badge badge-primary" style="font-size: 15px;background: #9FC5F8;color: #000000;">En Proceso</span>
                                    <span class="badge badge-primary" style="background: #B6D7A8;color: rgb(0,0,0);font-size: 15px;">Programada</span>
                                    <span class="badge badge-primary" style="font-size: 15px;background: #8E7CC3;">Cancelada</span>
                                </div>
                            </td>
                        </tr>
                        <tr></tr>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>