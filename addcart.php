<?php 

// Kết nối với cơ sở dữ liệu
$conn = mysqli_connect("localhost", "root", "", "daoliencoffee");

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}


// Thực thi câu truy vấn để thêm dữ liệu vào bảng
$stmt = mysqli_prepare($conn, "INSERT INTO tbl_cart (id_user, id_product, amount) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, "iii", $_GET["id_user"], $_GET["id_product"], $_GET["amount"]);

if (mysqli_stmt_execute($stmt)) {
    echo "1";
} else {
    echo "0";
}

// Đóng kết nối
mysqli_close($conn);

?>