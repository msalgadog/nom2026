<table class="table table-bordered table-sm" id="print" style="width:100%;" >
            <thead>
                <tr>
                    <th style="width:20%;" style="text-align:center;"><img src="http://humanpro.com.mx/nom2022/assets/img/logo1.png" width="114" height="107"></th>
                    <th  style="width:80%;" style="text-align:left;">
                        <ul class="list-group" style="text-align:left;">
                        <li class="list-group-item text-left" style="text-align:left;"><span><strong>Localidad:</strong></span> <?php echo $localidad_r; ?></li>
                        <li class="list-group-item text-left" style="text-align:left;"><span><strong>Gerente:</strong></span> <?php echo $nom_r . " " . $ap_r . " " . $apM_r; ?></li>
                        <li class="list-group-item text-left" style="text-align:left;"><span><strong>Fecha:</strong></span> <?php echo $seg_fecha_atla;  ?></li>
                        </ul>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th colspan="2">
                        <h3><?php echo $plan_row['seg_nom_plan']; ?></h3>
                        <p><?php echo $plan_row['seg_fech_plan']; ?></p>
                    </th>
                </tr>
                <?php include "lista_planes_accion.php";?>

            </tbody>
        </table>