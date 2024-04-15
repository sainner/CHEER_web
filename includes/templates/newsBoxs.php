<?php 
foreach ($results as $row) :
$date = new DateTime($row['time']);
$formatted_date = $date->format('Y/m/d');
?>

<div class = "newsBox fadein">
    <img src="<?=BASE_URL?>images/<?= $row['name_suffix']?>" alt="<?=$row['alter_text']?>">
    <div class="blur"></div>
    <h2><?=$row['title']?></h2>
    <p class="time"><?= $formatted_date?></p>
    <p><?=$row['content']?></p>
</div>

<?php endforeach; ?>