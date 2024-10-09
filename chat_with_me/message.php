<?php 
    $db = mysqli_connect("thi.database.windows.net","thi","@A123456","sinhvien");
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