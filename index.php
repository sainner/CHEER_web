    <?php 
    require "includes/config.php";
    $current_page = basename($_SERVER['PHP_SELF']);
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
                <div class="news fadein" id="news_01">
                    <div class="img"><a href=""><img src="./images/banner_1.jpg"/></a></div>
                    <div class="text">
                        <a href="" class="text_hover nextPageLink" ><h2>
                            2023-2024学年<br/>
                            秋季学期工作室第一次全体学术研讨会
                        </h2></a>
                        <h3 class="time optional">2023/10/16</h3>
                        <p class="optional">
                            舳舻千里，旌旗蔽空，酾酒临江，横槊赋诗……<br/>
                            在古代，水上航运是常用的交通方式。<br/>
                            时光划过千百年，打通“黄金水道”复兴水上交通，成为时代的新命题。
                        </p>
                    </div>
                </div>
                <div class="news fadein active" id="news_02">
                    <div class="img"><a href=""><img src="./images/banner_2.jpg"/></a></div>
                    <div class="text">
                        <a href="" class="text_hover nextPageLink" ><h2>
                            实验室组织参加<br/>
                            第18届国际建筑性能模拟大会（BS2023）
                        </h2></a>
                        <h3 class="time optional">2023/10/16</h3>
                        <p class="optional">
                            舳舻千里，旌旗蔽空，酾酒临江，横槊赋诗……<br/>
                            在古代，水上航运是常用的交通方式。<br/>
                            时光划过千百年，打通“黄金水道”复兴水上交通，成为时代的新命题。
                        </p>
                    </div>
                </div>
                <div class="news fadein" id="news_03">
                    <div class="img"><a href=""><img src="./images/banner_3.jpg"/></a></div>
                    <div class="text">
                        <a href="" class="text_hover nextPageLink" ><h2>
                            实验室23级研究生<br/>
                            正式开学报道
                        </h2></a>
                        <h3 class="time optional">2023/10/16</h3>
                        <p class="optional">
                            舳舻千里，旌旗蔽空，酾酒临江，横槊赋诗……<br/>
                            在古代，水上航运是常用的交通方式。<br/>
                            时光划过千百年，打通“黄金水道”复兴水上交通，成为时代的新命题。
                        </p>
                    </div>
                </div>
                <div class="news fadein" id="news_04">
                    <div class="img"><a href=""><img src="./images/banner_4.jpg"/></a></div>
                    <div class="text">
                        <a href="" class="text_hover nextPageLink" ><h2>
                            胡啸<br/>
                            通过博士学位论文答辩
                        </h2></a>
                        <h3 class="time optional">2023/10/16</h3>
                        <p class="optional">
                            舳舻千里，旌旗蔽空，酾酒临江，横槊赋诗……<br/>
                            在古代，水上航运是常用的交通方式。<br/>
                            时光划过千百年，打通“黄金水道”复兴水上交通，成为时代的新命题。
                        </p>
                    </div>
                </div>
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