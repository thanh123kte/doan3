


<?php 
    header("Content-type: text/html; charset=utf-8");
    $conn = new mysqli("localhost","root","","daoliencoffee");
    mysqli_set_charset($conn, 'UTF8');
    $st_check=$conn->prepare("SELECT * from tbl_order INNER JOIN tbl_order_details on tbl_order.order_code = tbl_order_details.order_code INNER JOIN tbl_product on tbl_product.id_product = tbl_order_details.product_id WHERE tbl_order_details.id_user=? GROUP BY tbl_order_details.order_code"); // để test ngồi coi đi V: lô
    $st_check->bind_param("s", $_GET["id_user"]);
    $st_check->execute();
    $rs = $st_check->get_result();
    $arr = array();
    while ($row=$rs->fetch_assoc()) {
        array_push($arr, $row);
    }
    echo json_encode($arr)
?>
