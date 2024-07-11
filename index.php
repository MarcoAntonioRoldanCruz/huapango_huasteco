<!doctype html>
<html lang="en">

<head>
    <title>Registro concursantes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">

    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/principal.js"></script>
</head>

<body>

    <div class="p-3 mb-4 bg-light rounded-3">
        <div class="container-fluid py-3">
            <div class="row">
                <div class="col-8">
                    <h1 class="display-5 fw-bold">REGISTRO CONCURSO NACIONAL HUAPANGO HUASTECO</h1>
                    <p class="fs-4">
                        <strong>Nopala de Villagran, Hidalgo. 2024</strong><br>
                        Ven diviértete participa y baila, "El premio anima a las artes y la honra las sustenta"
                    </p>
                </div>
                <div class="col-4">
                    <img src="img/Huapango_1.jpg" class="img-fluid rounded-top w-75" alt="Concurso nacional huapango huasteco" />
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mb-3 p-3">
        <!-- FORMULARIO registro de participantes -->
        <form id="registro" name="registro" method="post" class="was-validated">

            <div class="accordion" id="Registro_concursantes">
                <!-- DATOS personales de la pareja concursante -->
                <div class="accordion-item">
                    <!-- ENCABEZADO datos personales -->
                    <h2 class="accordion-header" id="datos_personales">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#datos_personalesCollapse" aria-expanded="true" aria-controls="datos_personalesCollapse">
                            Datos personales de la pareja concursante
                        </button>
                    </h2>
                    <!-- TERMINA encabezado datos personales -->
                    <!-- COLLAPSE datos personales -->
                    <div id="datos_personalesCollapse" class="accordion-collapse collapse show" aria-labelledby="datos_personales" data-bs-parent="#Registro_concursantes">
                        <div class="accordion-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-8">
                                        <label for="nombre_completo_participante" class="form-label">Nombre completo de participante:</label>
                                        <input type="text" class="form-control" id="nombre_completo_participante" name="nombre_completo_participante" required />
                                    </div>
                                    <div class="col-4">
                                        <label for="fecha_nac_participante" class="form-label">Fecha de nacimiento</label>
                                        <input type="date" class="form-control" id="fecha_nac_participante" name="fecha_nac_participante" required onchange="categoria_calcular()" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-8">
                                        <label for="nombre_completo_pareja" class="form-label">Nombre completo de pareja:</label>
                                        <input type="text" class="form-control" id="nombre_completo_pareja" name="nombre_completo_pareja" required />
                                    </div>
                                    <div class="col-4">
                                        <label for="fecha_nac_pareja" class="form-label">Fecha de nacimiento</label>
                                        <input type="date" class="form-control" id="fecha_nac_pareja" name="fecha_nac_pareja" required onchange="categoria_calcular()" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3">
                                        <label for="telefono_contacto" class="form-label">Teléfono de contacto:</label>
                                        <input type="tel" class="form-control" name="telefono_contacto" id="telefono_contacto" required />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3">
                                        <label for="grupo_pareja" class="form-label">Grupo, institución que representa, o pareja independiente</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-text">
                                                <input id="grupo_pareja_id" name="grupo_pareja_id" class="form-check-input mt-0" type="checkbox" onchange="pareja_independiente()">
                                            </div>
                                            <input id="grupo_pareja" name="grupo_pareja" type="text" class="form-control" placeholder="Pareja independiente" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <span class="form-label">Documentos presentados del participante</span>
                                        </div>
                                    </div>
                                    <div class="col align-content-center">
                                        <div class="form-check">
                                            <input name="documentos_participante" class="form-check-input" type="checkbox" id="curp_participante" name="curp_participante">
                                            <label class="form-check-label" for="curp_participante">
                                                CURP
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col align-content-center">
                                        <div class="form-check">
                                            <input name="documentos_participante" class="form-check-input" type="checkbox" id="acta_participante" name="acta_participante">
                                            <label class="form-check-label" for="acta_participante">
                                                Acta de nacimiento
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col align-content-center border-dark">
                                        <div class="form-check">
                                            <input name="documentos_participante" class="form-check-input" type="checkbox" id="ine_participante" name="ine_participante">
                                            <label class="form-check-label" for="ine_participante">
                                                INE
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col align-content-center">
                                        <div class="form-check">
                                            <input name="documentos_participante" class="form-check-input" type="checkbox" id="fotografias_participante" name="fotografias_participante">
                                            <label class="form-check-label" for="fotografias_participante">
                                                Fotografías T/Infantil
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <span class="form-label">Documentos presentados de su pareja</span>
                                        </div>
                                    </div>
                                    <div class="col align-content-center">
                                        <div class="form-check">
                                            <input name="documentos_pareja" class="form-check-input" type="checkbox" id="curp_pareja" name="curp_pareja">
                                            <label class="form-check-label" for="curp_pareja">
                                                CURP
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col align-content-center">
                                        <div class="form-check">
                                            <input name="documentos_pareja" class="form-check-input" type="checkbox" id="acta_pareja" name="acta_pareja">
                                            <label class="form-check-label" for="acta_pareja">
                                                Acta de nacimiento
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col align-content-center border-dark">
                                        <div class="form-check">
                                            <input name="documentos_pareja" class="form-check-input" type="checkbox" id="ine_pareja" name="ine_pareja">
                                            <label class="form-check-label" for="ine_pareja">
                                                INE
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col align-content-center">
                                        <div class="form-check">
                                            <input name="documentos_pareja" class="form-check-input" type="checkbox" id="fotografias_pareja" name="fotografias_pareja">
                                            <label class="form-check-label" for="fotografias_pareja">
                                                Fotografías T/Infantil
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- TERMINA collapse datos personales -->
                </div>
                <!-- TERMINA datos personales -->

                <!-- DATOS tutor -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tutorCollapse" aria-expanded="false" aria-controls="tutorCollapse">
                            Datos de padre y/o tutor (categorías: pequeños huapangueritos, infatil y juvenil)
                        </button>
                    </h2>
                    <div id="tutorCollapse" class="accordion-collapse collapse" data-bs-parent="#Registro_concursantes">
                        <div class="accordion-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="nombre_tutor" class="form-label">Nombre completo del padre y/o tutor del participante:</label>
                                            <input type="text" class="form-control" name="nombre_tutor" id="nombre_tutor" aria-describedby="helpId" placeholder="" />
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="telefono_contacto" class="form-label">Teléfono de contacto</label>
                                            <input type="tel" class="form-control" name="telefono_contacto" id="telefono_contacto" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- TERMINA tutor -->
                <!-- CONCURSO datos de registro -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#concursoCollapse" aria-expanded="false" aria-controls="concursoCollapse">
                            Datos para concurso nacional Huapango
                        </button>
                    </h2>
                    <div id="concursoCollapse" class="accordion-collapse collapse" data-bs-parent="#Registro_concursantes">
                        <div class="accordion-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="categoria" class="form-label">Categoría</label>
                                            <select class="form-select" name="categoria" id="categoria">
                                                <option selected>Elige una opción</option>
                                                <option value="Pequeños Huapangueritos">Pequeños Huapangueritos</option>
                                                <option value="Infantil">Infantil</option>
                                                <option value="Juvenil">Juvenil</option>
                                                <option value="Adulto">Adulto</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="estilo" class="form-label">Estilo</label>
                                            <select class="form-select" name="estilo" id="estilo">
                                                <option selected>Elige una opción</option>
                                                <option value="Hidalguense">Hidalguense</option>
                                                <option value="Queretano">Queretano</option>
                                                <option value="Potosino">Potosino</option>
                                                <option value="Poblano">Poblano</option>
                                                <option value="Veracruzano">Veracruzano</option>
                                                <option value="Tamaulipeco">Tamaulipeco</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-3">
                                        <label for="numero_pareja" class="form-label">Número de pareja concursante</label>
                                        <input type="number" class="form-control fw-bold" name="numero_pareja" id="numero_pareja" aria-describedby="helpId" placeholder="144" />
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- <div class="col">
                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary">
                                                Sugerir número aleatorio
                                            </button>
                                        </div>
                                    </div> -->
                                    <div class="col">
                                        <div class="text-center">
                                            <button onclick="confirmar()" type="button" class="btn btn-success">
                                                Confirmar e imprimir
                                            </button>
                                            <!-- <input name="confirmar" id="confirmar" class="btn btn-primary" type="submit" value="Confirmar e imprimir" /> -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- TERMINA concurso datos de registro -->
            </div>
        </form>
    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>