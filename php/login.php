<?php
include("config/db.php");
include("funciones/sqldata.php");
session_start();
date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, 'es_MX.UTF-8');
header("Content-Type: text/html;charset=utf-8");
$requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';

if ($requestMethod === "POST") {
    $usuario = trim((string) ($_POST['usuario'] ?? ''));
    $fnacimiento = trim((string) ($_POST['fnacimiento'] ?? ''));

    if ($usuario !== '' && $fnacimiento !== '') {
        $registra_login = false;
        $avanza_primer_login = false;
        $fecha          = date('Y-m-d H:i:s');
        $nempleado = sqldata($usuario, "int");
        $usuarios_fnacimiento_form = sqldata($fnacimiento, "text");

        if (!preg_match('/^[0-9]{1,6}$/', $usuario)) {
            header("Location:../index.php?err=6");
            exit('Formato de usuario invalido');
        }

        if ($stmt = $conn->prepare('SELECT 
        usuarios_id,usuarios_nempleado,usuarios_fnacimiento,usuarios_perfil,usuarios_habilitado,empleados_gurpo,empleados_apaterno,empleados_amaterno,empleados_nombres FROM nom035_usuarios 
        LEFT JOIN nom035_empleados on usuarios_nempleado=empleados_n_empleado WHERE usuarios_habilitado=1 AND usuarios_nempleado = ?')) {
            $stmt->bind_param('i',  $nempleado);
            $stmt->execute();
            $stmt->store_result();
            if($stmt->num_rows > 0){
                $stmt->bind_result(
                    $usuarios_id, $usuarios_nempleado, $usuarios_fnacimiento,$usuarios_perfil,$usuarios_habilitado,$empleados_gurpo,$empleados_apaterno,$empleados_amaterno,$empleados_nombres);
                $stmt->fetch();
                $usuarios_fnacimiento = strtotime((string) $usuarios_fnacimiento);
                $usuarios_fnacimiento_form = strtotime($fnacimiento);

                if ($usuarios_fnacimiento === false || $usuarios_fnacimiento_form === false) {
                    $stmt->close();
                    header("Location:../index.php?err=7");
                    exit('Formato de fecha invalido');
                }

                if($usuarios_fnacimiento === $usuarios_fnacimiento_form){
                    session_regenerate_id();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['nombres'] = $empleados_nombres;
                    $_SESSION['apaterno'] = $empleados_apaterno;
                    $_SESSION['amaterno'] = $empleados_amaterno;
                    $_SESSION['perfil'] = $usuarios_perfil;
                    $_SESSION['usuarios_nempleado'] = $usuarios_nempleado;
                    include("funciones/registra_login.php");  
                    if ($registra_login) {
                        include("funciones/primer_login.php");
                        if ($avanza_primer_login) {
                            $stmt->close();
                            header("Location:../home.php?login");
                            exit;
                        }else{
                            $stmt->close();
                            exit("Ocurrió un error complejo");
                        }
                    } else {
                        $stmt->close();
                        header("Location:../index.php?err=8");
                        exit('No se pudo registrar el login');
                    }                           
                }else{
                    $stmt->close();
                    header("Location:../index.php?err=2");
                    exit("la contraseña es incorrecta");
                }
            }else{
                $stmt->close();
                header("Location:../index.php?err=3");
                exit('No se encontró el usuario');
            }
        } else {
            exit($conn->error);
        }
    } else {
        header("Location:../index.php?err=4");
        exit('No se recibió un usuario y contraseña');
    }
} else {
    header("Location:../index.php?err=5");
    exit('No se recibió una petición adecuada');
}