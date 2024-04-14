<?php
foreach ($news as $new):
$date = new DateTime($new['time']);
$formatted_date = $date->format('Y/m/d');
?>

<div class="news fadein">
    <div class="img"><a href=""><img src="./images/<?= $new['name_suffix']?>" alt="<?= $new['alter_text']?>"/></a></div>
    <div class="text">
        <a href="" class="text_hover nextPageLink" ><h2><?= $new['title']?></h2></a>
        <h3 class="time optional"><?= $formatted_date?></h3>
        <p class="optional"><?= $new['instruction']?></p>
    </div>
</div>

<?php
endforeach;
?>