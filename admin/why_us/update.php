<?php
session_start();

    
    if(isset($_POST['submit'])){
        $name = trim(htmlentities($_POST['name']));
        $post = trim(htmlentities($_POST['post']));
        $description = trim(htmlentities($_POST['description']));
        $banner = $_FILES['banner'];

        if(!empty($banner['name'])){
            $banner_ex = explode('.', $banner['name']);

            $banner_name = "why_us".".". end($banner_ex);

            $upload = move_uploaded_file($banner['tmp_name'], '../../uploads/whyus/'.$banner_name);

            print_r($upload);

            if($upload){
                $query = "UPDATE why_us SET banner='$banner_name',video_url=' $video_url',
                icon_one='$icon_one',title_one='$title_one',discription_one='$discription_one',
                icon_two='$icon_two',title_two='$title_two',discription_two='$discription_two'";

                require_once '../db.php';// this page link with index.php so index.php is alrady connect with db.php 

                $result = mysqli_query($conn, $query);// connect to the data dase query

                if($result){
                    $_SESSION['seccess'] = "Update Seccess!";
                    header("Location: index.php");
                }

            }

        }



        
    }

?>
