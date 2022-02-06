<?php
 session_start();

print_r($_POST);

 if(isset($_POST['submit'])){
    $name = trim(htmlentities($_POST['name']));
    $post = trim(htmlentities($_POST['post']));
    $description = trim(htmlentities($_POST['description']));
    $banner = $_FILES['banner'];


    if(empty($name)){
        $_SESSION['titleerr'] = "Enter your Title";
    }
    if(empty($post)){
        $_SESSION['box_iconerr'] = "Enter your Botten Text";
    }
    if(empty($description)){
        $_SESSION['descriptionerr'] = "Enter your Description";
    }
    if(empty($banner)){
        $_SESSION['icon_classerr'] = "Enter your Botten Link";
    }
    // if(empty($photo['name'])){  //photo is a array so $photo['name'] 
        //photo a name store in a array  OR IT RETURN A FILES
    //     $_SESSION['photoerr'] = "Enter your Photo";
    // } photo chaking

    
    if(!empty($name)){
        require_once '../db.php';

        $banner_ex = explode('.', $banner['name']);

            $banner_name = "banner"."-".time().'.'.end($banner_ex);

            $upload = move_uploaded_file($banner['tmp_name'], '../../uploads/team/'.$banner_name);

            //print_r($upload);

    
            $query = "INSERT INTO team(name, post,  description, banner) 
            VALUES ('$name','$post','$description','$banner_name')";

            $result = mysqli_query($conn, $query);

            if($result){
                $_SESSION['seccess'] = "Service upload success!";

                header("Location: index.php");
            }
    }else{
       header("Location: index.php"); 
    }
 }

   
        




// not work in imag othingcation