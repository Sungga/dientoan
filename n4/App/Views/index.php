<!DOCTYPE html>
<html>

<head>
    <title>Danh sách Sinh Viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            color: #333;
            text-decoration: none;
        }

        a:hover {
            color: #007BFF;
        }

        button {
            margin-top: 10px;
            display: block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Danh sách sinh viên</h1>
    <?php if (empty($dssv)) : ?>
        <h3>Không có sinh viên.</h3>
    <?php else : ?>
        <table>
            <tr>
                <th>STT</th>
                <th>Tên Sinh Viên</th>
                <th>Ngày Sinh</th>
                <th>Giới Tính</th>
                <th>Lớp</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
            <?php
            $stt = 1;
            foreach ($dssv as $sv) : ?>
                <tr>
                    <td><?php echo $stt; ?></td>
                    <td><?php echo $sv['ten_sv']; ?></td>
                    <td><?php echo $sv['ngaysinh']; ?></td>
                    <td><?php echo $sv['gioitinh']; ?></td>
                    <td><?php echo $sv['ten_lop']; ?></td>
                    <td><a href="index.php?action=edit&id=<?php echo $sv['ma_sv']; ?>">Sửa</a></td>
                    <td><a href="index.php?action=xoaSV&id=<?php echo $sv['ma_sv']; ?>">Xóa</a></td>
                </tr>
            <?php
                $stt++;
            endforeach; ?>
        </table>
    <?php endif; ?>
    
    <button><a href="index.php?action=create" style="text-decoration: none; color: #fff;">Thêm</a></button>
</body>

</html>