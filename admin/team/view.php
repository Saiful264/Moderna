<?php
 session_start();
 include_once '../templates/header.php';
require_once "../db.php";

$id = $_GET['id'];

$query = "SELECT * FROM team WHERE id = $id";

$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result)){
    $data = mysqli_fetch_assoc($result);
}
?>


<section class="mt-5">
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-header">
                    <h2>User</h2>
                </div>
                     <div class="card-body">
                     <table class="table table-bodered">
                         
                     <tr>
                         <td>Id</td>
                         <td><?= $data["id"]?></td>
                     </tr>
                     <tr>
                         <td>Name</td>
                         <td><?= $data["name"]?></td>
                     </tr>
                     <tr>
                         <td>User Name</td>
                         <td><?= $data["post"]?></td>
                     </tr>
                     <tr>
                         <td>Email</td>
                         <td><?= $data["description"]?></td>
                     </tr>
                     <tr>
                         <td>Photo</td>
                         <td><img src="../../uploads/team/<?=$data['banner'] ?>" width="80"
                          alt="<?= $data['name'] ?>"></td>
                     </tr>
                    
                    
                    
                    
                     </table>
                 </div>
            </div>
        </div>
    </div>
</div>
</section>
