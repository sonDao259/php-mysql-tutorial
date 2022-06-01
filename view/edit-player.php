<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add players</title>
    <style>
        body {
            display: flex;
        }
        .edit-player-container {
            margin: auto;
        }
        .player-input-box {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }
        .player-input-box label {
            font-weight: bold;
        }
        .player-input-box input {
            height: 30px;
            padding: 0 10px;
        }
        button {
            width: 100%;
            height: 30px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="edit-player-container">
        <h1>Chỉnh sửa thông tin cầu thủ</h1>
        <?php
            require_once '../model.php';
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
            }
            $sql = "SELECT id, name, age FROM players WHERE id=".$id;
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                $info = $row;
            }
        ?>
        <form method="post" action="../edit-data.php?id=<?php echo $id?>">
            <div class="player-input-box">
                <label for="player-name">Tên</label>
                <input id="player-name" type="text" name="name" placeholder="Nhập tên cầu thủ..." value="<?php echo $info['name']?>">
            </div>
            <div class="player-input-box">
                <label for="player-age">Tuổi</label>
                <input id="player-age" type="text" name="age" placeholder="Nhập tuổi cầu thủ..." value="<?php echo $info['age']?>">
            </div>
            <button type="submit">Chỉnh sửa</button>
        </form>
        <a href="../">
            <button>Quay về trang chủ</button>
        </a>
    </div>
</body>
</html>