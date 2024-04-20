<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
// 连接数据库和处理请求（示例代码，需要根据实际情况调整）
require "config.php";
$conn = require_once 'database.php';

//使得自动获取的页面名称和表名对应
switch($_GET['current_page']?? ''){
    case 'outputs':
        $target_table = 'Outputs';
        break;
    case 'news':
        $target_table = 'News';
        break;
    case 'members':
        $target_table = 'Members';
        break;
    default:
        die("Invalid table name provided.");
}
$key_words = $_GET['key_words'] ?? '';

// 进行搜索查询
$sql = "CALL GeneralSearch(?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $target_table, PDO::PARAM_STR);
$stmt->bindParam(2, $key_words, PDO::PARAM_STR);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 使用 PHP 模板渲染结果
ob_start(); // 开始缓冲输出
switch($_GET['current_page']?? ''){
    case 'outputs':
        require "templates/articleBoxs.php";
        $html = ob_get_clean();
        echo $html;
        break;
    case 'news':
        require "templates/newsBoxs.php";
        $html = ob_get_clean();
        echo $html;
        break;
    case'members':
        require "templates/memberBoxs.php";
        $html = ob_get_clean();
        $response = [
            'html' => $html,
            'members' => $results  // 或者任何你需要更新前端的数据
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        break;
}
