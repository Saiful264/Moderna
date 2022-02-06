<?php
 session_start();

 if(isset($_POST['submit'])){
    $title = trim(htmlentities($_POST['title']));
    $description = trim(htmlentities($_POST['description']));
    $btn_text = trim(htmlentities($_POST['btn_text']));
    $btn_link = trim(htmlentities($_POST['btn_link']));
    $photo = $_FILES["photo"];

    if(empty($title)){
        $_SESSION['titleerr'] = "Enter your Title";
    }
    if(empty($description)){
        $_SESSION['descriptionerr'] = "Enter your Description";
    }
    if(empty($btn_text)){
        $_SESSION['btn_texterr'] = "Enter your Botten Text";
    }
    if(empty($btn_link)){
        $_SESSION['btn_linkerr'] = "Enter your Botten Link";
    }
    // if(empty($photo['name'])){  //photo is a array so $photo['name'] photo a name store in a array  OR IT RETURN A FILES
    //     $_SESSION['photoerr'] = "Enter your Photo";
    // } photo chaking


    if(!empty($title) && !empty($photo['name'])){
        require_once '../db.php';

        $img_ex = explode('.', $photo['name']);
        $img_name = $title.".".end($img_ex);

        $upload = move_uploaded_file($photo['tmp_name'],"../../uploads/banners/".$img_name);

        if($upload){
            $query = "INSERT INTO banners(title, discription, btn_text, btn_link, photo) 
            VALUES ('$title','$description','$btn_text','$btn_link','$img_name')";

            $result = mysqli_query($conn, $query);

            if($result){
                $_SESSION['seccess'] = "Banner upload success!";

                header("Location: banner.php");
            }

        }




    }else{
        header("Location: insert.php");
    }
 }

// not work in imag othingcation