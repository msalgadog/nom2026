<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', '30000'); 
include("../php/config/db.php");
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$spreadsheet->getActiveSheet()->getStyle('A1:BI1')
->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);                
$spreadsheet->getActiveSheet()->getStyle('A1:BI1')
->getFill()->getStartColor()->setARGB('ffdadada');                   
  
$sheet->setCellValue('A1', 'Distrito');
$sheet->setCellValue('B1', 'Localidad');
$sheet->setCellValue('C1', 'Departamento');
$sheet->setCellValue('D1', 'N° Empleado');
$sheet->setCellValue('E1', 'Género');
$sheet->setCellValue('F1', 'Fecha de nacimiento');
$sheet->setCellValue('G1', 'Edad');
$sheet->setCellValue('H1', 'Antigüedad');
$sheet->setCellValue('I1', 'Total Final Nivel');
$sheet->setCellValue('J1', 'Total Final');
$sheet->setCellValue('K1', 'Ambiente de trabajo Nivel');
$sheet->setCellValue('L1', 'Ambiente de trabajo');
$sheet->setCellValue('M1', 'Condiciones en el ambiente de trabajo Nivel');
$sheet->setCellValue('N1', 'Condiciones en el ambiente de trabajo');
$sheet->setCellValue('O1', 'Condiciones peligrosas e inseguras');
$sheet->setCellValue('P1', 'Condiciones deficientes e insalubres');
$sheet->setCellValue('Q1', 'Trabajos peligrosos');
$sheet->setCellValue('R1', 'Factores propios de la actividad Nivel');
$sheet->setCellValue('S1', 'Factores propios de la actividad');
$sheet->setCellValue('T1', 'Carga de trabajo Nivel');
$sheet->setCellValue('U1', 'Carga de trabajo');
$sheet->setCellValue('V1', 'Cargas cuantitativas');
$sheet->setCellValue('W1', 'Ritmos de trabajo acelerado');
$sheet->setCellValue('X1', 'Carga mental');
$sheet->setCellValue('Y1', 'Cargas psicológicas emocionales');
$sheet->setCellValue('Z1', 'Cargas de alta responsabilidad');
$sheet->setCellValue('AA1', 'Cargas contradictorias o inconsistentes');
$sheet->setCellValue('AB1', 'Falta de control sobre el trabajo Nivel');
$sheet->setCellValue('AC1', 'Falta de control sobre el trabajo');
$sheet->setCellValue('AD1', 'Falta de control y autonomía sobre el trabajo');
$sheet->setCellValue('AE1', 'Limitada o nula posibilidad de desarrollo');
$sheet->setCellValue('AF1', 'Insuficiente participación y manejo del cambio');
$sheet->setCellValue('AG1', 'Limitada o inexistente capacitación');
$sheet->setCellValue('AH1', 'Organización del tiempo de trabajo Nivel');
$sheet->setCellValue('AI1', 'Organización del tiempo de trabajo');
$sheet->setCellValue('AJ1', 'Jornada de trabajo Nivel');
$sheet->setCellValue('AK1', 'Jornada de trabajo');
$sheet->setCellValue('AL1', 'Jornadas de trabajo extensas');
$sheet->setCellValue('AM1', 'Interferencia en la relación trabajo-familia Nivel');
$sheet->setCellValue('AN1', 'Interferencia en la relación trabajo-familia');
$sheet->setCellValue('AO1', 'Influencia del trabajo fuera del centro laboral');
$sheet->setCellValue('AP1', 'Influencia de las responsabilidades familiares');
$sheet->setCellValue('AQ1', 'Liderazgo y relaciones en el trabajo Nivel');
$sheet->setCellValue('AR1', 'Liderazgo y relaciones en el trabajo');
$sheet->setCellValue('AS1', 'Liderazgo Nivel');
$sheet->setCellValue('AT1', 'Liderazgo');
$sheet->setCellValue('AU1', 'Escaza claridad de funciones');
$sheet->setCellValue('AV1', 'Características del liderazgo');
$sheet->setCellValue('AW1', 'Relaciones en el trabajo Nivel');
$sheet->setCellValue('AX1', 'Relaciones en el trabajo');
$sheet->setCellValue('AY1', 'Relaciones sociales en el trabajo');
$sheet->setCellValue('AZ1', 'Deficiente relación con los colaboradores que supervisa');
$sheet->setCellValue('BA1', 'Violencia Nivel');
$sheet->setCellValue('BB1', 'Violencia');
$sheet->setCellValue('BC1', 'Violencia laboral');
$sheet->setCellValue('BD1', 'Entorno organizacional Nivel');
$sheet->setCellValue('BE1', 'Entorno organizacional');
$sheet->setCellValue('BF1', 'Reconocimiento del desempeño Nivel');
$sheet->setCellValue('BG1', 'Reconocimiento del desempeño');
$sheet->setCellValue('BH1', 'Escasa o nula retroalimentación del desempeño');
$sheet->setCellValue('BI1', 'Escaso o nulo reconocimiento y compensación');
$sheet->setCellValue('BJ1', 'Insuficiente sentido de pertenencia e inestabilidad Nivel');
$sheet->setCellValue('BK1', 'Insuficiente sentido de pertenencia e inestabilidad');
$sheet->setCellValue('BL1', 'Limitado sentido de pertenencia');
$sheet->setCellValue('BM1', 'Inestabilidad laboral');
if (isset($_GET['localidad'])) {
    $localidad = $_GET['localidad'];
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
            $cells = $respuestas_cnt+1;
            $spreadsheet->getActiveSheet()->getStyle('A2'.':H'.$cells)
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);                
            $spreadsheet->getActiveSheet()->getStyle('A2'.':H'.$cells)
            ->getFill()->getStartColor()->setARGB('ffbed3dc');              
            $fila = 2;
            $celda = 1;
            
            while ($respuestas_row = mysqli_fetch_assoc($respuestas_exe)) {
                $a = 1;
                while ($a <= 72) {
                    $r = "resp" . $a;
                    ${"resp" . $a} = $respuestas_row[$r];
                    $a++;
                }
                include("../resultados/funciones/calculos_asigna.php");             
                $sheet->setCellValue('A' . $fila, $respuestas_row['empleados_distrito']);
                $sheet->setCellValue('B' . $fila, $respuestas_row['empleados_t_localidad']);
                $sheet->setCellValue('C' . $fila, $respuestas_row['empleados_dpto']);
                $sheet->setCellValue('D' . $fila, $respuestas_row['empleados_n_empleado']);
                $sheet->setCellValue('E' . $fila, $respuestas_row['empleados_genero']);
                $sheet->setCellValue('F' . $fila, $respuestas_row['empleados_fecha_nacimiento']);
                $sheet->setCellValue('G' . $fila, $respuestas_row['empleados_edad']);
                $sheet->setCellValue('H' . $fila, $respuestas_row['empleados_fecha_antiguedad']);
                $spreadsheet->getActiveSheet()->getStyle('I'.$fila.':J'.$fila)
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);                
                $spreadsheet->getActiveSheet()->getStyle('I'.$fila.':J'.$fila)
                ->getFill()->getStartColor()->setARGB($final_color_excel);                               
                $sheet->setCellValue('I' . $fila, $final_txt);
                $sheet->setCellValue('J' . $fila, $FINAL);
                $sheet->setCellValue('K' . $fila, C("C1", $C1, "MENSAJE"));
                $sheet->setCellValue('L' . $fila, C("C1", $C1, "RESULTADO"));
                $spreadsheet->getActiveSheet()->getStyle('K'.$fila.':L'.$fila)
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);                
                $spreadsheet->getActiveSheet()->getStyle('K'.$fila.':L'.$fila)
                ->getFill()->getStartColor()->setARGB(C("C1", $C1, "COLOR_EXCEL"));                    
                $sheet->setCellValue('M' . $fila, D("D1", $D1, "MENSAJE"));
                $sheet->setCellValue('N' . $fila, D("D1", $D1, "RESULTADO"));
                $spreadsheet->getActiveSheet()->getStyle('M'.$fila.':N'.$fila)
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);                
                $spreadsheet->getActiveSheet()->getStyle('M'.$fila.':N'.$fila)
                ->getFill()->getStartColor()->setARGB(D("D1", $D1, "COLOR_EXCEL"));                 
                $sheet->setCellValue('O' . $fila, $DIM1);
                $sheet->setCellValue('P' . $fila, $DIM2);
                $sheet->setCellValue('Q' . $fila, $DIM3);
                $sheet->setCellValue('R' . $fila, C("C2", $C2, "MENSAJE"));
                $sheet->setCellValue('S' . $fila, C("C2", $C2, "RESULTADO"));
                $spreadsheet->getActiveSheet()->getStyle('R'.$fila.':S'.$fila)
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);                
                $spreadsheet->getActiveSheet()->getStyle('R'.$fila.':S'.$fila)
                ->getFill()->getStartColor()->setARGB(C("C2", $C2, "COLOR_EXCEL"));                 
                $sheet->setCellValue('T' . $fila, D("D2", $D2, "MENSAJE"));
                $sheet->setCellValue('U' . $fila, D("D2", $D2, "RESULTADO"));
                $spreadsheet->getActiveSheet()->getStyle('T'.$fila.':U'.$fila)
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);                
                $spreadsheet->getActiveSheet()->getStyle('T'.$fila.':U'.$fila)
                ->getFill()->getStartColor()->setARGB(D("D2", $D2, "COLOR_EXCEL"));                   
                $sheet->setCellValue('V' . $fila, $DIM4);
                $sheet->setCellValue('W' . $fila, $DIM5);
                $sheet->setCellValue('X' . $fila, $DIM6);
                $sheet->setCellValue('Y' . $fila, $DIM7);
                $sheet->setCellValue('Z' . $fila, $DIM8);
                $sheet->setCellValue('AA' . $fila, $DIM9);
                $sheet->setCellValue('AB' . $fila, D("D3", $D3, "MENSAJE"));
                $sheet->setCellValue('AC' . $fila, D("D3", $D3, "RESULTADO"));
                $spreadsheet->getActiveSheet()->getStyle('AB'.$fila.':AC'.$fila)
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);                
                $spreadsheet->getActiveSheet()->getStyle('AB'.$fila.':AC'.$fila)
                ->getFill()->getStartColor()->setARGB(D("D3", $D3, "COLOR_EXCEL"));                  
                $sheet->setCellValue('AD' . $fila, $DIM10);
                $sheet->setCellValue('AE' . $fila, $DIM11);
                $sheet->setCellValue('AF' . $fila, $DIM12);
                $sheet->setCellValue('AG' . $fila, $DIM13);
                $sheet->setCellValue('AH' . $fila, C("C3", $C3, "MENSAJE"));
                $sheet->setCellValue('AI' . $fila, C("C3", $C3, "RESULTADO"));
                $spreadsheet->getActiveSheet()->getStyle('AH'.$fila.':AI'.$fila)
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);                
                $spreadsheet->getActiveSheet()->getStyle('AH'.$fila.':AI'.$fila)
                ->getFill()->getStartColor()->setARGB(C("C3", $C3, "COLOR_EXCEL"));                    
                $sheet->setCellValue('AJ' . $fila, D("D4", $D4, "MENSAJE"));
                $sheet->setCellValue('AK' . $fila, D("D4", $D4, "RESULTADO"));
                $spreadsheet->getActiveSheet()->getStyle('AJ'.$fila.':AK'.$fila)
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);                
                $spreadsheet->getActiveSheet()->getStyle('AJ'.$fila.':AK'.$fila)
                ->getFill()->getStartColor()->setARGB(D("D4", $D4, "COLOR_EXCEL"));                      
                $sheet->setCellValue('AL' . $fila, $DIM14);
                $sheet->setCellValue('AM' . $fila, D("D5", $D5, "MENSAJE"));
                $sheet->setCellValue('AN' . $fila, D("D5", $D5, "RESULTADO"));
                $spreadsheet->getActiveSheet()->getStyle('AM'.$fila.':AN'.$fila)
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);                
                $spreadsheet->getActiveSheet()->getStyle('AM'.$fila.':AN'.$fila)
                ->getFill()->getStartColor()->setARGB(D("D5", $D5, "COLOR_EXCEL"));                  
                $sheet->setCellValue('AO' . $fila, $DIM15);
                $sheet->setCellValue('AP' . $fila, $DIM16);
                $sheet->setCellValue('AQ' . $fila, C("C4", $C4, "MENSAJE"));
                $sheet->setCellValue('AR' . $fila, C("C4", $C4, "RESULTADO"));
                $spreadsheet->getActiveSheet()->getStyle('AQ'.$fila.':AR'.$fila)
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);                
                $spreadsheet->getActiveSheet()->getStyle('AQ'.$fila.':AR'.$fila)
                ->getFill()->getStartColor()->setARGB(C("C4", $C4, "COLOR_EXCEL"));                  
                $sheet->setCellValue('AS' . $fila, D("D6", $D6, "MENSAJE"));
                $sheet->setCellValue('AT' . $fila, D("D6", $D6, "RESULTADO"));
                $spreadsheet->getActiveSheet()->getStyle('AS'.$fila.':AT'.$fila)
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);                
                $spreadsheet->getActiveSheet()->getStyle('AS'.$fila.':AT'.$fila)
                ->getFill()->getStartColor()->setARGB(D("D6", $D6, "COLOR_EXCEL"));                  
                $sheet->setCellValue('AU' . $fila, $DIM17);
                $sheet->setCellValue('AV' . $fila, $DIM18);
                $sheet->setCellValue('AW' . $fila, D("D7", $D7, "MENSAJE"));
                $sheet->setCellValue('AX' . $fila, D("D7", $D7, "RESULTADO"));
                $spreadsheet->getActiveSheet()->getStyle('AW'.$fila.':AX'.$fila)
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);                
                $spreadsheet->getActiveSheet()->getStyle('AW'.$fila.':AX'.$fila)
                ->getFill()->getStartColor()->setARGB(D("D7", $D7, "COLOR_EXCEL"));                  
                $sheet->setCellValue('AY' . $fila, $DIM19);
                $sheet->setCellValue('AZ' . $fila, $DIM20);
                $sheet->setCellValue('BA' . $fila, D("D8", $D8, "MENSAJE"));
                $sheet->setCellValue('BB' . $fila, D("D8", $D8, "RESULTADO"));
                $spreadsheet->getActiveSheet()->getStyle('BA'.$fila.':BB'.$fila)
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);                
                $spreadsheet->getActiveSheet()->getStyle('BA'.$fila.':BB'.$fila)
                ->getFill()->getStartColor()->setARGB(D("D8", $D8, "COLOR_EXCEL"));                   
                $sheet->setCellValue('BC' . $fila, $DIM21);
                $sheet->setCellValue('BD' . $fila, C("C5", $C5, "MENSAJE"));
                $sheet->setCellValue('BE' . $fila, C("C5", $C5, "RESULTADO"));
                $spreadsheet->getActiveSheet()->getStyle('BD'.$fila.':BE'.$fila)
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);                
                $spreadsheet->getActiveSheet()->getStyle('BD'.$fila.':BE'.$fila)
                ->getFill()->getStartColor()->setARGB(C("C5", $C5, "COLOR_EXCEL"));                  
                $sheet->setCellValue('BF' . $fila, D("D9", $D9, "MENSAJE"));
                $sheet->setCellValue('BG' . $fila, D("D9", $D9, "RESULTADO"));
                $spreadsheet->getActiveSheet()->getStyle('BF'.$fila.':BG'.$fila)
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);                
                $spreadsheet->getActiveSheet()->getStyle('BF'.$fila.':BG'.$fila)
                ->getFill()->getStartColor()->setARGB(D("D9", $D9, "COLOR_EXCEL"));                    
                $sheet->setCellValue('BH' . $fila, $DIM22);
                $sheet->setCellValue('BI' . $fila, $DIM23);
                $sheet->setCellValue('BJ' . $fila, D("D10", $D10, "MENSAJE"));
                $sheet->setCellValue('BK' . $fila, D("D10", $D10, "RESULTADO"));
                $spreadsheet->getActiveSheet()->getStyle('BJ'.$fila.':BK'.$fila)
                ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);                
                $spreadsheet->getActiveSheet()->getStyle('BJ'.$fila.':BK'.$fila)
                ->getFill()->getStartColor()->setARGB(D("D10", $D10, "COLOR_EXCEL"));                  
                $sheet->setCellValue('BL' . $fila, $DIM24);
                $sheet->setCellValue('BM' . $fila, $DIM25);
             
                $fila++;
                $celda++;
            }
        } else {
            echo "Error";
        }
    } else {
        exit($conn->error);
    }
} else {
    $localidad = "";
}




#$writer = new Xlsx($spreadsheet);
#$writer->save('hello world.xlsx');


$date = date('d-m-y-' . substr((string)microtime(), 1, 8));
$date = str_replace(".", "", $date);
$filename = "export_" . $date . ".xlsx";

try {
    $writer = new Xlsx($spreadsheet);
    $writer->save($filename);
    $content = file_get_contents($filename);
} catch (Exception $e) {
    exit($e->getMessage());
}

header("Content-Disposition: attachment; filename=" . $filename);

unlink($filename);
exit($content);
