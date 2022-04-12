<?php
   require('conexion.php');
   $claseConexion = new Conexiondb();
   $conexion = $claseConexion->crearconexion();
   $resultado = $conexion->query('SELECT * FROM catastro_fincas');
   $datos = $resultado->fetch_all(MYSQLI_ASSOC);
   ?>
   <script>
       var datosOriginales = <?php echo json_encode($datos); ?>;
   </script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Catastro de fincas</title>
</head>
<body class="container-fluid">
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                       
                        <div class="col">
                            <!--Alimento-->
                           <div class="form-floating mb-3">
                                   <select class="form-select"  id="alimento">
                                       <option  value="null" selected>Ninguno</option>
                                       <option value="Carne">Carne</option>
                                       <option value="Leche">Leche</option>
                                   </select>
                                   <label for="alimento">Alimento</label>
                           </div>   
                        </div>
                        <div class="col">
                            <!--Regiones-->
                            <div class="form-floating mb-3">
                                <select  class="form-select" id="regiones" >
                                    <option value="null" selected>Ninguno</option>
                                    <option value="COSTA">Costa</option>
                                    <option value="SIERRA">Sierra</option>
                                    <option value="AMAZONIA">Amazonia</option>
                                </select>
                                <label for="regiones">Region</label>
                            </div>
                        </div>
                       
                        <div class="col">
                            <!-- Especimen -->
                            <div class="form-floating mb-3">
                                <select class="form-select" id="especimen">
                                        <option value="null"selected>Ninguno</option>
                                        <option value="vacas">Vacas</option>
                                        <option value="vaconas">Vaconas</option>
                                        <option value="toros">Toros</option>
                                        <option value="terneros">Teneros</option>
                                        <option value="terneras">Terneras</option>
                                </select>
                                <label for="especimen">Categoría de ganado: </label>
                            </div>
                        </div>
                        <div class="col-1">
                            <h6> <small class="text-muted">Cantidad de animales:</small> </h6>  
                        </div>
                        <div class="col-1">
                            <!--Maximo y minimo-->  
                            
                            <div class="form-floating mb-3">
                                <input class="form-control" type="number" value="0" min="0" id="min">
                                <Label for="min">Desde</Label>
                            </div>  
                        </div> 
                        <div class="col-1">
                           
                            <div class="form-floating mb-3">
                                 <input class="form-control" type="number" value="0" min="0" id="max" >
                                 <Label for="min">Hasta</Label>
                            </div>
                        </div>
                        <div class="col">
                            <!--Boton Buscar-->
                            <button class="btn btn-primary" id="buscar"><i class="bi bi-search btn-lg"> </i></button>
                            <!--Boton reset-->
                            <button class="btn btn-primary" id="reset"><i class="bi bi-arrow-clockwise btn-lg"></i>  </button>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover mt-3" id="catastro">
            <thead>
                <tr>
                <th scope="col" style="width: 100px;">Nombre finca</th>
                <th scope="col">Tipo de Producción</th>
                <th scope="col">Región</th>
                <th scope="col">Coordenadas</th>
                <th scope="col">Cantidad</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="./catastro_finca.js"></script>
    
    
</body>
</html>