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
            <section class="content" id="news">
            <div class="outputsContainer">
                <article class="outputsBox">
                    <h2>Research on the application of quantum computing in the discovery of new materials</h2>
                    <p class="authors">Can Liao, Chad E. Hoyer, Rahoul Banerjee Ghosh, Andrew J. Jenkins, Stefan Knecht, Michael J. Frisch, and Xiaosong Li</p>
                    <div class="journalBox">
                        <p class="journalName">The Journal of Physical Chemistry A</p>
                        <p class="journalDetails"><span class="year">2024</span> ,<span>383, 6687,1118-1122</span></p>
                    </div>
                    <p class="content">This research was co-authored by an interdisciplinary team from the Future Lab to explore the potential of quantum computing technologies in the field of novel materials discovery. With the rapid development of quantum computing technology, it has shown revolutionary application prospects in many scientific research fields, especially in the design and discovery of new materials, quantum computing provides an unprecedented computing power and efficiency.By constructing an efficient quantum algorithm, this study successfully simulates the quantum behavior of complex materials, which provides a new way to understand the intrinsic properties of materials and accelerate the design of new materials. The research team has focused on overcoming the key technical problems of quantum computing in dealing with large-scale material database search, material property prediction, and exploration of the synthesis path of new materials, which has significantly improved the efficiency and accuracy of new material discovery.</p>
                </article>
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
        addSectorToCorner('.outputsBox', '右上', '80');
    </script>
</html>