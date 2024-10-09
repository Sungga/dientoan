<?php 
    // Thông tin kết nối
    $serverName = "thi.database.windows.net"; // Tên server, ví dụ: "localhost" hoặc "192.168.1.1"
    $connectionOptions = array(
        "Database" => "sinhvien", // Tên database
        "Uid" => "thi",           // Tên người dùng
        "PWD" => "@A123456"            // Mật khẩu
    );

    // Kết nối với SQL Server
    $db = sqlsrv_connect($serverName, $connectionOptions);
    mysqli_set_charset($db, "utf8");
    $query = "SELECT * from tbl_message";
    $message = mysqli_query($db, $query);

    $rows = array();

    while($row = mysqli_fetch_assoc($message)) {
        $rows[] = $row;
    }
?>

<?php foreach($rows as $item) { ?>
    <?php if($item['user'] == 0) { ?>
        <div class="chatContent left">
            <p><?php echo $item['message']; ?></p>
        </div>
    <?php } else { ?>
        <div class="chatContent right">
            <p><?php echo $item['message']; ?></p>
        </div>
    <?php } ?>
<?php } ?>