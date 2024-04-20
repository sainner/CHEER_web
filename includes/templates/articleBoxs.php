<?php 
foreach ($results as $row) :
    $imageNames = explode(', ', $row['name_suffix'] ?? '');
    $alter_texts = explode(', ', $row['alter_texts'] ?? '');
    $authors = null;
    $authors = $row['author_names'];
    if ($row['other_authors'] != ' ') {
        $authors .= ', '. $row['other_authors'];
    }
    $journalDetails = null;
    if ($row['volumn&pages'] != ' '){
        $journalDetails = ', '. $row['volumn&pages'];
    }
?>

<div class = "articleBoxWithFigures">
    <article class="articleBox fadein">
        <h2><?= $row['title']?></h2>
        <p class="authors"><?= $authors?></p>
        <div class="journalBox">
            <p class="journalName"><?= $row['journal']?></p>
            <p class="journalDetails"><span class="year"><?= $row['time']?></span><span><?= $journalDetails?></span></p>
        </div>
        <p class="abstract"><?= $row['abstract']?></p>
    </article>
    <div class="figures">
        <?php foreach ($imageNames as $index => $imageName) :
            $alter_text = $alter_texts[$index] ?? 'No alt text here'; // 如果没有对应的替代文本，使用默认值
            ?>
            <img src="<?=BASE_URL?>images/<?= $imageName?>" alt="<?=$alter_text?>" class="fadein">
        <?php endforeach;?>
    </div>
</div>

<?php endforeach; ?>