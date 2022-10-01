<?php include "connect.php" ?>

<html>
<head><meta charset="utf-8"></head>
<body>
    <form action="">
        <input type="text" name="keyword">
        <input type="submit" value="ค้นหา">
    </form>

    <div style="display:block">
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username LIKE ?");

        if(!empty($_GET)) $value = '%' .$_GET["keyword"]. '%';

        $stmt->bindParam(1, $value);
        $stmt->execute();
        while($row = $stmt->fetch()):
    ?>
        ชื่อสมาชิก: <?= $row["name"] ?> <br>
        ที่อยู่: <?= $row["address"] ?> <br>
        อีเมลล์: <?= $row["email"] ?> <br>
        <img src="img/<?= $row["username"] ?>.jpg" width="100">
        <hr>
    <?php endwhile; ?>

    </div>
</body>
</html>