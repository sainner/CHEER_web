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
            <section class="content" id="about_us">
                <div id="info">
                    <h1 class="deco fadein">CHEER <span class="light">Lab</span></h1>
                    <p class="time fadein">Climate-resilent Healthy Energy- Efficient Research Lab</p>
                    <p class="split fadein">位于科技前沿的未来实验室，致力于推动人工智能、量子计算与生物科技等领域的革新。我们的团队汇集了来自全球的顶尖科学家与工程师，他们在各自的研究领域拥有深厚的专业知识和丰富的实践经验。实验室配备了先进的研究设施与世界级的实验平台，为科研人员提供了一个无与伦比的创新环境。</p>
                    <p class="fadein">我们致力 于解决当今世界面临的重大挑战，通过科技创新为社会发展贡献力量。实验室的研究成果已广泛应用于医疗健康、环境保护、智慧城市建设等多个领域，为推动人类进步与可持续发展作出了重要贡献。未来实验室欢迎志同道合的伙伴加入，共同开启探索未知、创造未来的壮丽征程。</p>
                    <p class="contact split fadein"><img src="../images/icon/contactIcon_phone.svg" alt="phone icon" class="contactIcon">18621098930</p>
                    <p class="contact fadein"><img src="../images/icon/contactIcon_email.svg" alt="email icon" class="contactIcon">sainner@sjtu.edu.cn</p>
                    <p class="contact fadein"><img src="../images/icon/contactIcon_location.svg" alt="address icon" class="contactIcon">上海交通大学闵行校区设计学院402室</p>
                    <p class="contact split fadein">
                        <img src="../images/icon/contactIcon_wechat.svg" alt="wechat icon" class="contactIcon" onclick="window.open('https://weixin.qq.com/')">
                        <img src="../images/icon/contactIcon_weibo.svg" alt="weibo icon" class="contactIcon" onclick="window.open('https://m.weibo.cn/')">
                        <img src="../images/icon/contactIcon_bilibili.svg" alt="bilibili icon" class="contactIcon" onclick="window.open('https://www.bilibili.com/')"> 
                    </p>
                </div>
                <div id="groupPhoto">
                    <img src="../images/icon/mask_groupPhoto.svg" alt="groupphoto" id="mask">
                </div>
            </section>
            <div id="modelContainer"></div>
        </div>
    </body>
    <?php
    $footer_position = 'footer_left';
    include_once '../includes/templates/footer.php';
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="https://unpkg.com/three@0.125.2/build/three.min.js"></script>
    <script src="https://unpkg.com/three@0.125.2/examples/js/loaders/GLTFLoader.js"></script>
    <script src="../script/general.js"></script>
    <script src="../script/modelController.js"></script>
    <script>
        addSectorToCorner('.deco', '左上', '80');
        document.addEventListener('DOMContentLoaded', perspective('groupPhoto','mask'));
    </script>
</html>