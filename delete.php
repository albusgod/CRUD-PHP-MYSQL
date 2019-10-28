<?php

include("db.php");
//si existe un id, lo guarda, llama la query y elimina, luego redirecciona
if(isset($_GET['id'])){
  $ID = $_GET['id'];

  $query = "DELETE FROM tareas WHERE id = $ID";

  $resultado =mysqli_query($conn,$query);
    if(!$resultado)
    {
        die("Query Failed");

    }

    $_SESSION['message'] = 'Tarea Eliminada';
    $_SESSION['message_type'] ='danger';
    header("Location: index.php");
}

?>