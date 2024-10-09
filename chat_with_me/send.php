<?php
// Thông tin kết nối
$serverName = "thi.database.windows.net"; // Tên server, ví dụ: "localhost" hoặc "192.168.1.1"
$connectionOptions = array(
    "Database" => "sinhvien", // Tên database
    "Uid" => "thi",           // Tên người dùng
    "PWD" => "@A123456"            // Mật khẩu
);

// Kết nối với SQL Server
$database = sqlsrv_connect($serverName, $connectionOptions);
mysqli_set_charset($database, "utf8");
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['message'])) {
        $message = $_POST['message'];
        $user = $_POST['user'];
        if($user == 1) {
            $query = "INSERT INTO tbl_message(user, message) VALUES('1', '$message')";
        }
        else {
            $query = "INSERT INTO tbl_message(user, message) VALUES('0', '$message')";
        }
        mysqli_query($database, $query);
    }
}
?>