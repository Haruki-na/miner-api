<?php
    session_start();
    require("../database/connect.php");
  
 

    $errors = array();

    if (isset($_POST['edit'])) {
        $tag =  mysqli_real_escape_string($con, $_POST['tag']);
        $pool = mysqli_real_escape_string($con, $_POST['pool']);
        $wallet = mysqli_real_escape_string($con, $_POST['wallet']);
        $password = mysqli_real_escape_string($con, $_POST['pass']);


        if (empty($pool)) {
            array_push($errors, "กรุณากรอก pool!");
            $_SESSION['error'] = "กรุณากรอก pool!";
        }
        if (empty($wallet)) {
            array_push($errors, "กรุณากรอก wallet!");
            $_SESSION['error'] = "กรุณากรอก wallet!";
        }
        if (empty($password)) {
            array_push($errors, "กรุณากรอก รหัส!");
            $_SESSION['error'] = "กรุณากรอก รหัส!";
        }
        if (count($errors) === 0) {

            $update = "UPDATE `miners` SET `pool`='$pool',`wallet`='$wallet',`pass`='$password' WHERE `tag` = '$tag'";
            mysqli_query($con, $update);

            $_SESSION['success'] = "อัพเดท $tag สำเร็จ";
            header('location: ../index.php');
        } else {
            header("location: ../index.php");
        }
    }

?>