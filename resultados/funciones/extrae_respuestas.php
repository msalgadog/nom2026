<?php
ini_set('max_execution_time', 0);
$ExtWhere = "";
$select = "";
$order = "";
$resultados = 1;
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['comp'])&&$_GET['comp']!="TODOS") {
        if ($_GET['comp']!="") {
            $ExtWhere .= "AND nom035_empleados.empleados_comp = '" . $_GET['comp'] . "' ";
        }        
    }
    if (isset($_GET['dist_distin'])&&$_GET['dist_distin']!="TODOS") {
        if ($_GET['dist_distin']!="") {
            $ExtWhere .= "AND nom035_empleados.empleados_distrito = '" . $_GET['dist_distin'] . "' ";
        }
    }  
    if (isset($_GET['localidad'])&&$_GET['localidad']!="TODOS") {
        if($_GET['localidad']!=""){
            $ExtWhere .= "AND nom035_empleados.empleados_t_localidad = '" . $_GET['localidad'] . "' ";
        }        
    }
    if (isset($_GET['dpto'])&&$_GET['dpto']!="TODOS") {
        if($_GET['dpto']!=""){
            $ExtWhere .= "AND nom035_empleados.empleados_dpto = '" . $_GET['dpto'] . "' ";
        }
    }
    if (isset($_GET['grupo'])&&$_GET['grupo']!="TODOS") {
        if ($_GET['grupo']!="") {
         $ExtWhere .= "AND nom035_empleados.empleados_gurpo = '" . $_GET['grupo'] . "' ";
        }
     }        
    if (isset($_GET['puesto'])&&$_GET['puesto']!="TODOS") {
        if ($_GET['puesto']!="") {
            $ExtWhere .= "AND nom035_empleados.empleados_puesto = '" . $_GET['puesto'] . "' ";
        }
    }
    
    if (isset($_GET['genero'])&&$_GET['genero']!="TODOS") {
        if ($_GET['genero']!="") {
            $ExtWhere .= "AND nom035_empleados.empleados_genero = '" . $_GET['genero'] . "' ";
        }
    }
    if (isset($_GET['edad'])&&$_GET['edad']!="TODOS") {
        if ($_GET['edad']!="") {
            $eds         = explode(',', $_GET['edad']);
            $ExtWhere .= "AND nom035_empleados.empleados_edad between '$eds[0]' and '$eds[1]' ";
            #$ExtWhere .= "AND nom035_empleados.empleados_edad = '" . $_GET['edad'] . "' ";
        }
    }
    if (isset($_GET['mapa']) && $_GET['mapa'] =! "") {
        $select = "nom035_empleados.empleados_t_localidad AS LOCALIDAD,";
        $order = "GROUP BY nom035_empleados.empleados_t_localidad";
        $resultados = 2;
    }
    if ((isset($_GET['rcomp'])&&$_GET['rcomp']!="")&&isset($filtro)) {
        switch ($_GET['rcomp']) {
            case 'DISTRITO':
                $ExtWhere .= "AND nom035_empleados.empleados_distrito = '" . $filtro . "' ";
                break;
            case 'LOCALIDAD':
                $ExtWhere .= "AND nom035_empleados.empleados_t_localidad = '" . $filtro . "' ";
                break;
            default:
                # code...
                break;
        }
    }
}
$respuestas = sprintf("SELECT $select
AVG(item_1) AS resp1, AVG(item_2) AS resp2, AVG(item_3) AS resp3, AVG(item_4) AS resp4, AVG(item_5) AS resp5, AVG(item_6) AS resp6, AVG(item_7) AS resp7, AVG(item_8) AS resp8, AVG(item_9) AS resp9, AVG(item_10) AS resp10, AVG(item_11) AS resp11, AVG(item_12) AS resp12, AVG(item_13) AS resp13, AVG(item_14) AS resp14, AVG(item_15) AS resp15, AVG(item_16) AS resp16, AVG(item_17) AS resp17, AVG(item_18) AS resp18, AVG(item_19) AS resp19, AVG(item_20) AS resp20, AVG(item_21) AS resp21, AVG(item_22) AS resp22, AVG(item_23) AS resp23, AVG(item_24) AS resp24, AVG(item_25) AS resp25, AVG(item_26) AS resp26, AVG(item_27) AS resp27, AVG(item_28) AS resp28, AVG(item_29) AS resp29, AVG(item_30) AS resp30, AVG(item_31) AS resp31, AVG(item_32) AS resp32, AVG(item_33) AS resp33, AVG(item_34) AS resp34, AVG(item_35) AS resp35, AVG(item_36) AS resp36, AVG(item_37) AS resp37, AVG(item_38) AS resp38, AVG(item_39) AS resp39, AVG(item_40) AS resp40, AVG(item_41) AS resp41, AVG(item_42) AS resp42, AVG(item_43) AS resp43, AVG(item_44) AS resp44, AVG(item_45) AS resp45, AVG(item_46) AS resp46, AVG(item_47) AS resp47, AVG(item_48) AS resp48, AVG(item_49) AS resp49, AVG(item_50) AS resp50, AVG(item_51) AS resp51, AVG(item_52) AS resp52, AVG(item_53) AS resp53, AVG(item_54) AS resp54, AVG(item_55) AS resp55, AVG(item_56) AS resp56, AVG(item_57) AS resp57, AVG(item_58) AS resp58, AVG(item_59) AS resp59, AVG(item_60) AS resp60, AVG(item_61) AS resp61, AVG(item_62) AS resp62, AVG(item_63) AS resp63, AVG(item_64) AS resp64, AVG(item_65) AS resp65, AVG(item_66) AS resp66, AVG(item_67) AS resp67, AVG(item_68) AS resp68, AVG(item_69) AS resp69, AVG(item_70) AS resp70, AVG(item_71) AS resp71, AVG(item_72) AS resp72
FROM nom035_usuarios 
LEFT JOIN nom035_respuestas ON nom035_usuarios.usuarios_nempleado = nom035_respuestas.respuestas_nempleado
LEFT JOIN nom035_empleados ON nom035_usuarios.usuarios_nempleado = nom035_empleados.empleados_n_empleado
WHERE nom035_usuarios.usuarios_habilitado=1 AND nom035_respuestas.final_encuesta=1 $ExtWhere $order;");

if ($respuestas_exe = mysqli_query($conn, $respuestas)) {
    $respuestas_cnt = mysqli_num_rows($respuestas_exe);
    if ($respuestas_cnt > 0) {
        if ($resultados == 1) {
            $respuestas_row = mysqli_fetch_assoc($respuestas_exe);
            $a = 1;
            while ($a <= 72) {
                $r = "resp" . $a;
                ${"resp" . $a} = $respuestas_row[$r];
                $a++;
            }
            include("calculos_asigna.php");
        } else {
            $mapa = array();
            while ($respuestas_row = mysqli_fetch_assoc($respuestas_exe)) {
                $a = 1;
                while ($a <= 72) {
                    $r = "resp" . $a;
                    ${"resp" . $a} = $respuestas_row[$r];
                    $a++;
                }
                include("calculos_asigna.php");
                $DATOS = array("TOTAL" => round($FINAL), "TEXTO" => $final_txt, "COLOR" => $final_color);
                switch ($respuestas_row['LOCALIDAD']) {
                    case 'GUADALAJARA I':
                        $loca = "GUADALAJARA_I";
                        break;
                    case 'GUADALAJARA II':
                        $loca = "GUADALAJARA_II";
                        break;
                    case 'LEON I':
                        $loca = "LEON_I";
                        break;
                    case 'LEON II':
                        $loca = "LEON_II";
                        break;
                    case 'SAN LUIS POTOSI':
                        $loca = "SAN_LUIS_POTOSI";
                        break;
                    case 'CIUDAD JUAREZ':
                        $loca = "CIUDAD_JUAREZ";
                        break;
                    case 'TIJUANA I':
                        $loca = "TIJUANA_I";
                        break;
                    case 'TIJUANA II':
                        $loca = "TIJUANA_II";
                        break;
                    case 'LOS CABOS':
                        $loca = "LOS_CABOS";
                        break;
                    case 'LOS CABOS':
                        $loca = "LOS_CABOS";
                        break;
                    case 'MONTERREY I':
                        $loca = "MONTERREY_I";
                        break;
                    case 'MONTERREY II':
                        $loca = "MONTERREY_II";
                        break;
                    case 'MONTERREY III':
                        $loca = "MONTERREY_III";
                        break;
                    case 'LABORATORIO OPTICA':
                        $loca = "LABORATORIO_OPTICA";
                        break;                        
                    default:
                        $loca = $respuestas_row['LOCALIDAD'];
                        break;
                }
                $mapa[$loca] = $DATOS;
            }
            $mapa = json_encode($mapa);
            $r = json_decode($mapa);
        }
    } else {
        $mapa = array("mensaje"=>"Error");
        $r=json_encode($mapa);
    }
} else {
    exit($conn->error);
}
