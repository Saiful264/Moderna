<?php
  
    require_once 'admin/db.php';// this page link with index.php so index.php is alrady connect with db.php 

    $query = "SELECT * FROM services LIMIT 8";
  
    $result = mysqli_query($conn, $query);// connect to the data dase query
  
    if(mysqli_num_rows($result)>0){
        $datas = mysqli_fetch_all($result, 1); //a function is give us assosetive array
    }
  
?>
   
   <!-- ======= Services Section ======= -->
    <section class="services">
      <div class="container">

        <div class="row">
          <?php
              foreach($datas as $key=> $data){
          ?>
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="fade-up">
            <div class="icon-box <?= $data['box_color']?>">
              <div class="icon"><i class="bx <?= $data['icon_class']?>"></i></div>
              <h4 class="title"><a href=""><?= $data['title']?></a></h4>
              <p class="description"><?= $data['description']?></p>
            </div>
          </div>
          <?php
          }
          ?>
          

        </div>

      </div>
    </section><!-- End Services Section -->