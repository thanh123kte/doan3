	
<?php 
	header("Content-type: text/html; charset=utf-8");
	$conn = new mysqli("localhost","root","","daoliencoffee");
	mysqli_set_charset($conn, 'UTF8');
	$st_check=$conn->prepare("select * from tbl_product");
	$st_check->execute();
	$rs = $st_check->get_result();
	$arr = array();
	while ($row=$rs->fetch_assoc()) {
		array_push($arr, $row);
	}
	echo json_encode($arr)
 ?>