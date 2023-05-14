<?php 

// Kết nối với cơ sở dữ liệu
$conn = mysqli_connect("localhost", "root", "", "daoliencoffee");

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}


// Thực thi câu truy vấn để thêm dữ liệu vào bảng
$stmt = mysqli_prepare($conn, "DELETE FROM tbl_cart WHERE id_user=?");
mysqli_stmt_bind_param($stmt, "i", $_GET["id_user"]);
if (mysqli_stmt_execute($stmt)) {
    echo "1";
} else {
    echo "0";
}

// Đóng kết nối
mysqli_close($conn);

?>