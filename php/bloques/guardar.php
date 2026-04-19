<?php
include("../session_mainfile.php");
include("../config/db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($_POST['bloque']) {
        case '1':
            $a = 1;
            while ($a < 17) {
                ${'item_' . $a} = $_POST['item_' . $a];
                $a++;
            }
            $insert_resps = sprintf("INSERT INTO nom035_respuestas (respuestas_nempleado,item_1,item_2,item_3,item_4,item_5,item_6,item_7,item_8,item_9,item_10,item_11,item_12,item_13,item_14,item_15,item_16) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            if ($respstmt = $conn->prepare($insert_resps)) {
                $respstmt->bind_param("iiiiiiiiiiiiiiiii", $usuarios_nempleado, $item_1, $item_2, $item_3, $item_4, $item_5, $item_6, $item_7, $item_8, $item_9, $item_10, $item_11, $item_12, $item_13, $item_14, $item_15, $item_16);
                $status_respstmt = $respstmt->execute();
                if ($status_respstmt === false) {
                    exit($conn->error);
                } else {
                    $completado = 1;
                    $fecha          = date('Y-m-d H:i:s');
                    $update_avance = sprintf("UPDATE nom035_usuario_avance SET usuario_avance_bloque_1=?,
                    usuario_avance_bloque_1_fecha =? WHERE usuario_avance_nempleado=?;");
                    if ($update_avance_stmt = $conn->prepare($update_avance)) {
                        $update_avance_stmt->bind_param("isi", $completado, $fecha, $usuarios_nempleado);
                        $status_update_avance_stmt = $update_avance_stmt->execute();
                        if ($status_update_avance_stmt === false) {
                            header("Location: ../../nom.php?b=2&err=1");
                        } else {
                            header("Location: ../../nom.php?b=2");
                        }
                    } else {
                        header("Location: ../../nom.php?b=2&err=3");
                    }
                }
            } else {
                exit($conn->error);
            }
            break;
        case '2':
            $a = 17;
            while ($a < 31) {
                ${'item_' . $a} = $_POST['item_' . $a];
                $a++;
            }
            $update_respuestas = sprintf("UPDATE nom035_respuestas SET item_17=?,item_18=?,item_19=?,item_20=?,item_21=?,item_22=?,item_23=?,item_24=?,item_25=?,item_26=?,item_27=?,item_28=?,item_29=?,item_30=?
             WHERE respuestas_nempleado=?;");
            if ($update_respuestas_stmt = $conn->prepare($update_respuestas)) {
                $update_respuestas_stmt->bind_param("iiiiiiiiiiiiiii", $item_17, $item_18, $item_19, $item_20, $item_21, $item_22, $item_23, $item_24, $item_25, $item_26, $item_27, $item_28, $item_29, $item_30, $usuarios_nempleado);
                $status_update_respuestas_stmt = $update_respuestas_stmt->execute();
                if ($status_update_respuestas_stmt === false) {
                    exit($update_respuestas_stmt->error);
                } else {
                    $completado = 1;
                    $fecha          = date('Y-m-d H:i:s');
                    $update_avance = sprintf("UPDATE nom035_usuario_avance SET usuario_avance_bloque_2=?,usuario_avance_bloque_2_fecha =? WHERE usuario_avance_nempleado=?;");
                    if ($update_avance_stmt = $conn->prepare($update_avance)) {
                        $update_avance_stmt->bind_param("isi", $completado, $fecha, $usuarios_nempleado);
                        $status_update_avance_stmt = $update_avance_stmt->execute();
                        if ($status_update_avance_stmt === false) {
                            header("Location: ../../nom.php?b=3&err=1");
                        } else {
                            header("Location: ../../nom.php?b=3");
                        }
                    } else {
                        header("Location: ../../nom.php?b=3&err=3");
                    }
                }
            } else {
                exit($conn->error);
            }
            break;
        case '3':
            $a = 31;
            while ($a < 47) {
                ${'item_' . $a} = $_POST['item_' . $a];
                $a++;
            }
            $update_respuestas = sprintf("UPDATE nom035_respuestas SET item_31=?,item_32=?,item_33=?,item_34=?,item_35=?,item_36=?,item_37=?,item_38=?,item_39=?,item_40=?,item_41=?,item_42=?,item_43=?,item_44=?,item_45=?,item_46=? WHERE respuestas_nempleado=?;");
            if ($update_respuestas_stmt = $conn->prepare($update_respuestas)) {
                $update_respuestas_stmt->bind_param("iiiiiiiiiiiiiiiii", $item_31, $item_32, $item_33, $item_34, $item_35, $item_36, $item_37, $item_38, $item_39, $item_40, $item_41, $item_42, $item_43, $item_44, $item_45, $item_46, $usuarios_nempleado);
                $status_update_respuestas_stmt = $update_respuestas_stmt->execute();
                if ($status_update_respuestas_stmt === false) {
                    exit($update_respuestas_stmt->error);
                } else {
                    $completado = 1;
                    $fecha          = date('Y-m-d H:i:s');
                    $update_avance = sprintf("UPDATE nom035_usuario_avance SET usuario_avance_bloque_3=?,
                    usuario_avance_bloque_3_fecha =? WHERE usuario_avance_nempleado=?;");
                    if ($update_avance_stmt = $conn->prepare($update_avance)) {
                        $update_avance_stmt->bind_param("isi", $completado, $fecha, $usuarios_nempleado);
                        $status_update_avance_stmt = $update_avance_stmt->execute();
                        if ($status_update_avance_stmt === false) {
                            header("Location: ../../nom.php?b=4&err=1");
                        } else {
                            header("Location: ../../nom.php?b=4");
                        }
                    } else {
                        header("Location: ../../nom.php?b=4&err=3");
                    }
                }
            } else {
                exit($conn->error);
            }
            break;
        case '4':
            $a = 47;
            while ($a < 65) {
                ${'item_' . $a} = $_POST['item_' . $a];
                $a++;
            }
            $update_respuestas = sprintf("UPDATE nom035_respuestas SET item_47=?,item_48=?,item_49=?,item_50=?,item_51=?,item_52=?,item_53=?,item_54=?,item_55=?,item_56=?,item_57=?,item_58=?,item_59=?,item_60=?,item_61=?,item_62=?,item_63=?,item_64=? WHERE respuestas_nempleado=?;");
            if ($update_respuestas_stmt = $conn->prepare($update_respuestas)) {
                $update_respuestas_stmt->bind_param("iiiiiiiiiiiiiiiiiii", $item_47, $item_48, $item_49, $item_50, $item_51, $item_52, $item_53, $item_54, $item_55, $item_56, $item_57, $item_58, $item_59, $item_60, $item_61, $item_62, $item_63, $item_64, $usuarios_nempleado);
                $status_update_respuestas_stmt = $update_respuestas_stmt->execute();
                if ($status_update_respuestas_stmt === false) {
                    exit($update_respuestas_stmt->error);
                } else {
                    $completado = 1;
                    $fecha          = date('Y-m-d H:i:s');
                    $update_avance = sprintf("UPDATE nom035_usuario_avance SET usuario_avance_bloque_4=?,
                    usuario_avance_bloque_4_fecha =? WHERE usuario_avance_nempleado=?;");
                    if ($update_avance_stmt = $conn->prepare($update_avance)) {
                        $update_avance_stmt->bind_param("isi", $completado, $fecha, $usuarios_nempleado);
                        $status_update_avance_stmt = $update_avance_stmt->execute();
                        if ($status_update_avance_stmt === false) {
                            header("Location: ../../nom.php?b=5&err=1");
                        } else {
                            header("Location: ../../nom.php?b=5");
                        }
                    } else {
                        header("Location: ../../nom.php?b=5&err=3");
                    }
                }
            } else {
                exit($conn->error);
            }
            break;
        case '5':
            $a = 65;
            while ($a < 73) {
                ${'item_' . $a} = NULL;
                $a++;
            }
            $atencion_clientes =     $_POST['atencion_clientes'];
            $soy_jefe =     $_POST['soy_jefe'];
            if ($_POST['atencion_clientes'] == "Si") {
                $a = 65;
                while ($a < 70) {
                    ${'item_' . $a} = $_POST['item_' . $a];
                    $a++;
                }
            } else {
            }
            if ($_POST['soy_jefe'] == "Si") {
                $a = 70;
                while ($a < 73) {
                    ${'item_' . $a} = $_POST['item_' . $a];
                    $a++;
                }
            } else {
            }
            $update_respuestas = sprintf("UPDATE nom035_respuestas SET atencion_clientes=?, item_65=?,item_66=?,item_67=?,item_68=?,item_69=?,soy_jefe=?,item_70=?,item_71=?,item_72=?,final_encuesta=? WHERE respuestas_nempleado=?;");
            if ($update_respuestas_stmt = $conn->prepare($update_respuestas)) {
                $completado = 1;
                $update_respuestas_stmt->bind_param("siiiiisiiisi", $atencion_clientes, $item_65, $item_66, $item_67, $item_68, $item_69, $soy_jefe, $item_70, $item_71, $item_72, $completado, $usuarios_nempleado);
                $status_update_respuestas_stmt = $update_respuestas_stmt->execute();
                if ($status_update_respuestas_stmt === false) {
                    exit($update_respuestas_stmt->error);
                } else {
                    $completado = 1;
                    $fecha          = date('Y-m-d H:i:s');
                    $update_avance = sprintf("UPDATE nom035_usuario_avance SET usuario_avance_bloque_5=?,
                    usuario_avance_bloque_5_fecha =?, nom_totalfin=?, nom_totalfin_fecha=? WHERE usuario_avance_nempleado=?;");
                    if ($update_avance_stmt = $conn->prepare($update_avance)) {
                        $update_avance_stmt->bind_param("isisi", $completado, $fecha, $completado, $fecha, $usuarios_nempleado);
                        $status_update_avance_stmt = $update_avance_stmt->execute();
                        if ($status_update_avance_stmt === false) {
                            header("Location: ../../nom.php?b=5&err=1");
                        } else {
                            header("Location: ../../home.php?b=fin");
                        }
                    } else {
                        header("Location: ../../nom.php?b=5&err=3&r=" . $conn->error);
                    }
                }
            } else {
                exit($conn->error);
            }
            break;
        default:
            # code...
            break;
    }
} else {
    exit("No se recibieron datos del formulario");
}
