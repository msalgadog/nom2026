<?php
/*
/* Cálculos */
/*C1*/
$DIM1 = $resp1 + $resp3;
$DIM2 = $resp2 + $resp4;
$DIM3 = $resp5;
$D1 = $DIM1 + $DIM2 + $DIM3;
$C1 = $D1;
/*C2*/
$DIM4 = $resp6 + $resp12;
$DIM5 = $resp7 + $resp8;
$DIM6 = $resp9 + $resp10 + $resp11;
$DIM7 = $resp65 + $resp66 + $resp67 + $resp68;
$DIM8 = $resp13 + $resp14;
$DIM9 = $resp15 + $resp16;
$DIM10 = $resp25 + $resp26 + $resp27 + $resp28;
$DIM11 = $resp23 + $resp24;
$DIM12 = $resp29 + $resp30;
$DIM13 = $resp35 + $resp36;
$D2 = $DIM4 + $DIM5 + $DIM6 + $DIM7 + $DIM8 + $DIM9;
$D3 = $DIM10 + $DIM11 + $DIM12 + $DIM13;
$C2 = $D2 + $D3;
/*C3*/
$DIM14 = $resp17 + $resp18;
$DIM15 = $resp19 + $resp20;
$DIM16 = $resp21 + $resp22;
$D4 = $DIM14;
$D5 = $DIM15 + $DIM16;
$C3 = $D4 + $D5;
/*C4*/
$DIM17 = $resp31 + $resp32 + $resp33 + $resp34;
$DIM18 = $resp37 + $resp38 + $resp39 + $resp40 + $resp41;
$DIM19 = $resp42 + $resp43 + $resp44 + $resp45 + $resp46;
$DIM20 = $resp69 + $resp70 + $resp71 + $resp72;
$DIM21 = $resp57 + $resp58 + $resp59 + $resp60 + $resp61 + $resp62 + $resp63 + $resp64;
$D6 = $DIM17 + $DIM18;
$D7 = $DIM19 + $DIM20;
$D8 = $DIM21;
$C4 = $D6 + $D7 + $D8;
/*C5*/
$DIM22 = $resp47 + $resp48;
$DIM23 = $resp49 + $resp50 + $resp51 + $resp52;
$DIM24 = $resp55 + $resp56;
$DIM25 = $resp53 + $resp54;
$D9 = $DIM22 + $DIM23;
$D10 = $DIM24 + $DIM25;
$C5 = $D9 + $D10;
$FINAL = $C1 + $C2 + $C3 + $C4 + $C5;


/*Resultados*/

/**Final**/
if ($FINAL < 50) {
    $final_color_excel="ff93d9ea";
    $final_txt = "Nulo";
    $final_color = "rgb(155, 229, 247)";
    $final_texto_nom ="El riesgo resulta despreciable por lo que no se requiere medidas adicionales.";
} elseif (50 <= $FINAL && $FINAL < 75) {
    $final_color_excel="ff66e968";
    $final_txt = "Bajo";
    $final_color = "rgb(107, 245, 110)";
    $final_texto_nom ="Es necesario una mayor difusión de la política de prevención de riesgos psicosociales y programas para: la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral.";
} elseif (75 <= $FINAL && $FINAL < 99) {
    $final_color_excel="fff2f200";
    $final_txt = "Medio";
    $final_color = "rgb(255, 255, 0)";
    $final_texto_nom ="Se requiere revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión, mediante un Programa de intervención.";
} elseif (99 <= $FINAL && $FINAL < 140) {
    $final_color_excel="FFC000";
    $final_txt = "Alto";
    $final_color = "rgb(255, 192, 0)";
    $final_texto_nom ="Se requiere realizar un análisis de cada categoría y dominio, de manera que se puedan determinar las acciones de intervención apropiadas a través de un Programa de intervención, que podrá incluir una evaluación específica1 y deberá incluir una campaña de sensibilización, revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión.";
} elseif ($FINAL >= 140) {
    $final_color_excel="ffff0000";
    $final_txt = "Muy alto";
    $final_color = "rgb(255, 0, 0)";
    $final_texto_nom ="Se requiere realizar el análisis de cada categoría y dominio para establecerlas acciones de intervención apropiadas, mediante un Programa de intervención que deberá incluir evaluaciones específicas (1), y contemplar campañas de sensibilización, revisar la política de prevención de riesgos psicosociales y programas para la prevención de los factores de riesgo psicosocial, la promoción de un entorno organizacional favorable y la prevención de la violencia laboral, así como reforzar su aplicación y difusión.";
} else {
    $final_color_excel="ff000000";
    $final_txt = "Error";
    $final_color = "rgb(0, 0, 0)";
    $final_texto_nom ="Error";
}

if (!function_exists('C')) {
    function C($categoria, $valor, $dato)
    {
        switch ($categoria) {
            case 'C1':
                if ($valor < 5) {
                    $cat_excel="ff93d9ea";
                    $cat_porcentaje = 15;
                    $cat_mensaje = "Nulo";
                    $cat_color = "rgb(155, 229, 247)";
                } elseif (5 <= $valor && $valor < 9) {
                    $cat_excel="ff66e968";
                    $cat_porcentaje = 35;
                    $cat_mensaje = "Bajo";
                    $cat_color = "rgb(107, 245, 110)";
                } elseif (9 <= $valor && $valor < 11) {
                    $cat_excel="fff2f200";
                    $cat_porcentaje = 55;
                    $cat_mensaje = "Medio";
                    $cat_color = "rgb(255, 255, 0)";
                } elseif (11 <= $valor && $valor < 14) {
                    $cat_excel="FFC000";
                    $cat_porcentaje = 75;
                    $cat_mensaje = "Alto";
                    $cat_color = "rgb(255, 192, 0)";
                } elseif ($valor >= 14) {
                    $cat_excel="ffff0000";
                    $cat_porcentaje = 100;
                    $cat_mensaje = "Muy alto";
                    $cat_color = "rgb(255, 0, 0)";
                } else {
                    $cat_porcentaje = 0;
                    $cat_mensaje = "Error";
                    $cat_color = "rgb(0, 0, 0)";
                }
                break;
            case 'C2':
                if ($valor < 15) {
                    $cat_excel="ff93d9ea";
                    $cat_porcentaje = 15;
                    $cat_mensaje = "Nulo";
                    $cat_color = "rgb(155, 229, 247)";
                } elseif (15 <= $valor && $valor < 30) {
                    $cat_excel="ff66e968";
                    $cat_porcentaje = 35;
                    $cat_mensaje = "Bajo";
                    $cat_color = "rgb(107, 245, 110)";
                } elseif (30 <= $valor && $valor < 45) {
                    $cat_excel="fff2f200";
                    $cat_porcentaje = 55;
                    $cat_mensaje = "Medio";
                    $cat_color = "rgb(255, 255, 0)";
                } elseif (45 <= $valor && $valor < 60) {
                    $cat_excel="FFC000";
                    $cat_porcentaje = 75;
                    $cat_mensaje = "Alto";
                    $cat_color = "rgb(255, 192, 0)";
                } elseif ($valor >= 60) {
                    $cat_excel="ffff0000";
                    $cat_porcentaje = 100;
                    $cat_mensaje = "Muy alto";
                    $cat_color = "rgb(255, 0, 0)";
                } else {
                    $cat_porcentaje = 0;
                    $cat_mensaje = "Error";
                    $cat_color = "rgb(0, 0, 0)";
                }
                break;
            case 'C3':
                if ($valor < 5) {
                    $cat_excel="ff93d9ea";
                    $cat_porcentaje = 15;
                    $cat_mensaje = "Nulo";
                    $cat_color = "rgb(155, 229, 247)";
                } elseif (5 <= $valor && $valor < 7) {
                    $cat_excel="ff66e968";
                    $cat_porcentaje = 35;
                    $cat_mensaje = "Bajo";
                    $cat_color = "rgb(107, 245, 110)";
                } elseif (7 <= $valor && $valor < 10) {
                    $cat_excel="fff2f200";
                    $cat_porcentaje = 55;
                    $cat_mensaje = "Medio";
                    $cat_color = "rgb(255, 255, 0)";
                } elseif (10 <= $valor && $valor < 13) {
                    $cat_excel="FFC000";
                    $cat_porcentaje = 75;
                    $cat_mensaje = "Alto";
                    $cat_color = "rgb(255, 192, 0)";
                } elseif ($valor >= 13) {
                    $cat_excel="ffff0000";
                    $cat_porcentaje = 100;
                    $cat_mensaje = "Muy alto";
                    $cat_color = "rgb(255, 0, 0)";
                } else {
                    $cat_porcentaje = 0;
                    $cat_mensaje = "Error";
                    $cat_color = "rgb(0, 0, 0)";
                }
                break;
            case 'C4':
                if ($valor < 14) {
                    $cat_excel="ff93d9ea";
                    $cat_porcentaje = 15;
                    $cat_mensaje = "Nulo";
                    $cat_color = "rgb(155, 229, 247)";
                } elseif (14 <= $valor && $valor < 29) {
                    $cat_excel="ff66e968";
                    $cat_porcentaje = 35;
                    $cat_mensaje = "Bajo";
                    $cat_color = "rgb(107, 245, 110)";
                } elseif (29 <= $valor && $valor < 42) {
                    $cat_excel="fff2f200";
                    $cat_porcentaje = 55;
                    $cat_mensaje = "Medio";
                    $cat_color = "rgb(255, 255, 0)";
                } elseif (42 <= $valor && $valor < 58) {
                    $cat_excel="FFC000";
                    $cat_porcentaje = 75;
                    $cat_mensaje = "Alto";
                    $cat_color = "rgb(255, 192, 0)";
                } elseif ($valor >= 58) {
                    $cat_excel="ffff0000";
                    $cat_porcentaje = 100;
                    $cat_mensaje = "Muy alto";
                    $cat_color = "rgb(255, 0, 0)";
                } else {
                    $cat_porcentaje = 0;
                    $cat_mensaje = "Error";
                    $cat_color = "rgb(0, 0, 0)";
                }
                break;
            case 'C5':
                if ($valor < 10) {
                    $cat_excel="ff93d9ea";
                    $cat_porcentaje = 15;
                    $cat_mensaje = "Nulo";
                    $cat_color = "rgb(155, 229, 247)";
                } elseif (10 <= $valor && $valor < 14) {
                    $cat_excel="ff66e968";
                    $cat_porcentaje = 35;
                    $cat_mensaje = "Bajo";
                    $cat_color = "rgb(107, 245, 110)";
                } elseif (14 <= $valor && $valor < 18) {
                    $cat_excel="fff2f200";
                    $cat_porcentaje = 55;
                    $cat_mensaje = "Medio";
                    $cat_color = "rgb(255, 255, 0)";
                } elseif (18 <= $valor && $valor < 23) {
                    $cat_excel="FFC000";
                    $cat_porcentaje = 75;
                    $cat_mensaje = "Alto";
                    $cat_color = "rgb(255, 192, 0)";
                } elseif ($valor >= 23) {
                    $cat_excel="ffff0000";
                    $cat_porcentaje = 100;
                    $cat_mensaje = "Muy alto";
                    $cat_color = "rgb(255, 0, 0)";
                } else {
                    $cat_porcentaje = 0;
                    $cat_mensaje = "Error";
                    $cat_color = "rgb(0, 0, 0)";
                }
                break;
            default:
                $cat_porcentaje = 0;
                $cat_mensaje = "Error";
                $cat_color = "rgb(0, 0, 0)";
                break;
        }
        switch ($dato) {
            case 'COLOR_EXCEL':
                return $cat_excel;
                break;            
            case 'COLOR':
                return $cat_color;
                break;
            case 'MENSAJE':
                return $cat_mensaje;
                break;
            case 'RESULTADO':
                return $cat_porcentaje;
                break;            
            default:
    
                break;
        }
    }
}


if (!function_exists("D")) {
    function D($categoria, $valor, $dato)
    {
        switch ($categoria) {
            case 'D1':
                if ($valor < 5) {
                    $cat_excel="ff93d9ea";
                    $cat_porcentaje = 15;
                    $cat_mensaje = "Nulo";
                    $cat_color = "rgb(155, 229, 247)";
                } elseif (5 <= $valor && $valor < 9) {
                    $cat_excel="ff66e968";
                    $cat_porcentaje = 35;
                    $cat_mensaje = "Bajo";
                    $cat_color = "rgb(107, 245, 110)";
                } elseif (9 <= $valor && $valor < 11) {
                    $cat_excel="fff2f200";
                    $cat_porcentaje = 55;
                    $cat_mensaje = "Medio";
                    $cat_color = "rgb(255, 255, 0)";
                } elseif (11 <= $valor && $valor < 14) {
                    $cat_excel="FFC000";
                    $cat_porcentaje = 75;
                    $cat_mensaje = "Alto";
                    $cat_color = "rgb(255, 192, 0)";
                } elseif ($valor >= 14) {
                    $cat_excel="ffff0000";
                    $cat_porcentaje = 100;
                    $cat_mensaje = "Muy alto";
                    $cat_color = "rgb(255, 0, 0)";
                } else {
                    $cat_porcentaje = 0;
                    $cat_mensaje = "Error";
                    $cat_color = "rgb(0, 0, 0)";
                }
                break;
            case 'D2':
                if ($valor < 15) {
                    $cat_excel="ff93d9ea";
                    $cat_porcentaje = 15;
                    $cat_mensaje = "Nulo";
                    $cat_color = "rgb(155, 229, 247)";
                } elseif (15 <= $valor && $valor < 21) {
                    $cat_excel="ff66e968";
                    $cat_porcentaje = 35;
                    $cat_mensaje = "Bajo";
                    $cat_color = "rgb(107, 245, 110)";
                } elseif (21 <= $valor && $valor < 27) {
                    $cat_excel="fff2f200";
                    $cat_porcentaje = 55;
                    $cat_mensaje = "Medio";
                    $cat_color = "rgb(255, 255, 0)";
                } elseif (27 <= $valor && $valor < 37) {
                    $cat_excel="FFC000";
                    $cat_porcentaje = 75;
                    $cat_mensaje = "Alto";
                    $cat_color = "rgb(255, 192, 0)";
                } elseif ($valor >= 37) {
                    $cat_excel="ffff0000";
                    $cat_porcentaje = 100;
                    $cat_mensaje = "Muy alto";
                    $cat_color = "rgb(255, 0, 0)";
                } else {
                    $cat_porcentaje = 0;
                    $cat_mensaje = "Error";
                    $cat_color = "rgb(0, 0, 0)";
                }
                break;
            case 'D3':
                if ($valor < 11) {
                    $cat_excel="ff93d9ea";
                    $cat_porcentaje = 15;
                    $cat_mensaje = "Nulo";
                    $cat_color = "rgb(155, 229, 247)";
                } elseif (11 <= $valor && $valor < 16) {
                    $cat_excel="ff66e968";
                    $cat_porcentaje = 35;
                    $cat_mensaje = "Bajo";
                    $cat_color = "rgb(107, 245, 110)";
                } elseif (16 <= $valor && $valor < 21) {
                    $cat_excel="fff2f200";
                    $cat_porcentaje = 55;
                    $cat_mensaje = "Medio";
                    $cat_color = "rgb(255, 255, 0)";
                } elseif (21 <= $valor && $valor < 25) {
                    $cat_excel="FFC000";
                    $cat_porcentaje = 75;
                    $cat_mensaje = "Alto";
                    $cat_color = "rgb(255, 192, 0)";
                } elseif ($valor >= 25) {
                    $cat_excel="ffff0000";
                    $cat_porcentaje = 100;
                    $cat_mensaje = "Muy alto";
                    $cat_color = "rgb(255, 0, 0)";
                } else {
                    $cat_porcentaje = 0;
                    $cat_mensaje = "Error";
                    $cat_color = "rgb(0, 0, 0)";
                }
                break;
            case 'D4':
                if ($valor < 1) {
                    $cat_excel="ff93d9ea";
                    $cat_porcentaje = 15;
                    $cat_mensaje = "Nulo";
                    $cat_color = "rgb(155, 229, 247)";
                } elseif (1 <= $valor && $valor < 2) {
                    $cat_excel="ff66e968";
                    $cat_porcentaje = 35;
                    $cat_mensaje = "Bajo";
                    $cat_color = "rgb(107, 245, 110)";
                } elseif (2 <= $valor && $valor < 4) {
                    $cat_excel="fff2f200";
                    $cat_porcentaje = 55;
                    $cat_mensaje = "Medio";
                    $cat_color = "rgb(255, 255, 0)";
                } elseif (4 <= $valor && $valor < 6) {
                    $cat_excel="FFC000";
                    $cat_porcentaje = 75;
                    $cat_mensaje = "Alto";
                    $cat_color = "rgb(255, 192, 0)";
                } elseif ($valor >= 6) {
                    $cat_excel="ffff0000";
                    $cat_porcentaje = 100;
                    $cat_mensaje = "Muy alto";
                    $cat_color = "rgb(255, 0, 0)";
                } else {
                    $cat_porcentaje = 0;
                    $cat_mensaje = "Error";
                    $cat_color = "rgb(0, 0, 0)";
                }
                break;
            case 'D5':
                if ($valor < 4) {
                    $cat_excel="ff93d9ea";
                    $cat_porcentaje = 15;
                    $cat_mensaje = "Nulo";
                    $cat_color = "rgb(155, 229, 247)";
                } elseif (4 <= $valor && $valor < 6) {
                    $cat_excel="ff66e968";
                    $cat_porcentaje = 35;
                    $cat_mensaje = "Bajo";
                    $cat_color = "rgb(107, 245, 110)";
                } elseif (6 <= $valor && $valor < 8) {
                    $cat_excel="fff2f200";
                    $cat_porcentaje = 55;
                    $cat_mensaje = "Medio";
                    $cat_color = "rgb(255, 255, 0)";
                } elseif (8 <= $valor && $valor < 10) {
                    $cat_excel="FFC000";
                    $cat_porcentaje = 75;
                    $cat_mensaje = "Alto";
                    $cat_color = "rgb(255, 192, 0)";
                } elseif ($valor >= 10) {
                    $cat_excel="ffff0000";
                    $cat_porcentaje = 100;
                    $cat_mensaje = "Muy alto";
                    $cat_color = "rgb(255, 0, 0)";
                } else {
                    $cat_porcentaje = 0;
                    $cat_mensaje = "Error";
                    $cat_color = "rgb(0, 0, 0)";
                }
                break;
            case 'D6':
                if ($valor < 9) {
                    $cat_excel="ff93d9ea";
                    $cat_porcentaje = 15;
                    $cat_mensaje = "Nulo";
                    $cat_color = "rgb(155, 229, 247)";
                } elseif (9 <= $valor && $valor < 12) {
                    $cat_excel="ff66e968";
                    $cat_porcentaje = 35;
                    $cat_mensaje = "Bajo";
                    $cat_color = "rgb(107, 245, 110)";
                } elseif (12 <= $valor && $valor < 16) {
                    $cat_excel="fff2f200";
                    $cat_porcentaje = 55;
                    $cat_mensaje = "Medio";
                    $cat_color = "rgb(255, 255, 0)";
                } elseif (16 <= $valor && $valor < 20) {
                    $cat_excel="FFC000";
                    $cat_porcentaje = 75;
                    $cat_mensaje = "Alto";
                    $cat_color = "rgb(255, 192, 0)";
                } elseif ($valor >= 20) {
                    $cat_excel="ffff0000";
                    $cat_porcentaje = 100;
                    $cat_mensaje = "Muy alto";
                    $cat_color = "rgb(255, 0, 0)";
                } else {
                    $cat_porcentaje = 0;
                    $cat_mensaje = "Error";
                    $cat_color = "rgb(0, 0, 0)";
                }
                break;
            case 'D7':
                if ($valor < 10) {
                    $cat_excel="ff93d9ea";
                    $cat_porcentaje = 15;
                    $cat_mensaje = "Nulo";
                    $cat_color = "rgb(155, 229, 247)";
                } elseif (10 <= $valor && $valor < 13) {
                    $cat_excel="ff66e968";
                    $cat_porcentaje = 35;
                    $cat_mensaje = "Bajo";
                    $cat_color = "rgb(107, 245, 110)";
                } elseif (13 <= $valor && $valor < 17) {
                    $cat_excel="fff2f200";
                    $cat_porcentaje = 55;
                    $cat_mensaje = "Medio";
                    $cat_color = "rgb(255, 255, 0)";
                } elseif (17 <= $valor && $valor < 21) {
                    $cat_excel="FFC000";
                    $cat_porcentaje = 75;
                    $cat_mensaje = "Alto";
                    $cat_color = "rgb(255, 192, 0)";
                } elseif ($valor >= 21) {
                    $cat_excel="ffff0000";
                    $cat_porcentaje = 100;
                    $cat_mensaje = "Muy alto";
                    $cat_color = "rgb(255, 0, 0)";
                } else {
                    $cat_porcentaje = 0;
                    $cat_mensaje = "Error";
                    $cat_color = "rgb(0, 0, 0)";
                }
                break;
            case 'D8':
                if ($valor < 7) {
                    $cat_excel="ff93d9ea";
                    $cat_porcentaje = 15;
                    $cat_mensaje = "Nulo";
                    $cat_color = "rgb(155, 229, 247)";
                } elseif (7 <= $valor && $valor < 10) {
                    $cat_excel="ff66e968";
                    $cat_porcentaje = 35;
                    $cat_mensaje = "Bajo";
                    $cat_color = "rgb(107, 245, 110)";
                } elseif (10 <= $valor && $valor < 13) {
                    $cat_excel="fff2f200";
                    $cat_porcentaje = 55;
                    $cat_mensaje = "Medio";
                    $cat_color = "rgb(255, 255, 0)";
                } elseif (13 <= $valor && $valor < 16) {
                    $cat_excel="FFC000";
                    $cat_porcentaje = 75;
                    $cat_mensaje = "Alto";
                    $cat_color = "rgb(255, 192, 0)";
                } elseif ($valor >= 16) {
                    $cat_excel="ffff0000";
                    $cat_porcentaje = 100;
                    $cat_mensaje = "Muy alto";
                    $cat_color = "rgb(255, 0, 0)";
                } else {
                    $cat_porcentaje = 0;
                    $cat_mensaje = "Error";
                    $cat_color = "rgb(0, 0, 0)";
                }
                break;
            case 'D9':
                if ($valor < 6) {
                    $cat_excel="ff93d9ea";
                    $cat_porcentaje = 15;
                    $cat_mensaje = "Nulo";
                    $cat_color = "rgb(155, 229, 247)";
                } elseif (6 <= $valor && $valor < 10) {
                    $cat_excel="ff66e968";
                    $cat_porcentaje = 35;
                    $cat_mensaje = "Bajo";
                    $cat_color = "rgb(107, 245, 110)";
                } elseif (10 <= $valor && $valor < 14) {
                    $cat_excel="fff2f200";
                    $cat_porcentaje = 55;
                    $cat_mensaje = "Medio";
                    $cat_color = "rgb(255, 255, 0)";
                } elseif (14 <= $valor && $valor < 18) {
                    $cat_excel="FFC000";
                    $cat_porcentaje = 75;
                    $cat_mensaje = "Alto";
                    $cat_color = "rgb(255, 192, 0)";
                } elseif ($valor >= 18) {
                    $cat_excel="ffff0000";
                    $cat_porcentaje = 100;
                    $cat_mensaje = "Muy alto";
                    $cat_color = "rgb(255, 0, 0)";
                } else {
                    $cat_porcentaje = 0;
                    $cat_mensaje = "Error";
                    $cat_color = "rgb(0, 0, 0)";
                }
                break;
            case 'D10':
                if ($valor < 4) {
                    $cat_excel="ff93d9ea";
                    $cat_porcentaje = 15;
                    $cat_mensaje = "Nulo";
                    $cat_color = "rgb(155, 229, 247)";
                } elseif (4 <= $valor && $valor < 6) {
                    $cat_excel="ff66e968";
                    $cat_porcentaje = 35;
                    $cat_mensaje = "Bajo";
                    $cat_color = "rgb(107, 245, 110)";
                } elseif (6 <= $valor && $valor < 8) {
                    $cat_excel="fff2f200";
                    $cat_porcentaje = 55;
                    $cat_mensaje = "Medio";
                    $cat_color = "rgb(255, 255, 0)";
                } elseif (8 <= $valor && $valor < 10) {
                    $cat_excel="FFC000";
                    $cat_porcentaje = 75;
                    $cat_mensaje = "Alto";
                    $cat_color = "rgb(255, 192, 0)";
                } elseif ($valor >= 10) {
                    $cat_excel="ffff0000";
                    $cat_porcentaje = 100;
                    $cat_mensaje = "Muy alto";
                    $cat_color = "rgb(255, 0, 0)";
                } else {
                    $cat_porcentaje = 0;
                    $cat_mensaje = "Error";
                    $cat_color = "rgb(0, 0, 0)";
                }
                break;
            default:
                $cat_porcentaje = 0;
                $cat_mensaje = "Error";
                $cat_color = "rgb(0, 0, 0)";
                break;
        }
        switch ($dato) {
            case 'COLOR_EXCEL':
                return $cat_excel;
                break;
            case 'COLOR':
                return $cat_color;
                break;
            case 'MENSAJE':
                return $cat_mensaje;
                break;
            case 'RESULTADO':
                return $cat_porcentaje;
                break;
            default:
                # code...
                break;
        }
    }
}



