<?php
include("../php/config/db.php");
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
                <form action="respuestas_localidad.php" method="GET">
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
                                    if (isset($_GET['localidad']) && $_GET['localidad'] == "TODOS") {
                                        echo '<option value="TODOS" selected>TODOS </option>';
                                        $seltodos = 1;
                                    } else {

                                        $seltodos = "";
                                    }
                                    while ($com_row = mysqli_fetch_assoc($com_exe)) {
                                        $sel = "";
                                        if (isset($_GET['localidad'])) {
                                            if ($com_row['empleados_t_localidad'] == $_GET['localidad']) {
                                                $sel = 'selected';
                                            }
                                        }
                                        echo '<option value="' . $com_row['empleados_t_localidad'] . '"' . $sel . '>' . $com_row['empleados_t_localidad'] . '</option>';
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
    <?php if (isset($_GET['localidad'])) : ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>N</th>
                                <th>Dpto</th>
                                <th>Localidad</th>
                                <th>N° Empleado</th>
                                <th>Género</th>
                                <th>Fecha de nacimiento</th>
                                <th>Edad</th>
                                <th>Antigüedad</th>                                
                                <?php
                                $preguntas = "SELECT * FROM nom035_preguntas";
                                $pregexe = $conn->query($preguntas);
                                $pregunta = 0;
                                while ($pregexe_row = $pregexe->fetch_assoc()) {

                                    if ($pregexe_row["pregunta_id"] == 64) {
                                        echo "<th>" . $pregexe_row["pregunta_reactivo"] . "</th>\n";
                                        echo "<th>Valor: " . $pregexe_row["pregunta_reactivo"] . "</th>\n";
                                        echo "<th>Atención a Clientes</th>";
                                    } elseif ($pregexe_row["pregunta_id"] == 68) {
                                        echo "<th>" . $pregexe_row["pregunta_reactivo"] . "</th>\n";
                                        echo "<th>Valor: " . $pregexe_row["pregunta_reactivo"] . "</th>\n";
                                        echo "<th>Soy Jefe</th>";
                                    } elseif ($pregexe_row["pregunta_id"] > 0 && $pregexe_row["pregunta_id"] < 65) {
                                        echo "<th>" . $pregexe_row["pregunta_reactivo"] . "</th>\n";
                                        echo "<th>Valor: " . $pregexe_row["pregunta_reactivo"] . "</th>\n";
                                    } elseif ($pregexe_row["pregunta_id"] > 64 && $pregexe_row["pregunta_id"] < 70) {
                                        echo "<th>" . $pregexe_row["pregunta_reactivo"] . "</th>\n";
                                        echo "<th>Valor: " . $pregexe_row["pregunta_reactivo"] . "</th>\n";
                                    } elseif ($pregexe_row["pregunta_id"] > 67 && $pregexe_row["pregunta_id"] < 73) {
                                        echo "<th>" . $pregexe_row["pregunta_reactivo"] . "</th>\n";
                                        echo "<th>Valor: " . $pregexe_row["pregunta_reactivo"] . "</th>\n";
                                    }
                                }
                                ?>
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
                            
                            $respuestas = "SELECT empleados_dpto,empleados_t_localidad,empleados_n_empleado,empleados_genero,empleados_fecha_nacimiento,empleados_edad,empleados_fecha_antiguedad,item_1, item_2, item_3, item_4, item_5, item_6, item_7, item_8, item_9, item_10, item_11, item_12, item_13, item_14, item_15, item_16, item_17, item_18, item_19, item_20, item_21, item_22, item_23, item_24, item_25, item_26, item_27, item_28, item_29, item_30, item_31, item_32, item_33, item_34, item_35, item_36, item_37, item_38, item_39, item_40, item_41, item_42, item_43, item_44, item_45, item_46, item_47, item_48, item_49, item_50, item_51, item_52, item_53, item_54, item_55, item_56, item_57, item_58, item_59, item_60, item_61, item_62, item_63, item_64, atencion_clientes, item_65, item_66, item_67, item_68, soy_jefe,item_69,item_70, item_71, item_72 FROM nom035_empleados 
                            LEFT JOIN nom035_usuarios 
                            ON nom035_empleados.empleados_n_empleado=nom035_usuarios.usuarios_nempleado
                            LEFT JOIN nom035_respuestas 
                            ON nom035_empleados.empleados_n_empleado=nom035_respuestas.respuestas_nempleado
                            WHERE nom035_usuarios.usuarios_habilitado=1 AND final_encuesta=1 $and ;";
                            if($respuestagexe = mysqli_query($conn,$respuestas)){
                                echo"OK";
                            }else{
                                echo $conn->error;
                            }
                            $item = 1;
                            $array_cero_cuatro = array(1, 4, 23, 24, 25, 26, 27, 28, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 55, 56, 57);
                            $array_cuatro_cero = array(2, 3, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 29, 54, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72);
                            while ($respuestagexe_row = mysqli_fetch_assoc($respuestagexe)) {
                                echo "<tr>";
                                echo "<td>" . $item . "</td>";
                                foreach ($respuestagexe_row as $field => $value) {
                                    if ($field == "empleados_dpto" || $field == "empleados_t_localidad" || $field == "empleados_n_empleado" || $field == "atencion_clientes" || $field == "soy_jefe"|| $field == "empleados_genero"|| $field == "empleados_fecha_nacimiento"|| $field == "empleados_edad"|| $field == "empleados_fecha_antiguedad") {
                                        echo "<td>" . $value . "</td>";
                                    } else {
                                        echo "<td>" . $value . "</td>";
                                        $field = explode("_", $field);
                                        if (in_array($field[1], $array_cuatro_cero)) {
                                            switch ($value) {
                                                case '4':
                                                    $texto = "SIEMPRE";
                                                    break;
                                                case '3':
                                                    $texto = "CASI SIEMPRE";
                                                    break;
                                                case '2':
                                                    $texto = "ALGUNAS VECES";
                                                    break;
                                                case '1':
                                                    $texto = "CASI NUNCA";
                                                    break;
                                                case '0':
                                                    $texto = "NUNCA";
                                                    break;
                                                default:
                                                    $texto = "N/A";
                                                    break;
                                            }
                                        } elseif (in_array($field[1], $array_cero_cuatro)) {
                                            switch ($value) {
                                                case '0':
                                                    $texto = "SIEMPRE";
                                                    break;
                                                case '1':
                                                    $texto = "CASI SIEMPRE";
                                                    break;
                                                case '2':
                                                    $texto = "ALGUNAS VECES";
                                                    break;
                                                case '3':
                                                    $texto = "CASI NUNCA";
                                                    break;
                                                case '4':
                                                    $texto = "NUNCA";
                                                    break;
                                                default:
                                                    $texto = "N/A";
                                                    break;
                                            }
                                        } else {
                                            $texto = "ERROR FATAL";
                                        }
                                        echo "<td>" . $texto . "</td>";
                                    }
                                }
                                echo "</tr>";
                                $item++;
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
            dom: 'Brtip',
            buttons: [
                'excel'
            ]
        });
    </script>
</body>

</html>