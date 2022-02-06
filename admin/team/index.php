<?php
    session_start();
    include_once '../templates/header.php';
    require_once '../db.php';// this page link with index.php so index.php is alrady connect with db.php 
    $query = "SELECT * FROM team";
  
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
                           <h2>All Team<a href="insert.php" class="btn btn-primary">Add Team</a></h2>
                       </div>
                       <div class="card-body">
                       <table class="table">
                        <tr>
                            <td>Id</td>
                            <td>photo</td>
                            <td>Name</td>
                            <td>Post</td>
                            <td>Description</td>
                            <td>Action</td>

                        </tr>
                        <?php
                        foreach($datas as $key => $data){
                            ?>
                            <tr>
                                <td><?= ++$key ?></td>
                                <td></td>
                                <td><?=$data['name']?></td>
                                <td><?=$data['post']?></td>
                                <td><?= substr($data['description'], 0, 50).'...'?></td>
                               
                                <td>
                                    <a  class="btn btn-danger" href="">active/deactive</a>
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