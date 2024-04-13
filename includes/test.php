<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=cheerWeb', 'root', 'lu77279705');
    echo '连接成功';
} catch (PDOException $e) {
    echo "连接失败: " . $e->getMessage();
}