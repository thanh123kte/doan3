<?php 
    header("Content-type: text/html; charset=utf-8");
    $conn = new mysqli("localhost","root","","daoliencoffee");
    mysqli_set_charset($conn, 'UTF8');
    $st_check=$conn->prepare("SELECT tbl_product.*, tbl_danhmuc_sanpham.title_category_product 
                              FROM tbl_product 
                              JOIN tbl_danhmuc_sanpham ON tbl_product.id_category_product = tbl_danhmuc_sanpham.id_category_product
                              WHERE tbl_product.title_product LIKE CONCAT('%', ?, '%') OR tbl_danhmuc_sanpham.title_category_product LIKE CONCAT('%', ?, '%')");
    $st_check->bind_param("ss", $_GET["title_product"], $_GET["title_product"]);
    $st_check->execute();
    $rs = $st_check->get_result();
    $arr = array();
    while ($row=$rs->fetch_assoc()) {
        array_push($arr, $row);
    }
    echo json_encode($arr)
?>