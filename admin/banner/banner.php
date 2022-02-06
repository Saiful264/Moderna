<?php
    session_start();
    include_once '../templates/header.php';
    require_once '../db.php';// this page link with index.php so index.php is alrady connect with db.php 
    $query = "SELECT * FROM banners WHERE status = 1";
  
    $result = mysqli_query($conn, $query);// connect to the data dase query
  
    if(mysqli_num_rows($result)>0){
        $datas = mysqli_fetch_all($result, 1); //a function is give us assosetive array
    }
  
?>
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php 
                    if(isset($_SESSION['seccess'])){
                        ?>
                       <div class="alert alert-success" role="alert">
                       <h4 class="alert-heading"></h4>
                       <p><?=$_SESSION['seccess']?></p>
                     </div>
                    <?php
                    }
                    ?>
                   <div class="card">
                       <div class="card-header">
                           <h2>All Banner <a href="insert.php" class="btn btn-primary">Add Banner</a></h2>
                       </div>
                       <div class="card-body">
                       <table class="table">
                        <tr>
                            <td>Id</td>
                            <td>Photo</td>
                            <td>Title</td>
                            <td>Description</td>
                            <td>Botton Text</td>
                            <td>Status</td>
                            <td>Action</td>
                        </tr>
                        <?php
                        foreach($datas as $key => $data){
                            ?>
                            <tr>
                                <td><?= ++$key ?></td>
                                <td><?=$data['photo']?></td>
                                <td><?=$data['title']?></td>
                                <td><?= substr($data['discription'], 0, 50).'...'?></td>
                                <td><?=$data['btn_text']?></td>
                                <td><a  class="btn btn-danger" href="">active/deactive</a></td>
                                <td>
                                    <a class="btn btn-success" href="">View</a>
                                    <a  class="btn btn-danger" href="">Edit</a>
                                    <a class="btn btn-success" href="">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }

                        ?>
                    </table>
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
  