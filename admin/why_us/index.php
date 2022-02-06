<?php
    session_start();
    include_once '../templates/header.php';

    require_once '../db.php';// this page link with index.php so index.php is alrady connect with db.php 
    $query = "SELECT * FROM why_us";
  
    $result = mysqli_query($conn, $query);// connect to the data dase query
  
    if(mysqli_num_rows($result)>0){
        $data = mysqli_fetch_assoc($result); //a function is give us assosetive array
    }
  

?>
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                   <div class="card">
                       <div class="card-header">
                           <h2>Edit Why us</h2>
                       </div>
                       <div class="card-body">
                            <form action="update.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Icon One" name="icon_one" value="<?=$data['icon_one']?>">
                                    <?php
                                    if(isset($_SESSION['titleerr'])){
                                    ?>
                                        <p class="text-danger"><?=$_SESSION['titleerr']?></p> 
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Title One" name="title_one" value="<?=$data['title_one']?>">
                                    <?php
                                    if(isset($_SESSION['titleerr'])){
                                    ?>
                                        <p class="text-danger"><?=$_SESSION['titleerr']?></p> 
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <textarea name="discription_one" class="form-control">
                                    <?=$data['discription_one']?>
                                    </textarea>
                                    <?php
                                    if(isset($_SESSION['descriptionerr'])){
                                    ?>
                                        <p class="text-danger"><?=$_SESSION['descriptionerr']?></p> 
                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Icon Two" name="icon_two" value="<?=$data['icon_two']?>">
                                    <?php
                                    if(isset($_SESSION['titleerr'])){
                                    ?>
                                        <p class="text-danger"><?=$_SESSION['titleerr']?></p> 
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Title Two" name="title_two" value="<?=$data['title_two']?>">
                                    <?php
                                    if(isset($_SESSION['titleerr'])){
                                    ?>
                                        <p class="text-danger"><?=$_SESSION['titleerr']?></p> 
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <textarea name="discription_two" class="form-control" placeholder="Description Two">
                                    <?=$data['discription_two']?>
                                    </textarea>
                                    <?php
                                    if(isset($_SESSION['descriptionerr'])){
                                    ?>
                                        <p class="text-danger"><?=$_SESSION['descriptionerr']?></p> 
                                    <?php
                                    }
                                    ?>
                                </div>
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Video Url" name="video_url" value="<?=$data['video_url']?>">
                                    <?php
                                    if(isset($_SESSION['btn_linkerr'])){
                                    ?>
                                        <p class="text-danger"><?=$_SESSION['btn_linkerr']?></p> 
                                    <?php
                                    }
                                    ?>
                                </div>

                                <div class="form-group">
                                    <input type="file" id="upload_img" class="form-control" name="banner">

                                    <img width="150" id="show_img" src="../../uploads/whyus/<?=$data['banner']?>" alt="">


                                    <?php
                                    if(isset($_SESSION['btn_texterr'])){
                                    ?>
                                        <p class="text-danger"><?=$_SESSION['btn_texterr']?></p> 
                                    <?php
                                    }
                                    ?>
                                </div>


                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-primary" value="Update" name="submit">
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

<script>

        let linkfile = document.getElementById('upload_img');
        let showTarget = document.getElementById('show_img');
        
        linkfile.addEventListener("change", function(){
              showTarget.src = URL.createObjectURL(linkfile.files[0]);          
        });
</script>


  