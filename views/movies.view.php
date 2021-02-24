<?php if (!empty($message)){?>
    <div class="alert alert-success" role="alert">
        <?=$message ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php } ?>
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0">Inici</h1>

    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header">Coses a fer</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">

                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div>
                                Revisar productes tenda
                                <div class="small text-gray-500">9:45h</div>
                            </div>
                            <input type="checkbox">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div>
                                Activar funcionalitats usuaris
                                <div class="small text-gray-500">14:30h</div>
                            </div>
                            <input type="checkbox">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div>
                                Ajustar formulari pagament
                                <div class="small text-gray-500">12:30h</div>
                            </div>
                            <input type="checkbox">
                        </div>
                    </li>
                </ul>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header">Notes</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">

                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div>
                                Els productes de cosmètica no estan actius per comprar
                            </div>
                            <a class="borrar-icono" href=""> ×</a>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div>
                                No es poden accelarar les vendes
                            </div>
                            <a class="borrar-icono" href="">×</a>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div>
                                Nova Nota:
                                <textarea class="form-control"></textarea>

                            </div>
                            <button type="button" class="btn btn-primary">Crear</button>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header ">Pàgines</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">

                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div>
                                <a href="./Home.html"> Home</a>

                            </div>

                        </div>
                    </li>
                    <li class="list-group-item">

                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div>
                                <a href="./SobreNosaltres.html"> Sobre Nosaltres</a>

                            </div>

                        </div>
                    </li>
                    <li class="list-group-item">

                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div>
                                <a href="./Localitzacio.html"> Localització</a>

                            </div>

                        </div>
                    </li>
                    <li class="list-group-item">

                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div>
                                <a href="./Contacta.html"> Contacta</a>

                            </div>

                        </div>
                    </li>
                    <li class="list-group-item">

                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div>
                                <a href="./PaginaTenda.html"> Pàgina Tenda</a>

                            </div>

                        </div>
                    </li>
                    <li class="list-group-item">

                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div>
                                <a href="./PreguntesFreq.html">Preguntes Freqüents</a>

                            </div>

                        </div>
                    </li>
                    <li class="list-group-item">

                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div>
                                <a href="./Carret.html"> Carret</a>

                            </div>

                        </div>
                    </li>
                    <li class="list-group-item">

                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div>
                                <a href="./FinCompra.html"> Finalització de lal compra</a>

                            </div>

                        </div>
                    </li>
                    <li class="list-group-item">

                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div>
                                <a href="./Blog.html"> Blog / Noticies</a>

                            </div>

                        </div>
                    </li>
                    <li class="list-group-item">

                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div>
                                <a href="./Salut.html"> Salut</a>

                            </div>

                        </div>
                    </li>
                    <li class="list-group-item">

                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div>
                                <a href="./Cosmetica.html"> Cosmètica</a>

                            </div>

                        </div>
                    </li>
                    <li class="list-group-item">

                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div>
                                <a href="./Higiene.html"> Higiene</a>

                            </div>

                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header d-flex flex-row align-items-center justify-content-between">
                    <h6 >Evolució de vendes</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow">
                            <div class="dropdown-header text-secondary">Altres opcions:</div>
                            <div class="dropdown-item">Exportar</div>
                            <div class="dropdown-item">Actualitzar</div>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-item">Revisar</div>
                        </div>
                    </div>
                </div>

                <div class="card-body">


                    <canvas id="Chart" style="display: block; width: 843px; height: 320px;" width="843"
                            height="320px" class="chartjs-render-monitor"></canvas>


                </div>
            </div>
        </div>

    </div>


</div>
