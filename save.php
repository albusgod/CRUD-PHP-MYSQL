<?php

include("db.php");

    // si se llama al boton salvar,llama las variables, invoca y ejecuta la query
    if(isset($_POST['salvar_tarea'])){
       $titulo = $_POST['titulo'];
       $descripcion = $_POST['descripcion'];

       $query = "INSERT INTO tareas (titulo,descripcion) VALUES ('$titulo', '$descripcion')";

       $resultado = mysqli_query($conn,$query);

       if(!$resultado){
           die("Fallo Consulta");
       }

       $_SESSION['message'] = 'Tarea Guardada Correctamente';
       $_SESSION['message_type'] = 'success';

       
       header("Location: index.php");
    }





?>