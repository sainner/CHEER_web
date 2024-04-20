<?php
$json_data = json_decode($results[$n][$which], true);  // Decode as array

if (is_array($json_data)) {
    foreach ($json_data as $data) {
        $datas = explode('%', $data);
        ?>
        <div class="educationItem">
            <p class="timePoint"><?= htmlspecialchars($datas[0]) ?></p>
            <p class="event"><?= htmlspecialchars($datas[1]) ?><br/><?= isset($datas[2]) ? htmlspecialchars($datas[2]) : '' ?></p>
        </div>
        <?php
    }
} else {
    echo "Error: Data is not in expected format.";
}