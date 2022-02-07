<?php

session_start();
include_once '../templates/header.php';
require_once "../db.php";

$id = $_GET['id'];

$query = "SELECT id, name, post, description, banner, icon_class_1,
 icon_class_2, icon_class_3, icon_class_4 FROM team WHERE 1";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result)){
   $data = mysqli_fetch_assoc($result);
}


//$error[];

if(isset($_POST['submit'])){
    $name = trim(htmlentities($_POST['name']));
    $post = trim(htmlentities($_POST['post']));
    $description = trim(htmlentities($_POST['description']));
    $banner = $_FILES['banner'];

    if(empty($error)){
        if($banner['name']){
            $img_ex = explode('.', $banner['name']);

            $photo_name = $name . time(). end($img_ex);

            $upload = move_uploaded_file($banner['tmp_name'], "../../uploads/team/".$photo_name);

            $filesPath = "../../uploads/team/".$data['banner'];

            if(file_exists($filesPath)){
                unlink($filesPath);
            }else{
                echo "Image is not found!";
            }

            $query = "UPDATE team SET name='$name',post='$post',description='$description',banner='$photo_name' WHERE id = $id";
            $result = mysqli_query($conn, $query);
        }else
        {
            $query = "UPDATE team SET name='$name',post='$post',description='$description', WHERE id = $id";
            $result = mysqli_query($conn, $query);          
        } 
        if ($result){
            header("Location: index.php");
        }

    }

}



// //updata query

require_once "../templates/header.php"

?>
<section class="mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit User</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
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

