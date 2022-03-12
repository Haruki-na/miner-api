<?php
    session_start();
    require("../database/connect.php");

    

    $errors = array();


    if (isset($_POST['add'])) {
        $tag = mysqli_real_escape_string($con, $_POST['tag']);
        $pool = mysqli_real_escape_string($con, $_POST['pool']);
        $wallet = mysqli_real_escape_string($con, $_POST['wallet']);
        $password = mysqli_real_escape_string($con, $_POST['pass']);

  

        if (empty($tag)) {
            array_push($errors, "กรุณากรอกชื่อ!");
            $_SESSION['error'] = "กรุณากรอกชื่อ!";
        }
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

        $query = mysqli_query($con, "SELECT * FROM `miners` WHERE `tag` = '$tag'");
        $result = mysqli_fetch_assoc($query);

      
        if ($result['tag'] === $tag) {
            array_push($errors, "ชื่อ miner นี้ถูกใช้แล้ว!");
            $_SESSION['error'] = "ชื่อ miner นี้ถูกใช้แล้ว!";
        }


        if (count($errors) == 0) {

            $add = "INSERT INTO `miners`(`tag`, `pool`, `wallet`, `pass`) VALUES ('$tag', '$pool', '$wallet', '$password')";
            mysqli_query($con, $add);

            $_SESSION['success'] = "เพิ่ม $tag สำเร็จ!";
            header('location: ../index.php');
        } else {
            header("location: ../index.php");
        }

    }
?>