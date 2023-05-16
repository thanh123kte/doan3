


<?php 
    header("Content-type: text/html; charset=utf-8");
    $conn = new mysqli("localhost","root","","daoliencoffee");
    mysqli_set_charset($conn, 'UTF8');
    $st_check=$conn->prepare("SELECT * from  tbl_order_details INNER JOIN tbl_product on tbl_product.id_product = tbl_order_details.product_id WHERE tbl_order_details.id_user=? AND tbl_order_details.order_code=?"); // để test ngồi coi đi V: lô
    $st_check->bind_param("si", $_GET["id_user"],$_GET["order_code"]);
    $st_check->execute();
    $rs = $st_check->get_result();
    $arr = array();
    while ($row=$rs->fetch_assoc()) {
        array_push($arr, $row);
    }
    echo json_encode($arr)
?>
