<?php 

// Kết nối với cơ sở dữ liệu
$conn = mysqli_connect("localhost", "root", "", "daoliencoffee");

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}


// Thực thi câu truy vấn để thêm dữ liệu vào bảng
$stmt = mysqli_prepare($conn, "UPDATE tbl_user SET name=?, birthday=?, location=?, sdt=?, email= ? WHERE id_user=?");
mysqli_stmt_bind_param($stmt, "ssssss", $_GET["name"], $_GET["birthday"], $_GET["location"], $_GET["sdt"], $_GET["email"], $_GET["iduser"]);

if (mysqli_stmt_execute($stmt)) {
    echo "1";
} else {
    echo "0";
}

// Đóng kết nối
mysqli_close($conn);

?>