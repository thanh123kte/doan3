<?php 

// Kết nối với cơ sở dữ liệu
$conn = mysqli_connect("localhost", "root", "", "daoliencoffee");

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}


// Thực thi câu truy vấn để thêm dữ liệu vào bảng
$stmt = mysqli_prepare($conn, "UPDATE tbl_cart SET amount=? WHERE id_user=? and id_product=?");
mysqli_stmt_bind_param($stmt, "iii", $_GET["amount"], $_GET["id_user"], $_GET["id_product"]);

if (mysqli_stmt_execute($stmt)) {
    echo "1";
} else {
    echo "0";
}

// Đóng kết nối
mysqli_close($conn);

?>