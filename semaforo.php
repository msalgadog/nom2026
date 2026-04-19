<?php
if (!function_exists('nom035_h')) {
    function nom035_h($value) {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

ini_set('memory_limit', '-1');
include("../php/config/db.php");

// Saneo de GET parameters
$localidadParam = trim((string) ($_GET['localidad'] ?? ''));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>NOM035</title>
    <meta name="description" content="Aplicación NOM035 COSTCO">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="../assets/css/Gotham%20Black.css">
    <link rel="stylesheet" href="../assets/css/Gotham%20Regular.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="../assets/css/form-validator/theme-default.min.css">
    <link rel="stylesheet" href="../assets/css/Stats-icons.css">
    <link rel="stylesheet" href="../assets/css/steps-progressbar.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.6.0/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/sc-2.0.7/datatables.min.css" />

    <style>
        body {
            font-size: 10px;
        }
    </style>


</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="semaforo.php" method="GET">
                    <select class="form-control filtro" name="localidad" id="localidad" data-validation="required">
                        <optgroup label="Compañías">
                            <option value="" disabled selected>Seleccione Localidad </option>
                            <option value="TODOS">TODOS</option>
                            <?php
                            $com = sprintf("SELECT empleados_t_localidad FROM nom035_empleados group by empleados_t_localidad;");
                            if ($com_exe = mysqli_query($conn, $com)) {
                                $com_cnt = mysqli_num_rows($com_exe);
                                if ($com_cnt > 0) {
                                    $seltodos = "";
                                    if ($localidadParam === "TODOS") {
                                        echo '<option value="TODOS" selected>TODOS </option>';
                                        $seltodos = 1;
                                    } else {
                                        $seltodos = "";
                                    }
                                    while ($com_row = mysqli_fetch_assoc($com_exe)) {
                                        $sel = "";
                                        if (!empty($localidadParam)) {
                                            if ($com_row['empleados_t_localidad'] === $localidadParam) {
                                                $sel = 'selected';
                                            }
                                        }
                                        echo '<option value="' . nom035_h($com_row['empleados_t_localidad']) . '"' . $sel . '>' . nom035_h($com_row['empleados_t_localidad']) . '</option>';
                                    }
                                } else {
                                    echo "No existen compañías";
                                }
                            } else {
                                echo $conn->error;
                            }
                            ?>
                        </optgroup>
                    </select>
                    <button class="bnt btn-block btn-success" type="submit">Generar tabla</button>
                </form>
            </div>
        </div>
    </div>
    <?php if (!empty($localidadParam)) : ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12"><a href="phpspreadsheet_semaforo.php?localidad=<?php echo urlencode($localidadParam); ?>" class="btn btn primary btn-block" role="button">Generar Reporte</a></div>
                <div class="col-12">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>Distrito</th>
                                <th>Localidad</th>
                                <th>Departamento</th>
                                <th>N° Empleado</th>
                                <th>Género</th>
                                <th>Fecha de nacimiento</th>
                                <th>Edad</th>
                                <th>Antigüedad</th>
                                <td>Total Final Nivel</td>
                                <td>Total Final</td>
                                <td>Ambiente de trabajo Nivel</td>
                                <td>Ambiente de trabajo</td>
                                <td>Condiciones en el ambiente de trabajo Nivel</td>
                                <td>Condiciones en el ambiente de trabajo</td>
                                <td>Condiciones peligrosas e inseguras</td>
                                <td>Condiciones deficientes e insalubres</td>
                                <td>Trabajos peligrosos</td>
                                <td>Factores propios de la actividad Nivel</td>
                                <td>Factores propios de la actividad</td>
                                <td>Carga de trabajo Nivel</td>
                                <td>Carga de trabajo</td>
                                <td>Cargas cuantitativas</td>
                                <td>Ritmos de trabajo acelerado</td>
                                <td>Carga mental</td>
                                <td>Cargas psicológicas emocionales</td>
                                <td>Cargas de alta responsabilidad</td>
                                <td>Cargas contradictorias o inconsistentes</td>
                                <td>Falta de control sobre el trabajo Nivel</td>
                                <td>Falta de control sobre el trabajo</td>
                                <td>Falta de control y autonomía sobre el trabajo</td>
                                <td>Limitada o nula posibilidad de desarrollo</td>
                                <td>Insuficiente participación y manejo del cambio</td>
                                <td>Limitada o inexistente capacitación</td>
                                <td>Organización del tiempo de trabajo Nivel</td>
                                <td>Organización del tiempo de trabajo</td>
                                <td>Jornada de trabajo Nivel</td>
                                <td>Jornada de trabajo</td>
                                <td>Jornadas de trabajo extensas</td>
                                <td>Interferencia en la relación trabajo-familia Nivel</td>
                                <td>Interferencia en la relación trabajo-familia</td>
                                <td>Influencia del trabajo fuera del centro laboral</td>
                                <td>Influencia de las responsabilidades familiares</td>
                                <td>Liderazgo y relaciones en el trabajo Nivel</td>
                                <td>Liderazgo y relaciones en el trabajo</td>
                                <td>Liderazgo Nivel</td>
                                <td>Liderazgo</td>
                                <td>Escaza claridad de funciones</td>
                                <td>Características del liderazgo</td>
                                <td>Relaciones en el trabajo Nivel</td>
                                <td>Relaciones en el trabajo</td>
                                <td>Relaciones sociales en el trabajo</td>
                                <td>Deficiente relación con los colaboradores que supervisa</td>
                                <td>Violencia Nivel</td>
                                <td>Violencia</td>
                                <td>Violencia laboral</td>
                                <td>Entorno organizacional Nivel</td>
                                <td>Entorno organizacional</td>
                                <td>Reconocimiento del desempeño Nivel</td>
                                <td>Reconocimiento del desempeño</td>
                                <td>Escasa o nula retroalimentación del desempeño</td>
                                <td>Escaso o nulo reconocimiento y compensación</td>
                                <td>Insuficiente sentido de pertenencia e inestabilidad Nivel</td>
                                <td>Insuficiente sentido de pertenencia e inestabilidad</td>
                                <td>Limitado sentido de pertenencia</td>
                                <td>Inestabilidad laboral</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_GET['localidad'])) {
                                $localidad = $_GET['localidad'];
                            } else {
                                $localidad = "";
                            }
                            if ($localidad=="TODOS") {
                                $and = "";
                            }else{
                                $and = "AND empleados_t_localidad = '$localidad'";
                            }                            
                            $respuestas = sprintf("SELECT empleados_distrito,empleados_dpto, empleados_t_localidad, empleados_n_empleado,empleados_genero,empleados_fecha_nacimiento,empleados_edad,empleados_fecha_antiguedad,item_1 AS resp1, item_2 AS resp2, item_3 AS resp3, item_4 AS resp4, item_5 AS resp5, item_6 AS resp6, item_7 AS resp7, item_8 AS resp8, item_9 AS resp9, item_10 AS resp10, item_11 AS resp11, item_12 AS resp12, item_13 AS resp13, item_14 AS resp14, item_15 AS resp15, item_16 AS resp16, item_17 AS resp17, item_18 AS resp18, item_19 AS resp19, item_20 AS resp20, item_21 AS resp21, item_22 AS resp22, item_23 AS resp23, item_24 AS resp24, item_25 AS resp25, item_26 AS resp26, item_27 AS resp27, item_28 AS resp28, item_29 AS resp29, item_30 AS resp30, item_31 AS resp31, item_32 AS resp32, item_33 AS resp33, item_34 AS resp34, item_35 AS resp35, item_36 AS resp36, item_37 AS resp37, item_38 AS resp38, item_39 AS resp39, item_40 AS resp40, item_41 AS resp41, item_42 AS resp42, item_43 AS resp43, item_44 AS resp44, item_45 AS resp45, item_46 AS resp46, item_47 AS resp47, item_48 AS resp48, item_49 AS resp49, item_50 AS resp50, item_51 AS resp51, item_52 AS resp52, item_53 AS resp53, item_54 AS resp54, item_55 AS resp55, item_56 AS resp56, item_57 AS resp57, item_58 AS resp58, item_59 AS resp59, item_60 AS resp60, item_61 AS resp61, item_62 AS resp62, item_63 AS resp63, item_64 AS resp64, item_65 AS resp65, item_66 AS resp66, item_67 AS resp67, item_68 AS resp68, item_69 AS resp69, item_70 AS resp70, item_71 AS resp71, item_72 AS resp72
                            FROM nom035_empleados 
                            LEFT JOIN nom035_usuarios 
                            ON nom035_empleados.empleados_n_empleado=nom035_usuarios.usuarios_nempleado
                            LEFT JOIN nom035_respuestas 
                            ON nom035_empleados.empleados_n_empleado=nom035_respuestas.respuestas_nempleado
                            WHERE nom035_usuarios.usuarios_habilitado=1 AND final_encuesta=1 $and;");

                            if ($respuestas_exe = mysqli_query($conn, $respuestas)) {
                                $respuestas_cnt = mysqli_num_rows($respuestas_exe);                                
                                if ($respuestas_cnt > 0) {
                                    
                                    while ($respuestas_row = mysqli_fetch_assoc($respuestas_exe)) {                                      
                                        
                                        $a = 1;
                                        while ($a <= 72) {
                                            $r = "resp" . $a;
                                            ${"resp" . $a} = $respuestas_row[$r];
                                            $a++;
                                        }
                                        include("../resultados/funciones/calculos_asigna.php");
                                        echo "<tr>";
                                        echo "<td>Distrito " . $respuestas_row['empleados_distrito'] . "</td>\n";
                                        echo "<td>" . $respuestas_row['empleados_t_localidad'] . "</td>\n";
                                        echo "<td>" . $respuestas_row['empleados_dpto'] . "</td>\n";
                                        echo "<td>" . $respuestas_row['empleados_n_empleado'] . "</td>\n";
                                        echo "<td>" . $respuestas_row['empleados_genero'] . "</td>\n";
                                        echo "<td>" . $respuestas_row['empleados_fecha_nacimiento'] . "</td>\n";
                                        echo "<td>" . $respuestas_row['empleados_edad'] . "</td>\n";
                                        echo "<td>" . $respuestas_row['empleados_fecha_antiguedad'] . "</td>\n";
                                        echo "<td style='background-color:" . $final_color . ";'>" . $final_txt . "</td>\n";
                                        echo "<td style='background-color:" . $final_color . ";'>" . $FINAL . "</td>\n";
                                        echo "<td style='background-color:" . C("C1", $C1, "COLOR") . ";'>" . C("C1", $C1, "MENSAJE") . "</td>\n";
                                        echo "<td style='background-color:" . C("C1", $C1, "COLOR") . ";'>"  . C("C1", $C1, "RESULTADO") . "</td>\n";
                                        echo "<td style='background-color:" . D("D1", $D1, "COLOR") . ";'>" . D("D1", $D1, "MENSAJE") . "</td>\n";
                                        echo "<td style='background-color:" . D("D1", $D1, "COLOR") . ";'>" . D("D1", $D1, "RESULTADO") . "</td>\n";
                                        echo "<td>" . $DIM1 . "</td>\n";
                                        echo "<td>" . $DIM2 . "</td>\n";
                                        echo "<td>" . $DIM3 . "</td>\n";
                                        echo "<td style='background-color:" . C("C2", $C2, "COLOR") . ";'>" . C("C2", $C2, "MENSAJE") . "</td>\n";
                                        echo "<td style='background-color:" . C("C2", $C2, "COLOR") . ";'>"  . C("C2", $C2, "RESULTADO") . "</td>\n";
                                        echo "<td style='background-color:" . D("D2", $D2, "COLOR") . ";'>" . D("D2", $D2, "MENSAJE") . "</td>\n";
                                        echo "<td style='background-color:" . D("D2", $D2, "COLOR") . ";'>" . D("D2", $D2, "RESULTADO") . "</td>\n";
                                        echo "<td>" . $DIM4 . "</td>\n";
                                        echo "<td>" . $DIM5 . "</td>\n";
                                        echo "<td>" . $DIM6 . "</td>\n";
                                        echo "<td>" . $DIM7 . "</td>\n";
                                        echo "<td>" . $DIM8 . "</td>\n";
                                        echo "<td>" . $DIM9 . "</td>\n";
                                        echo "<td style='background-color:" . D("D3", $D3, "COLOR") . ";'>" . D("D3", $D3, "MENSAJE") . "</td>\n";
                                        echo "<td style='background-color:" . D("D3", $D3, "COLOR") . ";'>" . D("D3", $D3, "RESULTADO") . "</td>\n";
                                        echo "<td>" . $DIM10 . "</td>\n";
                                        echo "<td>" . $DIM11 . "</td>\n";
                                        echo "<td>" . $DIM12 . "</td>\n";
                                        echo "<td>" . $DIM13 . "</td>\n";
                                        echo "<td style='background-color:" . C("C3", $C3, "COLOR") . ";'>" . C("C3", $C3, "MENSAJE") . "</td>\n";
                                        echo "<td style='background-color:" . C("C3", $C3, "COLOR") . ";'>"  . C("C3", $C3, "RESULTADO") . "</td>\n";
                                        echo "<td style='background-color:" . D("D4", $D4, "COLOR") . ";'>" . D("D4", $D4, "MENSAJE") . "</td>\n";
                                        echo "<td style='background-color:" . D("D4", $D4, "COLOR") . ";'>" . D("D4", $D4, "RESULTADO") . "</td>\n";
                                        echo "<td>" . $DIM14 . "</td>\n";
                                        echo "<td style='background-color:" . D("D5", $D5, "COLOR") . ";'>" . D("D5", $D5, "MENSAJE") . "</td>\n";
                                        echo "<td style='background-color:" . D("D5", $D5, "COLOR") . ";'>" . D("D5", $D5, "RESULTADO") . "</td>\n";
                                        echo "<td>" . $DIM15 . "</td>\n";
                                        echo "<td>" . $DIM16 . "</td>\n";
                                        echo "<td style='background-color:" . C("C4", $C4, "COLOR") . ";'>" . C("C4", $C4, "MENSAJE") . "</td>\n";
                                        echo "<td style='background-color:" . C("C4", $C4, "COLOR") . ";'>"  . C("C4", $C4, "RESULTADO") . "</td>\n";
                                        echo "<td style='background-color:" . D("D6", $D6, "COLOR") . ";'>" . D("D6", $D6, "MENSAJE") . "</td>\n";
                                        echo "<td style='background-color:" . D("D6", $D6, "COLOR") . ";'>" . D("D6", $D6, "RESULTADO") . "</td>\n";
                                        echo "<td>" . $DIM17 . "</td>\n";
                                        echo "<td>" . $DIM18 . "</td>\n";
                                        echo "<td style='background-color:" . D("D7", $D7, "COLOR") . ";'>" . D("D7", $D7, "MENSAJE") . "</td>\n";
                                        echo "<td style='background-color:" . D("D7", $D7, "COLOR") . ";'>" . D("D7", $D7, "RESULTADO") . "</td>\n";
                                        echo "<td>" . $DIM19 . "</td>\n";
                                        echo "<td>" . $DIM20 . "</td>\n";
                                        echo "<td style='background-color:" . D("D8", $D8, "COLOR") . ";'>" . D("D8", $D8, "MENSAJE") . "</td>\n";
                                        echo "<td style='background-color:" . D("D8", $D8, "COLOR") . ";'>" . D("D8", $D8, "RESULTADO") . "</td>\n";
                                        echo "<td>" . $DIM21 . "</td>\n";
                                        echo "<td style='background-color:" . C("C5", $C5, "COLOR") . ";'>" . C("C5", $C5, "MENSAJE") . "</td>\n";
                                        echo "<td style='background-color:" . C("C5", $C5, "COLOR") . ";'>"  . C("C5", $C5, "RESULTADO") . "</td>\n";
                                        echo "<td style='background-color:" . D("D9", $D9, "COLOR") . ";'>" . D("D9", $D9, "MENSAJE") . "</td>\n";
                                        echo "<td style='background-color:" . D("D9", $D9, "COLOR") . ";'>" . D("D9", $D9, "RESULTADO") . "</td>\n";
                                        echo "<td>" . $DIM22 . "</td>\n";
                                        echo "<td>" . $DIM23 . "</td>\n";
                                        echo "<td style='background-color:" . D("D10", $D10, "COLOR") . ";'>" . D("D10", $D10, "MENSAJE") . "</td>\n";
                                        echo "<td style='background-color:" . D("D10", $D10, "COLOR") . ";'>" . D("D10", $D10, "RESULTADO") . "</td>\n";
                                        echo "<td>" . $DIM24 . "</td>\n";
                                        echo "<td>" . $DIM25 . "</td>\n";
                                        echo "</tr>";

                                    }
                                } else {
                                    echo "Error";
                                }
                            } else {
                                exit($conn->error);
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endif; ?>




    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.6.0/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/sc-2.0.7/datatables.min.js"></script>

    <script>
        $('#myTable').DataTable({
            search: false,
            paging: false,
            ordering: false,
            dom: 'rtip',
            buttons: [
                'excel'
            ]
        });
    </script>
</body>

</html>