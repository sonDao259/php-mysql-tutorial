<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete player</title>
    <style>
        body {
            display: flex;
        }
        div {
            margin: auto;
        }
    </style>
</head>
<body>
    <div>
        <h1>Xóa vận động viên</h1>
        <?php
        require_once './model.php';
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $sql = "DELETE FROM players WHERE id=".$_GET['id'];
        if($conn->query($sql)) {
            echo '<p>Xóa vận động viên thành công. <a href="./">Trang chủ</a></p>';
        }
        else {
            echo '<p>Xóa vận động viên thất bại. <a href="./">Trang chủ</a></p>';
        }
        ?>

    </div>
</body>
</html>