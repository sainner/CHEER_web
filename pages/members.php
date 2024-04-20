    <?php 
    //ini_set('display_errors', 1);
    //rror_reporting(E_ALL);
    $position = isset($_GET['position']) && is_numeric($_GET['position']) ? $_GET['position'] : null;
    require "../includes/config.php";
    $conn = require_once '../includes/database.php';
    $current_page = basename($_SERVER['PHP_SELF']);
    $modified_page = str_replace(".php", "", $current_page);

    $sql = 'SELECT 
                m.*,
                GROUP_CONCAT(o.output_id ORDER BY o.output_id SEPARATOR "% ") AS output_id,
                GROUP_CONCAT(o.title ORDER BY o.output_id SEPARATOR "% ") AS output_titles,
                GROUP_CONCAT(grouped_authors.author_names ORDER BY o.output_id SEPARATOR "% ") AS author_names,
                GROUP_CONCAT(o.other_authors ORDER BY o.output_id SEPARATOR "% ") AS other_authors,
                GROUP_CONCAT(o.journal ORDER BY o.output_id SEPARATOR "% ") AS journals,
                GROUP_CONCAT(o.time ORDER BY o.output_id SEPARATOR "% ") AS times,
                GROUP_CONCAT(o.`volumn&pages` ORDER BY o.`volumn&pages` SEPARATOR "% ") AS volumn_and_pages,
                MAX(p.name_suffix) AS name_suffix,
                MAX(p.alter_text) AS alter_text,
                MAX(p.member_id) AS picture_member_id
            FROM Members m
            LEFT JOIN outputs_members om ON m.member_id = om.member_id
            LEFT JOIN (
                SELECT 
                    om1.output_id,
                    GROUP_CONCAT(DISTINCT a.name_english ORDER BY a.name_english SEPARATOR ", ") AS author_names
                FROM outputs_members om1
                LEFT JOIN Members a ON om1.member_id = a.member_id
                GROUP BY om1.output_id
            ) grouped_authors ON grouped_authors.output_id = om.output_id
            LEFT JOIN Outputs o ON om.output_id = o.output_id
            LEFT JOIN Pictures p ON m.member_id = p.member_id';
    
    if ($position !== null) {
        $sql .= " WHERE m.position = :position";
    }
    $sql .= " GROUP BY m.member_id;";    
    
    $stmt = $conn->prepare($sql);
    if ($position !== null) {
        $stmt->bindParam(':position', $position);
    }
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    include_once '../includes/templates/head.php';
    ?>
    <body>
        <div class="tranAniContatiner">
                <svg preserveAspectRatio="none" width="100%" height="100%">
                </svg>
        </div>
        <?php include_once '../includes/templates/header.php';?>
        <div class="container membersContainer">
            <?php include_once '../includes/templates/sidebar.php';?>
            <section class="content" id="membersContent">
                <div class="searchButton membersSearch">
                    <img class="searchIcon" src="<?=BASE_URL?>images/icon/search.svg" alt="search_icon">
                    <input type="text" class="searchInput" placeholder="请输入关键词">
                </div>
                <div id="<?=$modified_page?>">
                <?php include_once '../includes/templates/memberBoxs.php';?>
                </div>
            </section>
            <div id="modelContainer"></div>
        </div>
    </body>
    <?php
    $footer_position = 'footer_right';
    include_once '../includes/templates/footer.php';
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="https://unpkg.com/three@0.125.2/build/three.min.js"></script>
    <script src="https://unpkg.com/three@0.125.2/examples/js/loaders/GLTFLoader.js"></script>
    <script src="../script/general.js"></script>
    <script src="../script/modelController.js"></script>
    <script src="../script/scrollAni.js"></script>
    <script>
        var membersData = <?= json_encode($results); ?>;
        addSectorToCorner('.memberBox', '右下', '50');
        initializeSearch('<?=$modified_page?>', '<?=$modified_page?>');
        drawSlashes("journalBox", "white", 15);
        window.addEventListener('resize', function() {drawSlashes("journalBox", "white", 15);});
        drawSlashes("nameNposition", "white", 15);
        window.addEventListener('resize', function() {drawSlashes("nameNposition", "white", 15);});
        drawSlashes("timePoint", "#DB5C5C", 8);
        window.addEventListener('resize', function() {drawSlashes("timePoint", "#DB5C5C", 8);});
        scrollAni();
    </script>
</html>