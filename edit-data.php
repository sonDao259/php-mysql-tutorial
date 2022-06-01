<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcement</title>
    <style>
        body {
            display: flex;
        }
        .announcement-container {
            /* display: flex; */
            margin: auto;
        }
        .announcement-container a {
            font-style: italic;
            color: #00f;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="announcement-container">
        <h1>Thông báo</h1>
        <?php
            if(isset($_POST)) {
                $data = $_POST;
            }
            $errors = [];
            // Validate 
            // ***Name
            if(!is_string($data['name']) || strlen($data['name']) < 5 || strlen($data['name']) > 50) {
                $errors['name'] = $data['name'].': Tên cầu thủ không hợp lệ';
            }
            // ***Age
            if(!is_numeric($data['age']) || $data['age'] < 15 || $data['age'] > 65) {
                $errors['age'] = $data['age'].': Tuổi cầu thủ không hợp lệ';
            }
            if(count($errors) > 0) {
                echo '<div>';
                foreach($errors as $err) {
                    echo '<div>'.$err.'</div>';
                }
                echo '<a href="./view/add-players.php">Quay lại</a>';
                echo '</div>';
            }
            else {
                require_once './model.php';
                if (isset($_GET['id'])) {
                    $sql = "UPDATE players SET name = '".$data['name']."', age = '".$data['age']."' WHERE id = ".$_GET['id'];
                    if($conn->query($sql)) {
                        echo '<div>Cập nhật thành công. <a href="./">Trang chủ</a></div></div>';
                    } else {
                        echo '<div>Cập nhật thất bại. <a href="./view/add-players.php">Quay lại</a></div>';
                    }
                } else {
                    $sql = "INSERT INTO players (name, age) VALUES ('".$data['name']."', '".$data['age']."')";
                    if($conn->query($sql)) {
                        echo '<div>Thêm vận động viên thành công. <a href="./">Trang chủ</a></div></div>';
                    } else {
                        echo '<div>Thêm vận động viên thất bại. <a href="./view/add-players.php">Quay lại</a></div>';
                    }
                }
            }
        ?>
    </div>
</body>
</html>