<?php include("db.php") ?>
<?php include("includes/header.php") ?>

<!-- -->

 <div class="container p-4">
    
        <div class="row">
        
                <div class="col-md-4">

                 <!-- Mostrar Alertas  -->
                 <?php if(isset($_SESSION['message'])) { ?>
 
                     <div class="alert alert-<?= $_SESSION['message_type']; ?> alert-dismissible fade show" role="alert">
                     <?= $_SESSION['message'] ?> 
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>

                <!-- eliminar Mensaje de Session  -->
                 <?php session_unset(); }   ?>
                

                    <div class="card card-body">

                        <form action="save.php" method="POST">
                            <div class="form-group">
                            
                                <input type="text" name="titulo" class="form-control" placeholder="Titulo Tarea" autofocus>
                            
                            
                            </div>

                            <div class="form-group">
                            
                            <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion Tarea"></textarea>
                        
                           
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="salvar_tarea" value="Salvar">
                        
                        </form>
                    
                    </div>
                                    
                </div>

                 <!-- Form para mostrar datos de la BD  -->  
                    
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Titulo</th>
                                <th>Descripcion</th>
                                <th>Creado en</th>
                                <th>Acciones</th>
                            </tr>
                        <tbody>
                            <?php
                                $query = "SELECT * FROM tareas";
                                $resultados = mysqli_query($conn, $query);

                                while($row = mysqli_fetch_array($resultados)){ ?>
                                    <tr>
                                        <td><?php echo $row['titulo']  ?> </td>
                                        <td><?php echo $row['descripcion']  ?> </td>
                                        <td><?php echo $row['created_at']  ?> </td>
                                        <td> 
                                            <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                               <i class="fas fa-marker"> </i> 
                                            </a>
                                             <a href="delete.php?id=<?php echo $row['id'] ?>"class="btn btn-danger">
                                             <i class="fas fa-trash-alt"> </i> 
                                            </a>
                                         </td>

                                    </tr>
                                   


                                <?php }  ?>
                        
                        </tbody>
                        
                        </thead>
                    
                    </table>
                
                </div>

        </div>

 </div>


<?php include("includes/footer.php") ?>
