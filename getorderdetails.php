


<?php 
    header("Content-type: text/html; charset=utf-8");
    $conn = new mysqli("localhost","root","","daoliencoffee");
    mysqli_set_charset($conn, 'UTF8');
    $st_check=$conn->prepare("SELECT * FROM tbl_order_details  
        JOIN tbl_product ON tbl_order_details.id_product = tbl_product.id_product
        WHERE tbl_order_details.order_code=?");
    $st_check->bind_param("s", $_GET["order_code"]);
    $st_check->execute();
    $rs = $st_check->get_result();
    $arr = array();
    while ($row=$rs->fetch_assoc()) {
        array_push($arr, $row);
    }
    echo json_encode($arr)
?>