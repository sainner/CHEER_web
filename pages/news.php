<?php 
    require "../includes/config.php";
    $conn = require_once '../includes/database.php';
    $current_page = basename($_SERVER['PHP_SELF']);
    $modified_page = str_replace(".php", "", $current_page);

    $sql = "SELECT n.*, p.* FROM News n
            LEFT JOIN Pictures p ON n.news_id = p.news_id;";
    $stmt = $conn->prepare($sql);
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
                <?php include_once '../includes/templates/newsBoxs.php';?>
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
        window.addEventListener('resize', function() {drawSlashes("journalBox", "white", 15);});
        addSectorToCorner('.newsBox', '右上', '80');

        //每个页面初始化搜索功能
        initializeSearch('<?=$modified_page?>', '<?=$modified_page?>');
    </script>
</html>