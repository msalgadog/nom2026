
                    <?php if ($admin == "planes_admin") : ?>
                        <tr>
                        <td><?php echo$acnt;?></td>
                        <td>
                            <?php echo $b['seg_actividades_nombre']; ?>
                        </td>
                        <td>
                            <?php echo $b['seg_actividades_evidencia']; ?>
                        </td>
                        <td>
                            <?php
                            if ($b['seg_actividades_tipo_tiempo'] == 1) {
                                echo "Programada";
                            } else {
                                echo "Permanente";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($b['seg_actividades_tipo_tiempo'] == 1) {
                                $dates = date_create($b['seg_actividades_tipo_duedate']);
                                $dates = date_format($dates, 'd-m-Y');                                   
                                echo $dates;
                            } else {
                                echo "N/A";
                            }
                            ?>
                        </td>
                        <td style="text-align: center;">
                            <?php
                            switch ($b['seg_actividades_estatus']) {
                                case '1':
                                    echo '<span class="badge badge-primary" style="background: #B6D7A8;color: rgb(0,0,0);font-size: 15px;">Cumplidas</span>';
                                    break;
                                case '2':
                                    echo '<span class="badge badge-primary" style="font-size: 15px;background: #9FC5F8;color: #000000;">En Proceso</span>';
                                    break;
                                case '3':
                                    echo '<span class="badge badge-primary" style="font-size: 15px;background: #8E7CC3;">Programada</span>';
                                    break;
                                case '4':
                                    echo '<span class="badge badge-primary" style="font-size: 15px;background: #FF2626; cursor:pointer" data-container="body" data-toggle="popover" data-placement="right" data-content="'.$b['cancelado'].'">Cancelada</span>';
                                    break;
                                default:
                                    # code...
                                    break;
                            }
                            ?>
                        </td>
                        

                            <td class="text-center">
                                <?php if ($b['seg_actividades_estatus'] == 2 OR $b['seg_actividades_estatus'] == 3) : ?>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-danger btn-sm cancelar" data-toggle="modal" data-target="#cancelar" id="<?php echo $b['idseg_planes_accion_actividad']; ?>" data-nombre="<?php echo $b['seg_actividades_nombre']; ?>">Cancelar</button>
                                        <button type="button" class="btn btn-success btn-sm cumplir" data-toggle="modal" data-target="#cumplir" id="<?php echo $b['idseg_planes_accion_actividad']; ?>" data-nombre="<?php echo $b['seg_actividades_nombre']; ?>">Marcar cumplida</button>
                                    </div>
                                <?php endif; ?>
                            </td>
                        
                    </tr>

                    <?php else:?>
                        <tr>
                        <td><?php echo$acnt;?></td>
                        <td>
                            <?php echo $b['seg_actividades_nombre']; ?>
                        </td>
                        <td>
                            <?php echo $b['seg_actividades_evidencia']; ?>
                        </td>
                        <td>
                            <?php
                            if ($b['seg_actividades_tipo_tiempo'] == 1) {
                                echo "Programada";
                            } else {
                                echo "Permanente";
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($b['seg_actividades_tipo_tiempo'] == 1) {
                                $dates = date_create($b['seg_actividades_tipo_duedate']);
                                $dates = date_format($dates, 'd-m-Y');                                   
                                echo $dates;
                            } else {
                                echo "N/A";
                            }
                            ?>
                        </td>
                        <td style="text-align: center;">
                            <?php
                            switch ($b['seg_actividades_estatus']) {
                                case '1':
                                    echo '<span class="badge badge-primary" style="background: #B6D7A8;color: rgb(0,0,0);font-size: 15px;">Cumplidas</span>';
                                    break;
                                case '2':
                                    echo '<span class="badge badge-primary" style="font-size: 15px;background: #9FC5F8;color: #000000;">En Proceso</span>';
                                    break;
                                case '3':
                                    echo '<span class="badge badge-primary" style="font-size: 15px;background: #8E7CC3;">Programada</span>';
                                    break;
                                case '4':
                                    echo '<span class="badge badge-primary" style="font-size: 15px;background: #FF2626; cursor:pointer" data-container="body" data-toggle="popover" data-placement="right" data-content="'.$b['cancelado'].'">Cancelada</span>';
                                    break;
                                default:
                                    # code...
                                    break;
                            }
                            ?>
                        </td>
                        
                        
                    </tr>
               
                    <?php endif; ?>
