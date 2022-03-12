<?php
    session_start();
    require("../database/connect.php");


    $tag = $_GET['tag'];

 
    $sql = "DELETE FROM `miners` WHERE `tag` = '$tag'";
    $result = mysqli_query($con, $sql) or die("error in sql : $sql". mysqli_error($sql));
    mysqli_close($con);
    if($result){
        header("Location: ../index.php");
        $_SESSION['success'] = "ลบ $tag สำเร็จ!";
    } else {
        echo "alert('error!!');";
        header("location: ../index.php");
    }



    


    

?>