<?php
 session_start();



 if(isset($_POST['submit'])){
    $title = trim(htmlentities($_POST['title']));
    $description = trim(htmlentities($_POST['description']));
    $box_color = trim(htmlentities($_POST['box_color']));
    $icon_class = trim(htmlentities($_POST['icon_class']));
   
    if(empty($title)){
        $_SESSION['titleerr'] = "Enter your Title";
    }
    if(empty($description)){
        $_SESSION['descriptionerr'] = "Enter your Description";
    }
    if(empty($box_icon)){
        $_SESSION['box_iconerr'] = "Enter your Botten Text";
    }
    if(empty($icon_class)){
        $_SESSION['icon_classerr'] = "Enter your Botten Link";
    }
    // if(empty($photo['name'])){  //photo is a array so $photo['name'] photo a name store in a array  OR IT RETURN A FILES
    //     $_SESSION['photoerr'] = "Enter your Photo";
    // } photo chaking


    if(!empty($title)){
        require_once '../db.php';

    
            $query = "INSERT INTO services(title, description, box_color, icon_class) 
            VALUES ('$title','$description','$box_color','$icon_class')";

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