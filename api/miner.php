<?php

    header('Access-Control-Allow-Origin: *');
    header("Content-type: application/json; charset=utf-8");

    include("connect.php");

    try {
        $stmt = $dbh->prepare("SELECT * FROM `miners` where `tag` = ?");
        $stmt->execute([$_GET['tag']]);
        foreach ($stmt as $row) {
            $miners = array(
                'tag' => $row['tag'],
                'pool' => $row['pool'],
                'wallet' => $row['wallet'],
                'password' => $row['pass']
            );
        echo json_encode($miners);
        }
        $dbh = null;
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }



?>