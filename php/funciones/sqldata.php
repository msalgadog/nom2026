<?php
#######################################################
# Escapa los caracteres especiales de una cadena para #
# usarla en una sentencia SQL, tomando en cuenta el   #
# conjunto de caracteres actual de la conexión.       #
# al pasar los datos ya séa por POST o GET se indica  #
# el tipo de dato que se está enviando text, long,    #
# int, double, date, defined para que sea procesado   #
# ej. Magic_Quotes(GET['variable'],"text");
#######################################################
if (!function_exists("sqldata")) {
    function sqldata($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
    {
        global $conn;

        $theValue = mysqli_real_escape_string($conn, $theValue);
        switch ($theType) {
            case "text":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "long":
            case "int":
                $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                break;
            case "double":
                $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
                break;
            case "date":
                $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                break;
            case "defined":
                $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                break;
        }
        return $theValue;
    }
}
