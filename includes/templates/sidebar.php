<?php
switch($current_page){
    case "index.php":
        $side_title_1 = "HOME";
        $side_title_2 = " PAGE";
        break;
    case "about_us.php":
        $side_title_1 = "ABOUT";
        $side_title_2 = " US";
        break;
    case "enrollment.php":
        $side_title_1 = "JOIN";
        $side_title_2 = " CHEER";
        break;
    case "members.php":
        $side_title_1 = "TEAM";
        $side_title_2 = " MEMBERS";
        break;
    case "news.php":
        $side_title_1 = "LAB";
        $side_title_2 = " NEWS";
        break;
    case "outputs.php":
        $side_title_1 = "RESEARCH";
        $side_title_2 = " OUTPUTS";
        break;
    case "user.php":
        $side_title_1 = "WELCOME";
        $side_title_2 = " HOME";
        break;
    }
?>

<section class="side_bar">
    <h1><span class="bold"><?=$side_title_1?></span><span class="light"><?=$side_title_2?></span></h1>
    <img src="<?= BASE_URL;?>images/icon/language_switcher.svg"/>
</section>