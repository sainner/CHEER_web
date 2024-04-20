<?php 
$publications = $results[$n];
$output_id = explode("% ", $publications['output_id']);
$output_id = array_map('intval', $output_id);
$output_titles = explode("% ", $publications['output_titles']);
$author_names = explode("% ", $publications['author_names']);
$other_authors = explode('% ', $publications['other_authors']);
$journals = explode('% ', $publications['journals']);
$times = explode('% ', $publications['times']);
$volumn_and_pages = explode('% ', $publications['volumn_and_pages']);
?>

<?php for ($i = 0; $i < count($output_titles); $i++){
$authors = $author_names[$i];
if ($other_authors[$i] != " ") {
    $authors .= ", " . $other_authors[$i];
}
?>
<div class="articleBox fadein" id="memberArticleBox" onclick="window.location.href='<?= BASE_URL?>pages/outputs.php?output_id=<?= $output_id[$i]?>'">
    <h2><?= htmlspecialchars($output_titles[$i]) ?></h2>
    <p class="authors"><?= htmlspecialchars($authors) ?></p>
    <div class="journalBox">
        <p class="journalName"><?= htmlspecialchars($journals[$i]) ?></p>
        <p class="journalDetails"><span class="year"><?= htmlspecialchars($times[$i]) ?></span>, <?= htmlspecialchars($volumn_and_pages[$i]) ?></p>
    </div>
</div>
<?php } ?>
