<?php 
    header("Content-type: text/html; charset=utf-8");
    $conn = new mysqli("localhost","root","","daoliencoffee");
    mysqli_set_charset($conn, 'UTF8');
    $st_check=$conn->prepare("SELECT tbl_cart.amount, tbl_product.* FROM tbl_cart 
        JOIN tbl_product ON tbl_cart.id_product = tbl_product.id_product
        WHERE tbl_cart.id_user=?");
    $st_check->bind_param("s", $_GET["id_user"]);
    $st_check->execute();
    $rs = $st_check->get_result();
    $arr = array();
    while ($row=$rs->fetch_assoc()) {
        array_push($arr, $row);
    }
    echo json_encode($arr)
?>