<header>
    <nav>
        <a href="<?= BASE_URL;?>index.php" class="LOGO nextPageLink"><div class="LOGO">
            <img id="logo" src="<?= BASE_URL;?>images/icon/LOGO.svg" alt="LOGO" />
            <p><span class="bold em">CHEER</span> <span class="light">Lab</span></p>
        </div></a>
        <ul>
            <li id="<?= ($current_page == 'about_us.php')? 'current' : '' ?>"><a href="<?= BASE_URL;?>pages/about_us.php" class="text_hover nextPageLink" >
                关于CHEER</a></li>
            <li id="<?= ($current_page == 'outputs.php')? 'current' : '' ?>" class="deployable sub2">
                <a href="<?= BASE_URL;?>pages/outputs.php" class="text_hover nextPageLink" >
                研究成果</a>
                <ul class="submenu">
                    <li><a href="<?= BASE_URL;?>pages/outputs.php?kind=0" class="text_hover nextPageLink">
                        论文成果</a></li>
                    <li><a href="<?= BASE_URL;?>pages/outputs.php?kind=1" class="text_hover nextPageLink">
                        实践成果</a></li>
                </ul>
            </li>
            <li id="<?= ($current_page == 'news.php')? 'current' : '' ?>"><a href="<?= BASE_URL;?>pages/news.php" class="text_hover nextPageLink" >
                最新动态</a></li>
            <li id="<?= ($current_page == 'members.php')? 'current' : '' ?>" class="deployable sub3"><a href="<?= BASE_URL;?>pages/members.php" class="text_hover nextPageLink" >
                团队成员</a>
                <ul class="submenu">
                    <li><a href="<?= BASE_URL;?>pages/members.php?position=0" class="text_hover nextPageLink">
                        在职教师</a></li>
                    <li><a href="<?= BASE_URL;?>pages/members.php?position=2" class="text_hover nextPageLink">
                        硕士研究生</a></li>
                    <li><a href="<?= BASE_URL;?>pages/members.php?position=3" class="text_hover nextPageLink">
                        博士研究生</a></li>
                    <li><a href="<?= BASE_URL;?>pages/members.php?position=4" class="text_hover nextPageLink">
                        博士后</a></li>
                </ul>
            </li>
            <li id="<?= ($current_page == 'enrollment.php')? 'current' : '' ?>"><a href="<?= BASE_URL;?>pages/enrollment.php" class="text_hover nextPageLink" >
                招生招聘</a></li>
            <li><a href="<?= BASE_URL;?>pages/user.php" class="'nextPageLink"><img src="<?= BASE_URL;?>images/icon/icon_user.svg" alt="user page"></a></li>
        </ul>
    </nav>
</header>