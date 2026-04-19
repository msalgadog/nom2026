<?php
$stmtl = sprintf("UPDATE nom035_usuarios SET usuarios_lastlogin = ? WHERE usuarios_nempleado =? ");
if($stmtl = $conn->prepare($stmtl)){
    $stmtl->bind_param("si",$fecha,$usuarios_nempleado);
    $status_stmtl = $stmtl->execute();
    if ($status_stmtl === false) {
        exit($stmt->error);
        $registra_login = false;
      }else{
        $registra_login = true;
      }
    
}else{
    $registra_login = false;
    exit($conn->error);
}
