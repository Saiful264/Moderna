<?php
      require_once 'inc/header.php';
      //include_once 'inc/banner.php';

      require_once 'admin/db.php';// this page link with index.php so index.php is alrady connect with db.php 
      $query = "SELECT * FROM team ORDER BY id DESC LIMIT 6";
  
    $result = mysqli_query($conn, $query);// connect to the data dase query
  
    if(mysqli_num_rows($result)>0){
        $datas = mysqli_fetch_all($result, 1); //a function is give us assosetive array
    }

      ?>


  <main id="main">

    <!-- ======= Our Team Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Our Team</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Our Team</li>
          </ol>
        </div>

      </div>
    </section><!-- End Our Team Section -->

    <!-- ======= Team Section ======= -->
    
    <section class="team" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
      <div class="container">
        <div class="row">
      <?php
      foreach($datas as $key => $data){
          ?>
       
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <div class="member-img">
                
                <img src="uploads/team/<?=$data['banner']?>" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
             
              <div class="member-info">
                <h4><?=$data['name']?></h4>
                <span><?=$data['post']?></span>
                <p><?=$data['description']?></p>
              </div>
            </div>
          </div>
         
        <?php
              }
            ?>
        </div>

      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
      include_once 'inc/footer.php';
  ?>