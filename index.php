    <?php 
    require "./includes/config.php";
    $conn = require_once './includes/database.php';
    $current_page = basename($_SERVER['PHP_SELF']);

    $sql = "SELECT *    
            FROM Banner
            JOIN Pictures ON Banner.banner_id = Pictures.banner_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $news = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    include_once './includes/templates/head.php';
    ?>
    <body>
        <div class="tranAniContatiner">
            <svg preserveAspectRatio="none" width="100%" height="100%">
            </svg>
        </div>
        <?php include_once './includes/templates/header.php';?>
        <div class="container">
            <?php include_once './includes/templates/sidebar.php';?>
            <section class="content" id="homepage">
                <?php 
                foreach ($news as $new):
                include './includes/templates/newsBox.php';
                endforeach;
                ?>
            </section>
        </div>
    </body>
    <?php
    $footer_position = 'footer_right';
    include_once './includes/templates/footer.php';
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="./script/general.js"></script>
    <script>
        //起始第二个新闻为active
        document.querySelectorAll('.news')[1].classList.add('active');
        //切换新闻内容
        document.addEventListener("DOMContentLoaded", (event) => {
            const divs = Array.from(document.getElementsByClassName('news'));
            const footerDiv = document.querySelector('footer div');
            divs.forEach(div => {
            div.addEventListener('click', function() {
            divs.forEach(d => d.classList.remove('active'));
            this.classList.add('active');
            });
        });
    });
    </script>
</html>