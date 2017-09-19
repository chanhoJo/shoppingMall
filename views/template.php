<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>홈페이지</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <!-- bootstrap 3.3.7버전은 jquery 1.9.1이상의 버전을 요구함. -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- DEVICON  -->
        <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/master/devicon.min.css">
        <!-- 직접정의한 css -->
        <!-- <link rel="stylesheet" href="./public/main.css"> -->
        <link rel="stylesheet" type="text/css" href="./css/main.css" />
    </head>
    <body>
        <div id="header">
            <div id="header_img"></div>
            <!-- Nav -->
            <div id="title">
                <div id="title_logo">
                    <a href="./">HOYA SHOP</a>
                </div>
                <div id="title_right">
                    <nav id="user_nav">
                        <?php
                            if(!$session->isAuthenticated()) {
                        ?>
                                <ul>
                                  <li><a onclick="loginOpen()">login</a></li>
                                  <li><a onclick="joinOpen()">join</a></li>
                                  <li><a onclick="loginOpen()">myPage</a></li>
                                  <li><a onclick="loginOpen()">buyList</a></li>
                                </ul>
                        <?php
                            } else {
                        ?>
                                <ul>
                                  <li><a onclick="myPageModifyOpen()" id="id_click"><?php print $session->get("user")['id']?></a></li>
                                  <li><a onclick="myPageModifyOpen()" id="myPage_click">myPage</a></li>
                                    <?php
                                        if($session->get('user')['grade'] == "common") {
                                            echo "<li><a onclick='myPageCartOpen()' id='cart_click'>buyList</a></li>";
                                        } else if($session->get('user')['grade'] == "admin") {
                                            echo "<li><a onclick='myPageProductAdd()' id='cart_click'>productAdd</a></li>";
                                        }
                                    ?>
                                  <li><a href="<?php print $base_url; ?>/account/logoutExecute">logout</a></li>
                                </ul>
                        <?php
                            }
                        ?>
                    </nav>
                    <nav id="menu_nav">
                        <ul>
                            <li><a href="<?php print $base_url; ?>/list?type=1">TOP</a></li>
                            <li><a href="<?php print $base_url; ?>/list?type=2">OUTER</a></li>
                            <li><a href="<?php print $base_url; ?>/list?type=3">SHOES</a></li>
                            <li><a href="<?php print $base_url; ?>/list?type=4">EYEWEAR</a></li>
                            <li><a href="<?php print $base_url; ?>/review">REVIEW</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div id="body">
            <?php print $_content; ?>
        </div>
        <div class="bottom">
            <div id="bottom_info">
                <span class="bRow1">100% AUTHENTIC<br></span>
                <span class="bRow2">호야샵에서 판매되는 모든 브랜드 제품은 정식제조, 정식수입원을 통해 유통되는 100% 정품임을 보증합니다.<br><br></span>
                주식회사 hoya | 대구광역시 북구 복현동 영진전문대 (복현동, 영진전문대 본관 2층) <br>
                제작자 : 조찬호 | 개인정보관리책임자 : 조찬호(yagato93@gmail.com)<br>
            </div>
            <div id="bottom_line">
                <div id="bottom_logo">HOYA SHOP</div>
            </div>
        </div>
    </body>
</html>





<script>
    function loginOpen() {
        window.open(
            "<?php print $base_url?>/account/login",
            "로그인",
            "width=1200, height=610, scrollbars=no, resizeable=no"
        );
    }

    function joinOpen() {
        window.open(
            "<?php print $base_url?>/account/join",
            "회원가입",
            "width=1200, height=700, scrollbars=no, resizeable=no"
        );
    }

    function myPageModifyOpen() {
        window.open(
            "<?php print $base_url; ?>/account/myPage/modify",
            "회원정보",
            "width=1200, height=700, scrollbars=no, resizeable=no"
        );
    }

    function myPageCartOpen() {
        window.open(
            "<?php print $base_url; ?>/account/myPage/buyList",
            "회원정보",
            "width=1200, height=700, scrollbars=no, resizeable=no"
        );
    }

    function myPageProductAdd() {
        window.open(
            "<?php print $base_url; ?>/account/myPage/productAdd",
            "회원정보",
            "width=1200, height=700, scrollbars=no, resizeable=no"
        );
    }

    function clickPrevious() {
        history.back();
    }

    function clickPayment() {
        document.buy_form.submit();
    }
</script>
