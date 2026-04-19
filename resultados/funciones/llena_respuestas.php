<?php
include "../../../costco/humanoffice/funciones/mainfile.php";
include "../../php/config/db.php";
ini_set("memory_limit",-1);
$usnn =1;
while ($usnn <= 11400) {
    echo $usnn.": ";
    $calif = "SELECT cuest_b1.id_user AS id_us1,cuest_b1.r5 AS r40,cuest_b1.r6 AS r9,cuest_b1.r7 AS r60,cuest_b1.r9 AS r29,cuest_b1.r10 AS r20,cuest_b1.r12 AS r35,cuest_b1.r13 AS r43,cuest_b1.r14 AS r32,cuest_b1.r15 AS r47,cuest_b1.r18 AS r18,cuest_b1.r19 AS r50,cuest_b1.r20 AS r3,cuest_b1.r22 AS r25,cuest_b1.r23 AS r19,cuest_b1.r25 AS r7,cuest_b2.id_user AS id_us2,cuest_b2.r1 AS r28,cuest_b2.r2 AS r55,cuest_b2.r3 AS r54,cuest_b2.r5 AS r64,cuest_b2.r6 AS r12,cuest_b2.r7 AS r58,cuest_b2.r9 AS r51,cuest_b2.r10 AS r39,cuest_b2.r18 AS r1,cuest_b2.r20 AS r10,cuest_b2.r21 AS r36,cuest_b2.r22 AS r59,cuest_b2.r23 AS r56,cuest_b2.r25 AS r41,cuest_b3.id_user AS id_us3,cuest_b3.r2 AS r4,cuest_b3.r3 AS r63,cuest_b3.r4 AS r46,cuest_b3.r8 AS r27,cuest_b3.r9 AS r57,cuest_b3.r10 AS r14,cuest_b3.r11 AS r16,cuest_b3.r12 AS r30,cuest_b3.r13 AS r49,cuest_b3.r14 AS r42,cuest_b3.r21 AS r23,cuest_b3.r22 AS r13,cuest_b3.r23 AS r52,cuest_b3.r25 AS r11,cuest_b4.id_user AS id_us4,cuest_b4.r1 AS r8,cuest_b4.r3 AS r17,cuest_b4.r4 AS r22,cuest_b4.r7 AS r45,cuest_b4.r8 AS r44,cuest_b4.r12 AS r15,cuest_b4.r13 AS r38,cuest_b4.r14 AS r24,cuest_b4.r17 AS r33,cuest_b4.r20 AS r37,cuest_b4.r21 AS r6,cuest_b5.id_user AS id_us5,cuest_b5.r1 AS r26,cuest_b5.r2 AS r53,cuest_b5.r3 AS r48,cuest_b5.r4 AS r62,cuest_b5.r5 AS r21,cuest_b5.r8 AS r61,cuest_b5.r9 AS r34,cuest_b5.r10 AS r31,cuest_b5.r12 AS r5,cuest_b5.r13 AS r2,cuest_b5.r15 AS r65,cuest_b5.r16 AS r66,cuest_b5.r17 AS r67,cuest_b5.r18 AS r68,cuest_b5.r19 AS r69,cuest_b5.r20 AS r70,cuest_b5.r21 AS r71,cuest_b5.r22 AS r72 FROM cuest_b1,cuest_b2,cuest_b3,cuest_b4,cuest_b5 WHERE cuest_b1.id_user =$usnn AND cuest_b2.id_user =$usnn AND cuest_b3.id_user =$usnn AND cuest_b4.id_user =$usnn AND cuest_b5.id_user =$usnn";
    if($calif_exe = mysqli_query($connCA,$calif)){
        $calif_cnt = mysqli_num_rows($calif_exe);
        if($calif_cnt >0) {
            while ($calif_row = mysqli_fetch_assoc($calif_exe)) {
                $nn = 0;
                //Variables en 0
                while ($nn < 72) {
                    $nn++;
                    ${"resp" . $nn} = 0;
                }
                //Asignación
                $i = 0;
                while ($i < 72) {
                    $i++;
                    # condiciones
                    if ($i == 1 || $i == 4) {
                        switch ($calif_row['r' . $i]) {
                            case '1':
                                ${"resp" . $i} = 0;
                                break;
                            case '2':
                                ${"resp" . $i} = 1;
                                break;
                            case '3':
                                ${"resp" . $i} = 2;
                                break;
                            case '4':
                                ${"resp" . $i} = 3;
                                break;
                            case '5':
                                ${"resp" . $i} = 4;
                                break;
                            default:
        
                                break;
                        }
                    }
                    if ($i == 2 || $i == 3 || $i == 5 || $i == 6 || $i == 7 || $i == 8 || $i == 9 || $i == 10 || $i == 11 || $i == 12 || $i == 13 || $i == 14 || $i == 15 || $i == 16 || $i == 17 || $i == 18 || $i == 19 || $i == 20) {
                        switch ($calif_row['r' . $i]) {
                            case '1':
                                ${"resp" . $i} = 4;
                                break;
                            case '2':
                                ${"resp" . $i} = 3;
                                break;
                            case '3':
                                ${"resp" . $i} = 2;
                                break;
                            case '4':
                                ${"resp" . $i} = 1;
                                break;
                            case '5':
                                ${"resp" . $i} = 0;
                                break;
                            default:
        
                                break;
                        }
                    }
                    if ($i == 23 || $i == 24 || $i == 25 || $i == 26 || $i == 27 || $i == 28 || $i == 30 || $i == 31 || $i == 32 || $i == 33 || $i == 34 || $i == 35 || $i == 36 || $i == 37 || $i == 38 || $i == 39 || $i == 40) {
                        switch ($calif_row['r' . $i]) {
                            case '1':
                                ${"resp" . $i} = 0;
                                break;
                            case '2':
                                ${"resp" . $i} = 1;
                                break;
                            case '3':
                                ${"resp" . $i} = 2;
                                break;
                            case '4':
                                ${"resp" . $i} = 3;
                                break;
                            case '5':
                                ${"resp" . $i} = 4;
                                break;
                            default:
        
                                break;
                        }
                    }
                    if ($i == 21 || $i == 22 || $i == 29) {
                        switch ($calif_row['r' . $i]) {
                            case '1':
                                ${"resp" . $i} = 4;
                                break;
                            case '2':
                                ${"resp" . $i} = 3;
                                break;
                            case '3':
                                ${"resp" . $i} = 2;
                                break;
                            case '4':
                                ${"resp" . $i} = 1;
                                break;
                            case '5':
                                ${"resp" . $i} = 0;
                                break;
                            default:
        
                                break;
                        }
                    }
                    if ($i == 41 || $i == 42 || $i == 43 || $i == 44 || $i == 45 || $i == 46 || $i == 47 || $i == 48 || $i == 49 || $i == 50 || $i == 51 || $i == 52 || $i == 53 || $i == 55 || $i == 56 || $i == 57) {
                        switch ($calif_row['r' . $i]) {
                            case '1':
                                ${"resp" . $i} = 0;
                                break;
                            case '2':
                                ${"resp" . $i} = 1;
                                break;
                            case '3':
                                ${"resp" . $i} = 2;
                                break;
                            case '4':
                                ${"resp" . $i} = 3;
                                break;
                            case '5':
                                ${"resp" . $i} = 4;
                                break;
                            default:
        
                                break;
                        }
                    }
                    if ($i == 54 || $i == 58 || $i == 59 || $i == 60) {
                        switch ($calif_row['r' . $i]) {
                            case '1':
                                ${"resp" . $i} = 4;
                                break;
                            case '2':
                                ${"resp" . $i} = 3;
                                break;
                            case '3':
                                ${"resp" . $i} = 2;
                                break;
                            case '4':
                                ${"resp" . $i} = 1;
                                break;
                            case '5':
                                ${"resp" . $i} = 0;
                                break;
                            default:
        
                                break;
                        }
                    }
                    if ($i == 61 || $i == 62 || $i == 63 || $i == 64 || $i == 65 || $i == 66 || $i == 67 || $i == 68 || $i == 69 || $i == 70 || $i == 71 || $i == 72) {
                        switch ($calif_row['r' . $i]) {
                            case '1':
                                ${"resp" . $i} = 4;
                                break;
                            case '2':
                                ${"resp" . $i} = 3;
                                break;
                            case '3':
                                ${"resp" . $i} = 2;
                                break;
                            case '4':
                                ${"resp" . $i} = 1;
                                break;
                            case '5':
                                ${"resp" . $i} = 0;
                                break;
                            default:
        
                                break;
                        }
                    }
                }        
                $insert_resp = "INSERT INTO nom035_respuestas 
                (`item_1`, `item_2`, `item_3`, `item_4`, `item_5`, `item_6`, `item_7`, `item_8`, `item_9`, `item_10`, `item_11`, `item_12`, `item_13`, `item_14`, `item_15`, `item_16`, `item_17`, `item_18`, `item_19`, `item_20`, `item_21`, `item_22`, `item_23`, `item_24`, `item_25`, `item_26`, `item_27`, `item_28`, `item_29`, `item_30`, `item_31`, `item_32`, `item_33`, `item_34`, `item_35`, `item_36`, `item_37`, `item_38`, `item_39`, `item_40`, `item_41`, `item_42`, `item_43`, `item_44`, `item_45`, `item_46`, `item_47`, `item_48`, `item_49`, `item_50`, `item_51`, `item_52`, `item_53`, `item_54`, `item_55`, `item_56`, `item_57`, `item_58`, `item_59`, `item_60`, `item_61`, `item_62`, `item_63`, `item_64`, `item_65`, `item_66`, `item_67`, `item_68`, `item_69`, `item_70`, `item_71`, `item_72`, `final_encuesta`) VALUES ($resp1,$resp2,$resp3,$resp4,$resp5,$resp6,$resp7,$resp8,$resp9,$resp10,$resp11,$resp12,$resp13,$resp14,$resp15,$resp16,$resp17,$resp18,$resp19,$resp20,$resp21,$resp22,$resp23,$resp24,$resp25,$resp26,$resp27,$resp28,$resp29,$resp30,$resp31,$resp32,$resp33,$resp34,$resp35,$resp36,$resp37,$resp38,$resp39,$resp40,$resp41,$resp42,$resp43,$resp44,$resp45,$resp46,$resp47,$resp48,$resp49,$resp50,$resp51,$resp52,$resp53,$resp54,$resp55,$resp56,$resp57,$resp58,$resp59,$resp60,$resp61,$resp62,$resp63,$resp64,$resp65,$resp66,$resp67,$resp68,$resp69,$resp70,$resp71,$resp72,'1')";
                if($insert_resp_exe = mysqli_query($conn,$insert_resp)){
                    echo "Registro insertado\n";
                }else{
                    echo $conn->error;
                    exit();
                }
            }
        }else{
            echo "Sin registro\n";
        }
    
    
    }else{
        echo $connCA->error;
    }
    
    $usnn ++;
}