
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["file"])) {

    // Lấy chuỗi tên gửi lên từ client
   $names = $_POST["file"];
   echo $names;
    $conn = mysqli_connect("localhost", "root", "", "daoliencoffee");

    // Kiểm tra kết nối
    if (!$conn) {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }
   

    $stmt = mysqli_prepare($conn, "UPDATE tbl_user SET image_user=? WHERE id_user=?");
    mysqli_stmt_bind_param($stmt, "si", $names, $_GET["id_user"]);

    if (mysqli_stmt_execute($stmt)) {
        echo "1";
    } else {
        echo "0";
    }
}
    

 else {
    echo "Yêu cầu không hợp lệ.";
}   

?>