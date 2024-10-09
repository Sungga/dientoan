<?php
// Thông tin kết nối
$serverName = "thi.database.windows.net"; // Tên server, ví dụ: "localhost" hoặc "192.168.1.1"
$connectionOptions = array(
    "Database" => "sinhvien", // Tên database
    "Uid" => "thi",           // Tên người dùng
    "PWD" => "@A123456"            // Mật khẩu
);

// Kết nối với SQL Server
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Kiểm tra kết nối
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Kết nối thành công!";
}

// Đóng kết nối
sqlsrv_close($conn);
?>