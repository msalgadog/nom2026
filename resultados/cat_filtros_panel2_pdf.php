<div class="col-4">
                    <div class="row">
                        <div class="col-12 ">
<?php
if (!function_exists('nom035_h')) {
    function nom035_h($value) {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

$rcompParam = trim((string) ($_GET['rcomp'] ?? ''));
$f2Param = trim((string) ($_GET['f2'] ?? ''));
?>
                        <h6 class="mb-0"><?php echo nom035_h($rcompParam).":" . nom035_h($f2Param); ?></h6>
                            <div class="table-responsive">                            
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="pt-0 pb-0" style="width: 60%;" colspan="2">Ambiente de trabajo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pb-0" colspan="2">
                                                <div id="C1" class="progress " style="height: 26px;margin-bottom: 7px;">
                                                    <div class="progress-bar" aria-valuenow="<?php echo C("C1",$C1,"RESULTADO"); ?>" aria-valuemin="0" aria-valuemax="100" style="color:black;width: <?php echo C("C1",$C1,"RESULTADO"); ?>%;background:<?php echo C("C1",$C1,"COLOR"); ?>;"><?php echo C("C1",$C1,"MENSAJE"); ?></div>
                                                </div><br />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="pt-0 pb-0" style="width: 60%;" colspan="2">Factores propios de la actividad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pb-0" colspan="2">
                                                <div id="C-1" class="progress " style="height: 26px;margin-bottom: 7px;">
                                                <div class="progress-bar" aria-valuenow="<?php echo C("C2",$C2,"RESULTADO"); ?>" aria-valuemin="0" aria-valuemax="100" style="color:black;width: <?php echo C("C2",$C2,"RESULTADO"); ?>%;background:<?php echo C("C2",$C2,"COLOR"); ?>;"><?php echo C("C2",$C2,"MENSAJE"); ?></div>
                                                </div><br />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="pt-0 pb-0" style="width: 60%;" colspan="2">Organización del tiempo de trabajo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pb-0" colspan="2">
                                                <div id="C-2" class="progress pb-xl-0 mb-xl-0" style="height: 26px;margin-bottom: 7px;">
                                                <div class="progress-bar" aria-valuenow="<?php echo C("C3",$C3,"RESULTADO"); ?>" aria-valuemin="0" aria-valuemax="100" style="color:black;width: <?php echo C("C3",$C3,"RESULTADO"); ?>%;background:<?php echo C("C3",$C3,"COLOR"); ?>;"><?php echo C("C3",$C3,"MENSAJE"); ?></div>
                                                </div><br />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="pt-0 pb-0" style="width: 60%;" colspan="2">Liderazgo y relaciones en el trabajo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pb-0" colspan="2">
                                                <div id="C-3" class="progress " style="height: 26px;margin-bottom: 7px;">
                                                <div class="progress-bar" aria-valuenow="<?php echo C("C4",$C4,"RESULTADO"); ?>" aria-valuemin="0" aria-valuemax="100" style="color:black;width: <?php echo C("C4",$C4,"RESULTADO"); ?>%;background:<?php echo C("C4",$C4,"COLOR"); ?>;"><?php echo C("C4",$C4,"MENSAJE"); ?></div>
                                                </div><br />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="pt-0 pb-0" style="width: 60%;" colspan="2">Entorno organizacional</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pb-0" colspan="2">
                                                <div id="C-4" class="progress pb-xl-0 mb-xl-0" style="height: 26px;margin-bottom: 7px;">
                                                <div class="progress-bar" aria-valuenow="<?php echo C("C5",$C5,"RESULTADO"); ?>" aria-valuemin="0" aria-valuemax="100" style="color:black;width: <?php echo C("C5",$C5,"RESULTADO"); ?>%;background:<?php echo C("C5",$C5,"COLOR"); ?>;"><?php echo C("C5",$C5,"MENSAJE"); ?></div>
                                                </div><br />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>