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
                           <h2>Add Banner <a href="banner.php" class="btn btn-primary">All Banner</a></h2>
                       </div>
                       <div class="card-body">
                            <form action="banner_post.php" method="POST" enctype="multipart/form-data">
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
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Botton Text" name="btn_text">
                                    <?php
                                    if(isset($_SESSION['btn_texterr'])){
                                    ?>
                                        <p class="text-danger"><?=$_SESSION['btn_texterr']?></p> 
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Botton Url" name="btn_link">
                                    <?php
                                    if(isset($_SESSION['btn_linkerr'])){
                                    ?>
                                        <p class="text-danger"><?=$_SESSION['btn_linkerr']?></p> 
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="photo">
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
  