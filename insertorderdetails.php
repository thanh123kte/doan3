<?php 

// Kết nối với cơ sở dữ liệu
$conn = mysqli_connect("localhost", "root", "", "daoliencoffee");

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}


// Thực thi câu truy vấn để thêm dữ liệu vào bảng
$stmt = mysqli_prepare($conn, "INSERT INTO tbl_order_details (order_code, product_id, product_quantity, order_shipping, id_user) VALUES (?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "iiiii", $_GET["order_code"], $_GET["product_id"], $_GET["product_quantity"], $_GET["order_shipping"],
 $_GET["id_user"]);

if (mysqli_stmt_execute($stmt)) {
    echo "1";
} else {
    echo "0";
}

// Đóng kết nối
mysqli_close($conn);

?>