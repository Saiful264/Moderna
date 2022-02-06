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
                       <h2>Add Team<a href="index.php" class="btn btn-primary">All Team</a></h2>
                   </div>
                   <div class="card-body">
                        <form action="team_post.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name" name="name">
                                <?php
                                if(isset($_SESSION['titleerr'])){
                                ?>
                                    <p class="text-danger"><?=$_SESSION['titleerr']?></p> 
                                <?php
                                }
                                ?>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Post" name="post">
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
                           
                           
                                <?php
                                if(isset($_SESSION['btn_texterr'])){
                                ?>
                                    <p class="text-danger"><?=$_SESSION['btn_texterr']?></p> 
                                <?php
                                }
                                ?>
                            </div>
                            

                            
                            <div class="form-group">
                                    <input type="file" class="form-control" name="banner">

                                    <img width="150" src="../../uploads/team/<?=$data['banner']?>" alt="">


                                    <?php
                                    if(isset($_SESSION['btn_texterr'])){
                                    ?>
                                        <p class="text-danger"><?=$_SESSION['btn_texterr']?></p> 
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
