<?php
if ($avance) {
    $show_video = false;
    $archivo_base = basename($_SERVER['PHP_SELF']);
    if ($usuario_avance_primer_login == 0) {
        /*Si no tiene primer login cerramos sesión y que vuelva a iniciar*/
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        session_destroy();
        header("Location: ../home.php");
        exit();
    } elseif ($usuario_avance_primer_login == 1 && $usuario_avance_video == 0) {
        /*Tiene primer login pero no los demográficos*/
        /*if ($archivo_base != "demograficos.php") {
            header("Location: demograficos.php");
            exit();
        }*/
        $show_video = true;
    } elseif ($usuario_avance_primer_login == 1 && $usuario_avance_video == 1 && $usuario_avance_demograficos == 0) {
        /*$show_video = true;*/
        if ($archivo_base != "demograficos.php") {
            header("Location: demograficos.php");
            exit();
        }
    } elseif ($usuario_avance_primer_login == 1 && $usuario_avance_video == 1 && $usuario_avance_demograficos == 1 && $usuario_avance_bloque_1 == 0 && $usuario_avance_bloque_2 == 0 && $usuario_avance_bloque_3 == 0 && $usuario_avance_bloque_4 == 0 && $usuario_avance_bloque_5 == 0) {
        if ($archivo_base != "encuesta.php") {
            if (!isset($_GET['b'])) {
                header("Location: encuesta.php");
                exit();
            }
        }
    } elseif ($usuario_avance_primer_login == 1 && $usuario_avance_video == 1 && $usuario_avance_demograficos == 1 && $usuario_avance_bloque_1 == 1 && $usuario_avance_bloque_2 == 0 && $usuario_avance_bloque_3 == 0 && $usuario_avance_bloque_4 == 0 && $usuario_avance_bloque_5 == 0) {
        if ($archivo_base == "nom.php") {
            if (!isset($_GET['b'])) {
                header("Location: encuesta.php");
                exit();
            } elseif ($_GET['b'] != 2) {
                header("Location: nom.php?b=2");
            }
        } elseif ($archivo_base == "home.php") {
            header("Location: nom.php?b=2");
        }
    } elseif ($usuario_avance_primer_login == 1 && $usuario_avance_video == 1 && $usuario_avance_demograficos == 1 && $usuario_avance_bloque_1 == 1 && $usuario_avance_bloque_2 == 1 && $usuario_avance_bloque_3 == 0 && $usuario_avance_bloque_4 == 0 && $usuario_avance_bloque_5 == 0) {
        if ($archivo_base == "nom.php") {
            if (!isset($_GET['b'])) {
                header("Location: encuesta.php");
                exit();
            } elseif ($_GET['b'] != 3) {
                header("Location: nom.php?b=3");
            }
        } elseif ($archivo_base == "home.php") {
            header("Location: nom.php?b=3");
        }
    } elseif ($usuario_avance_primer_login == 1 && $usuario_avance_video == 1 && $usuario_avance_demograficos == 1 && $usuario_avance_bloque_1 == 1 && $usuario_avance_bloque_2 == 1 && $usuario_avance_bloque_3 == 1 && $usuario_avance_bloque_4 == 0 && $usuario_avance_bloque_5 == 0) {
        if ($archivo_base == "nom.php") {
            if (!isset($_GET['b'])) {
                header("Location: encuesta.php");
                exit();
            } elseif ($_GET['b'] != 4) {
                header("Location: nom.php?b=4");
            }
        } elseif ($archivo_base == "home.php") {
            header("Location: nom.php?b=4");
        }
    } elseif ($usuario_avance_primer_login == 1 && $usuario_avance_video == 1 && $usuario_avance_demograficos == 1 && $usuario_avance_bloque_1 == 1 && $usuario_avance_bloque_2 == 1 && $usuario_avance_bloque_3 == 1 && $usuario_avance_bloque_4 == 1 && $usuario_avance_bloque_5 == 0) {
        if ($archivo_base == "nom.php") {
            if (!isset($_GET['b'])) {
                header("Location: encuesta.php");
                exit();
            } elseif ($_GET['b'] != 5) {
                header("Location: nom.php?b=5");
            }
        } elseif ($archivo_base == "home.php") {
            header("Location: nom.php?b=5");
        }
    } elseif ($usuario_avance_primer_login == 1 && $usuario_avance_video == 1 && $usuario_avance_demograficos == 1 && $usuario_avance_bloque_1 == 1 && $usuario_avance_bloque_2 == 1 && $usuario_avance_bloque_3 == 1 && $usuario_avance_bloque_4 == 1 && $usuario_avance_bloque_5 == 1) {
        if ($archivo_base != "home.php") {
            header("Location: home.php");
        }
    }
}
