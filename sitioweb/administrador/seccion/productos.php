<?php include("../template/cabecera.php"); ?>

<?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";

$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";


echo $txtID."<br/>";
echo $txtNombre."<br/>";
echo $txtImagen."<br/>";
echo $accion."<br/>";

switch($accion){
    case "Agregar":
        echo "Boton de agregado presionado"; break;
    case "Modificar":
        echo "Boton de Modificar presionado"; break;
    case "Cancelar":
        echo "Boton de Cancelar presionado"; break;
}

?>

<div class="col-md-5">

    <div class="card">
        <div class="card-header">
            Datos de las piezas
        </div>

        <div class="card-body">
            
            <form method="POST" enctype="multipart/form-data" >
        
            <div class = "form-group">
            <label for="txtID">ID:</label>
            <input type="text" class="form-control" name="txtID" id="txtID" placeholder="ID">
            </div>
        
            <div class = "form-group">
            <label for="txtNombre">Nombre:</label>
            <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre de la pieza">
            </div>
        
            <div class = "form-group">
            <label for="txtImagen">Imagen:</label>
            <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Imagen de la pieza">
            </div>
        
        
        
            <div class="btn-group" role="group" aria-label="">
                <button type="button" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
                <button type="button" name="accion" value="Modificar" class="btn btn-warning">Modificar</button>
                <button type="button" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
            </div>
        
            </form>
        </div>

    </div>
    
    
    

</div>
<div class="col-md-7">
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>2</td>
                <td>Resorte de Tzuru</td>
                <td>imagen.jpg</td>
                <td>Seleccionar | Borrar</td>
            </tr>

        </tbody>
    </table>


</div>




<?php include("../template/pie.php"); ?>