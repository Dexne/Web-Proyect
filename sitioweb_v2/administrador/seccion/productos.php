<?php include("../template/cabecera.php"); ?>

<?php

$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtNombre=(isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

//      HACER LA CONEXIONA A LA BASE DE DATOS
include("../config/bd.php");

switch($accion){
    case "Agregar":

        //INSERT INTO `piezas` (`id`, `nombre`, `imagen`) VALUES (NULL, 'Pieza de motor grande', 'imagen.jpg');
        $sentenciaSQL= $conexion->prepare("INSERT INTO piezas (nombre, imagen) VALUES (:nombre,:imagen);");
        $sentenciaSQL->bindParam(':nombre',$txtNombre);
        $sentenciaSQL->bindParam(':imagen',$txtImagen);
        $sentenciaSQL->execute();
        break;

    case "Modificar":
        echo "Boton de Modificar presionado"; break;
    case "Cancelar":
        echo "Boton de Cancelar presionado"; break;
    case "Seleccionar":
        $sentenciaSQL=$conexion->prepare("SELECT * FROM piezas WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();   //EJECUTAR LA SENTENCIA
        $pieza=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtNombre=$pieza['nombre'];
        $txtImagen=$pieza['imagen'];

        break;
    case "Borrar":
        $sentenciaSQL=$conexion->prepare("DELETE FROM piezas WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        break;
}

//      SENTENCIAS SQL, BASTATE SIMPLE
$sentenciaSQL=$conexion->prepare("SELECT * FROM piezas");
$sentenciaSQL->execute();   //EJECUTAR LA SENTENCIA
$listaPiezas=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);     //MOSTRAR LOS DATOS QUE INGRESEMOS

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
            <input type="text" class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" placeholder="ID">
            </div>
        
            <div class = "form-group">
            <label for="txtNombre">Nombre:</label>
            <input type="text" class="form-control" value="<?php echo $txtNombre; ?> name="txtNombre" id="txtNombre" placeholder="Nombre de la pieza">
            </div>
        
            <div class = "form-group">
            <label for="txtImagen">Imagen:</label>

            value="<?php echo $txtImagen; ?>

            <input type="file" class="form-control" name="txtImagen" id="txtImagen" placeholder="Imagen de la pieza">
            </div>
        
        
        
            <div class="btn-group" role="group" aria-label="">
                <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
                <button type="submit" name="accion" value="Modificar" class="btn btn-warning">Modificar</button>
                <button type="submit" name="accion" value="Cancelar" class="btn btn-info">Cancelar</button>
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

        <?php // UN FOR PARA MOSTRAR TODAS LAS COSAS ?>
        <?php foreach($listaPiezas as $pieza){ ?>
            <tr>
                <td><?php echo $pieza['id']; ?></td>
                <td><?php echo $pieza['nombre']; ?></td>
                <td><?php echo $pieza['imagen']; ?></td>


                <td>

                <?php // HACER LOS BOTONES DE SELECCIONAR Y BORRAR ?>
                <form method="post">

                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $pieza['id']; ?>">
                    
                    <input type="submit" name="accion" value="Seleccionar" class="btn-primary" />
                    
                    <input type="submit" name="accion" value="Borrar" class="btn-danger" />


                </form>

                </td>


            </tr>
        <?php }?>
        </tbody>
    </table>


</div>

<?php include("../template/pie.php"); ?>