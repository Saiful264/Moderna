<?php
    session_start();
    include_once '../templates/header.php';

?>
   <section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
               <div class="card">
                   <div class="card-header">
                       <h2>Add Service <a href="index.php" class="btn btn-primary">All Services</a></h2>
                   </div>
                   <div class="card-body">
                        <form action="service_post.php" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Title" name="title">
                                <?php
                                if(isset($_SESSION['titleerr'])){
                                ?>
                                    <p class="text-danger"><?=$_SESSION['titleerr']?></p> 
                                <?php
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <textarea name="description" class="form-control" placeholder="Description"></textarea>
                                <?php
                                if(isset($_SESSION['descriptionerr'])){
                                ?>
                                    <p class="text-danger"><?=$_SESSION['descriptionerr']?></p> 
                                <?php
                                }
                                ?>
                            </div>
                            <div class="form-group" >
                                <select name="box_color" id="" class="form-control">
                                    <option value="icon-box-pink">Pink</option>
                                    <option value="icon-box-cyan">Cyan</option>
                                    <option value="icon-box-green">Green</option>
                                    <option value="icon-box-blue">Blue</option>
                                </select>
                                <?php
                                if(isset($_SESSION['btn_texterr'])){
                                ?>
                                    <p class="text-danger"><?=$_SESSION['btn_texterr']?></p> 
                                <?php
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Icon Name" name="icon_class">
                                <?php
                                if(isset($_SESSION['btn_linkerr'])){
                                ?>
                                    <p class="text-danger"><?=$_SESSION['btn_linkerr']?></p> 
                                <?php
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="form-control btn btn-primary" value="submit" name="submit">
                            </div>
                        </form>
                   </div>
               </div>
            </div>
        </div>
    </div>
</section>    

<?php
include_once '../templates/footer.php';
session_unset();
?>
  