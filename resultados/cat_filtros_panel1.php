
<?php
if (!function_exists('nom035_h')) {
    function nom035_h($value) {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}
$rcompParam = trim((string) ($_GET['rcomp'] ?? ''));
$f1Param = trim((string) ($_GET['f1'] ?? ''));
?>
<div class="col-md-4 mb-2">
                    <div class="card bg-dark border-light shadow">
                        <div class="card-header text-white">
                            <h6 class="mb-0"><?php echo nom035_h($rcompParam).":" . nom035_h($f1Param); ?></h6>
                        </div>
                        <div class="card-body bg-light" style="padding: 5px;">
                            <div role="tablist" id="accordion-1">
                                <div class="card">
                                    <div class="card-header" role="tab">
                                        <h6 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-1" href="#accordion-1 .item-1">Ambiente de trabajo </a></h6>
                                        <div class="progress" data-toggle="tooltip" data-bss-tooltip="" id="I1C1" style="height: 31px;">
                                            <div class="progress-bar   text-dark" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo C("C1",$C1,"RESULTADO"); ?>%;background-color:<?php echo C("C1",$C1,"COLOR"); ?>"><?php echo C("C1",$C1,"MENSAJE"); ?></div>
                                        </div>
                                    </div>
                                    <div class="collapse item-1" role="tabpanel" data-parent="#accordion-1">
                                        <div class="card-body">
                                            <ul class="list-group">
                                                <li class="list-group-item"><span><br><span style="color: rgb(33, 37, 41);">Condiciones en el ambiente de trabajo</span><br></span>
                                                    <div class="progress shadow" data-toggle="tooltip" data-bss-tooltip="" id="I1D1" style="height: 46px;">
                                                    <div class="progress-bar   text-dark" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo D("D1",$D1,"RESULTADO"); ?>%;background-color:<?php echo D("D1",$D1,"COLOR"); ?>"><?php echo D("D1",$D1,"MENSAJE"); ?></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab">
                                        <h6 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-2" href="#accordion-1 .item-2">Factores propios de la actividad</a></h6>
                                        <div class="progress" data-toggle="tooltip" data-bss-tooltip="" id="I1C2" style="height: 31px;">
                                            <div class="progress-bar text-dark" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo C("C2",$C2,"RESULTADO"); ?>%;background-color:<?php echo C("C2",$C2,"COLOR"); ?>"><?php echo C("C2",$C2,"MENSAJE"); ?></div>
                                        </div>
                                    </div>
                                    <div class="collapse item-2" role="tabpanel" data-parent="#accordion-1">
                                        <div class="card-body">
                                            <ul class="list-group">
                                                <li class="list-group-item"><span><br>Carga de trabajo<br></span>
                                                    <div class="progress shadow" data-toggle="tooltip" data-bss-tooltip="" id="I2D2" style="height: 46px;">
                                                    <div class="progress-bar   text-dark" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo D("D2",$D2,"RESULTADO"); ?>%;background-color:<?php echo D("D1",$D1,"COLOR"); ?>"><?php echo D("D1",$D1,"MENSAJE"); ?></div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item"><span><br>Falta de control sobre el trabajo<br></span>
                                                    <div class="progress shadow" data-toggle="tooltip" data-bss-tooltip="" id="I3D3" style="height: 46px;">
                                                    <div class="progress-bar   text-dark" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo D("D3",$D3,"RESULTADO"); ?>%;background-color:<?php echo D("D3",$D3,"COLOR"); ?>"><?php echo D("D3",$D3,"MENSAJE"); ?></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab">
                                        <h6 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-3" href="#accordion-1 .item-3">Organización del tiempo de trabajo</a></h6>
                                        <div class="progress" data-toggle="tooltip" data-bss-tooltip="" id="I1C3" style="height: 31px;">
                                        <div class="progress-bar text-dark" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo C("C3",$C3,"RESULTADO"); ?>%;background-color:<?php echo C("C3",$C3,"COLOR"); ?>"><?php echo C("C3",$C3,"MENSAJE"); ?></div>
                                        </div>
                                    </div>
                                    <div class="collapse item-3" role="tabpanel" data-parent="#accordion-1">
                                        <div class="card-body">
                                            <ul class="list-group">
                                                <li class="list-group-item"><span><br>Jornada de trabajo<br></span>
                                                    <div class="progress shadow" data-toggle="tooltip" data-bss-tooltip="" id="I1D4" style="height: 46px;">
                                                    <div class="progress-bar   text-dark" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo D("D4",$D4,"RESULTADO"); ?>%;background-color:<?php echo D("D4",$D4,"COLOR"); ?>"><?php echo D("D4",$D4,"MENSAJE"); ?></div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item"><span><br>Interferencia en la relación trabajo-familia<br></span>
                                                    <div class="progress shadow" data-toggle="tooltip" data-bss-tooltip="" id="I1D5" style="height: 46px;">
                                                    <div class="progress-bar   text-dark" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo D("D5",$D5,"RESULTADO"); ?>%;background-color:<?php echo D("D5",$D5,"COLOR"); ?>"><?php echo D("D5",$D5,"MENSAJE"); ?></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab">
                                        <h6 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-4" href="#accordion-1 .item-4">Liderazgo y relaciones en el trabajo<br></a></h6>
                                        <div class="progress" data-toggle="tooltip" data-bss-tooltip="" id="I1C4" style="height: 31px;">
                                        <div class="progress-bar text-dark" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo C("C4",$C4,"RESULTADO"); ?>%;background-color:<?php echo C("C4",$C4,"COLOR"); ?>"><?php echo C("C4",$C4,"MENSAJE"); ?></div>
                                        </div>
                                    </div>
                                    <div class="collapse item-4" role="tabpanel" data-parent="#accordion-1">
                                        <div class="card-body">
                                            <ul class="list-group">
                                                <li class="list-group-item"><span><br>Liderazgo<br></span>
                                                    <div class="progress shadow" data-toggle="tooltip" data-bss-tooltip="" id="I1D6" style="height: 46px;">
                                                    <div class="progress-bar   text-dark" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo D("D6",$D6,"RESULTADO"); ?>%;background-color:<?php echo D("D6",$D6,"COLOR"); ?>"><?php echo D("D6",$D6,"MENSAJE"); ?></div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item"><span><br>Relaciones en el trabajo<br></span>
                                                    <div class="progress shadow" data-toggle="tooltip" data-bss-tooltip="" id="I1D7" style="height: 46px;">
                                                    <div class="progress-bar   text-dark" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo D("D7",$D7,"RESULTADO"); ?>%;background-color:<?php echo D("D7",$D7,"COLOR"); ?>"><?php echo D("D7",$D7,"MENSAJE"); ?></div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item"><span><br>Violencia<br></span>
                                                    <div class="progress shadow" data-toggle="tooltip" data-bss-tooltip="" id="I1D8" style="height: 46px;">
                                                    <div class="progress-bar   text-dark" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo D("D8",$D8,"RESULTADO"); ?>%;background-color:<?php echo D("D8",$D8,"COLOR"); ?>"><?php echo D("D8",$D8,"MENSAJE"); ?></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" role="tab">
                                        <h6 class="mb-0"><a data-toggle="collapse" aria-expanded="false" aria-controls="accordion-1 .item-5" href="#accordion-1 .item-5">Entorno organizacional</a></h6>
                                        <div class="progress" data-toggle="tooltip" data-bss-tooltip="" id="I1C5" style="height: 31px;" title="Resultado:<?php echo C("C5",$C5,"RESULTADO"); ?>">
                                        <div class="progress-bar text-dark" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo C("C5",$C5,"RESULTADO"); ?>%;background-color:<?php echo C("C5",$C5,"COLOR"); ?>"><?php echo C("C5",$C5,"MENSAJE"); ?></div>
                                        </div>
                                    </div>
                                    <div class="collapse item-5" role="tabpanel" data-parent="#accordion-1">
                                        <div class="card-body">
                                            <ul class="list-group">
                                                <li class="list-group-item"><span><br>Reconocimiento del desempeño<br></span>
                                                    <div class="progress shadow" data-toggle="tooltip" data-bss-tooltip="" id="I1D9" title="Resultado:<?php echo D("D9",$D9,"RESULTADO"); ?>" style="height: 46px;">
                                                    <div class="progress-bar   text-dark" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo D("D9",$D9,"RESULTADO"); ?>%;background-color:<?php echo D("D9",$D9,"COLOR"); ?>"><?php echo D("D9",$D9,"MENSAJE"); ?></div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item"><span><br>Insuficiente sentido de pertenencia e inestabilidad<br></span>
                                                    <div class="progress shadow" data-toggle="tooltip" data-bss-tooltip="" id="I1D10" title="Resultado:<?php echo D("D10",$D10,"RESULTADO"); ?>" style="height: 46px;">
                                                    <div class="progress-bar   text-dark" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo D("D10",$D10,"RESULTADO"); ?>%;background-color:<?php echo D("D10",$D10,"COLOR"); ?>"><?php echo D("D10",$D10,"MENSAJE"); ?></div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>