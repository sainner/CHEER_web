<?php 
    require "../includes/config.php";
    $current_page = basename($_SERVER['PHP_SELF']);
    include '../includes/templates/head.php';
    ?>
    <body>
        <div class="tranAniContatiner">
            <svg preserveAspectRatio="none" width="100%" height="100%">
            </svg>
        </div>
        <?php include_once '../includes/templates/header.php';?>
        <div class="container">
            <?php include_once '../includes/templates/sidebar.php';?>
            <section class="content" id="outputs">
                <?php include '../includes/templates/articleBox.php';?>
                <?php include '../includes/templates/articleBox.php';?>
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
    </script>
</html>