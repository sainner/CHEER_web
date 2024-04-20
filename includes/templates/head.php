<?php
$metaDescription = "CHEER Lab, design school, Shanghai Jiaotong University";

switch ($current_page) {
    case 'index.php':
        $metaDescription = "Homepage of CHEER Lab, design school, Shanghai Jiaotong University";
        break;
    case 'about_us.php':
        $metaDescription = "About CHEER Lab, our team and mission";
        break;
    case 'enrollment.php':
        $metaDescription = "Contact CHEER Lab, how to reach us";
        break;
    case 'members.php':
        $metaDescription = "members of CHEER Lab, say hi to our team";
        break;
    case 'news.php':
        $metaDescription = "Latest news from CHEER Lab";
        break;
    case 'outputs.php':
        $metaDescription = 'Projects and outputs of CHEER Lab'; 
        break;
    case 'user.php':
        $metaDescription = 'User login and registration for CHEER Lab'; 
        break;
}
?>

<!DOCTYPE html>
<html lang="cn">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta
          name="description"
          content="<?= $metaDescription; ?>"
        />
        <meta name="robots" content="Lab Website, Building technology, SJTU" />
        <link rel="stylesheet" href="<?= BASE_URL;?>styles/style.css" />
        <link rel="icon" href="<?= BASE_URL;?>images/icon/LOGO.svg" />
        <title>CHEER Lab | SJTU Building Technology Lab</title>
    </head>