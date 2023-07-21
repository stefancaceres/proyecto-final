<?php require_once("../../templates/header.php") ?>

<!-- inicio main -->

<div class="container cont mt-2 mb-5">
            <div class="row ">
                <!-- primera col -->
                <!-- primera columna -->
                <!-- primera columna -->
                <!-- primera columna -->
                <!-- primera columna -->
                <!-- primera columna -->
                <div class="col-md-4 contformu">
                    <div class="contitulo"> 
                        <h3 class="display-6 fw-bold titulo">
                            Busqueda de auto en cochera
                        </h3>
                    </div>
                    
                    <button type="submit" class="boton botonformu btn btn-primary w-100" >
                        <p class=" textboton" href="./index.php" >
                            Almacenar vehiculo
                        </p>
                    </button>
                    <!-- alertas de error -->
                    <div class="alert alert-danger aviso " id="msjRellenar" role="alert" >
                        <!-- <strong>Vehiculo no ingresado.</strong> Rellene todos los campos -->
                        <h4 class="alert-heading">Vehiculo no ingresado.</h4>
                        <p>Rellene todos los campos por favor.</p>
                    </div>
                    <div class="alert alert-danger aviso"  id="msjLleno" role="alert">
                        <!-- <strong>Vehiculo no ingresado.</strong> Rellene todos los campos -->
                        <h4 class="alert-heading">Vehiculo no ingresado.</h4>
                        <p>La cochera no tiene mas espacio, retire algun vehiculo para poder ingresar otro.</p>
                    </div>
                        
                    </form>
                </div>
                

                <!-- segunda columna -->
                <!-- segunda columna -->
                <!-- segunda columna -->
                <!-- segunda columna -->
                <!-- segunda columna -->
                <div class="col-md contcochera">
                    <div class="contitulo"> 
                        <h3 class="display-6 fw-bold titulo">
                            Busqueda de auto retirado
                        </h3>
                    </div>
                </div>
            </div>
        </div>

<!-- Fin main -->

<?php require_once("../../templates/footer.php") ?>