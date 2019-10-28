<?php

include("db.php");

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM tareas WHERE id = $id";
    $resultado = mysqli_query($conn,$query);

    if(mysqli_num_rows($resultado)==1 ){
        $row = mysqli_fetch_array($resultado);
        $titulo = $row['titulo'];
        $descripcion = $row['descripcion'];     
        }
    }
    //si se pulsa actualizar, guarda el id por get, y se guarda los nuevos datos en post, luego ejecuta la query y redirecciona
    if(isset($_POST['update'])){
       $id = $_GET['id'];
       $titulo = $_POST['titulo'];
       $descripcion = $_POST['descripcion'];

       $query = "UPDATE tareas set titulo = '$titulo', descripcion = '$descripcion' where id = '$id'";

       mysqli_query($conn,$query);

        $_SESSION['message'] = 'Datos Actualizados';
        $_SESSION['message_type'] = 'warning';

       header ("Location: index.php");



    }


?>
<!-- Nuevo Formulario para Actualizar en POST  -->
<?php  include ("includes/header.php") ?>

<div classs="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                
                    <div class="form-group">
                        <input type="text" name="titulo" value="<?php echo $titulo; ?>" class="form-control" placeholder="Actualiza el Titulo">
                    
                    </div>

                    <div class="form-group">
                        <textarea name="descripcion" row="2" class="form-control" placeholder="Actualiza Descripcion"> <?php echo $descripcion; ?> </textarea>
                    
                    </div>
                    <button class="btn btn-success" name="update">
                    Actualizar
                    </button>

 
                </form>
                   
            </div>
        </div>   
    </div>

</div>