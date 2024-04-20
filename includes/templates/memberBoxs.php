<div class="memberBoxs">
    <?php 
    foreach ($results as $row): 
    $titles = json_decode($row['title']);
    ?>
    <div class="memberBoxContainer">
        <div class="memberBox">
            <div class="profile">
                <img src="<?= BASE_URL?>images/<?=$row['name_suffix']?>" alt="<?=$row['alter_text']?>">
            </div>
            <div class="nameNposition">
                <h2><?=$row['name']?></h2>
                <p><?php 
                switch($row['position']): 
                case 0: echo "教师"; break; 
                case 1: echo "本科生"; break; 
                case 2: echo "硕士研究生"; break; 
                case 3: echo "博士研究生"; break; 
                case 4: echo "博士后"; break; 
                case 5: echo "校友"; break; 
                default: echo "未知"; 
                endswitch;?></p>
            </div>
            <div class="detailInfo">
                <p class="personalTitle"><?php foreach($titles as $title): echo $title. "<br/>"; endforeach;?></p>
                <div class="contact">
                    <img src="<?= BASE_URL?>images/icon/icon_telephone.svg" alt="" class="phoneIcon">
                    <p><?=$row['phone']?></p>
                </div>
                <div class="contact">
                    <img src="<?= BASE_URL?>images/icon/icon_email.svg" alt="" class="emailIcon" onclick="window.location.href='mailto:<?=$row['email']?>?subject=CHEERlab向您问好&body=有什么想了解的吗？';">
                    <p onclick="window.location.href='mailto:<?=$row['email']?>?subject=CHEERlab向您问好&body=有什么想了解的吗？';"><?=$row['email']?></p>
                </div>
                <div class="otherContacts">
                    <img src="<?= BASE_URL?>images/icon/icon_wechat.svg" alt="" class="otherContact_wechat" onclick="alert('<?=$row['wechat']?>')">
                    <img src="<?= BASE_URL?>images/icon/icon_weibo.svg" alt="" class="otherContact_weibo" onclick="alert('<?=$row['weibo']?>')">
                    <img src="<?= BASE_URL?>images/icon/icon_bilibili.svg" alt="" class="otherContact_bilibili" onclick="alert('<?=$row['bilibili']?>')">
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</div>
<?php $n = 0;?>
<div class="education">
    <h3 class="moreDetails">教育经历<span class="englishTitle"> Education</span></h3>
    <?php 
    $which = "education";
    include ("../includes/templates/educationItem.php");?>
    <h3 class="moreDetails">曾获奖项<span class="englishTitle"> Awards</span></h3>
    <?php 
    $which = "awards";
    include ("../includes/templates/educationItem.php");?>
</div>

<div class="personalOutputs">
    <h3 class="moreDetails">学术成果<span class="englishTitle"> Publication</span></h3>
    <?php include ("../includes/templates/publicationItem.php");?>    
</div>