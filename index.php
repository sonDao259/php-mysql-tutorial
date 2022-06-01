<?php 
    require_once "./model.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-mysql-tutorial</title>
    <style>
        body {
            display: flex;
        }
        div {
            margin: auto;
        }
        button {
            width: 100%;
        }
        ul a {
            text-decoration: none;
            font-style: italic;
        }
        ul a:first-child {
            color: #00f;
        }
        ul a:last-child {
            color: #f00;
        }
    </style>
</head>
<body>
    <div>
        <h1>Danh sách vận động viên</h1>
        <ul>
            <?php
                $sql = 'SELECT id, name, age FROM players';
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<li>Tên: '.$row['name'].'. Tuổi: '.$row['age'].' <a href="./view/edit-player.php?id='.$row['id'].'">Chỉnh sửa</a> <a href="./delete-data.php?id='.$row['id'].'">Xóa VĐV</a></li>';
                    }
                } else {
                    echo '<li>Chưa có vận động viên nào trong danh sách. Thêm cầu thủ <a href="./view/add-players.php">tại đây</a></li>';
                }
            ?>
        </ul>
        <a href="./view/add-players.php">
            <button>Thêm</button>
        </a>
    </div>
</body>
</html>