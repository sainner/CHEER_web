<?php 
    $kind = isset($_GET['kind']) && is_numeric($_GET['kind']) ? $_GET['kind'] : null;
    require "../includes/config.php";
    $conn = require_once '../includes/database.php';
    $current_page = basename($_SERVER['PHP_SELF']);
    $modified_page = str_replace(".php", "", $current_page);

    $sql = "SELECT o.*,
                GROUP_CONCAT(DISTINCT m.name_english ORDER BY m.name_english SEPARATOR ', ') AS author_names,
                GROUP_CONCAT(DISTINCT p.name_suffix ORDER BY p.name_suffix SEPARATOR ', ') AS name_suffix,
                GROUP_CONCAT(DISTINCT p.alter_text ORDER BY p.alter_text SEPARATOR ', ') AS alter_texts
            FROM Outputs o 
            LEFT JOIN outputs_members om ON o.output_id = om.output_id 
            LEFT JOIN Members m ON om.member_id = m.member_id 
            LEFT JOIN Pictures p ON p.outputs_id = o.output_id ";

    if ($kind !== null) {
    $sql .= " WHERE o.kind = :kind";
    }
    $sql .= " GROUP BY o.output_id;";    
    
    $stmt = $conn->prepare($sql);
    if ($kind !== null) {
        $stmt->bindParam(':kind', $kind, PDO::PARAM_INT);
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
        <div class="container">
            <?php include_once '../includes/templates/sidebar.php';?>
            <section class="content" id="outputsContainer">
                <div id="searchButton">
                    <img id="searchIcon" src="<?=BASE_URL?>images/icon/search.svg" alt="search_icon">
                    <input type="text" id="searchInput" placeholder="请输入关键词">
                </div>
                <div id="<?=$modified_page?>">
                    <?php include '../includes/templates/articleBoxs.php';?>
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
    <script>
        drawSlashes("journalBox", "white", 15);
        window.addEventListener('resize', function() {drawSlashes("journalBox", "white", 15);});
        addSectorToCorner('.articleBox', '右上', '80');

        //每个页面初始化搜索功能
        initializeSearch('<?=$modified_page?>', '<?=$modified_page?>');
    </script>
</html>