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
    <link rel="stylesheet" type="text/css" href="./css/window_open.css?var=<?= filemtime('/css/window_open.css') ?>" />
</head>
<body>
    <div id="header">
        <!-- Nav -->
        <div id="title">
            <div id="title_logo">

                HOYA SHOP
            </div>
        </div>
    </div>
    <div id="body">
        <div class="userInfo_wrapper">
            <div class="userStatus_box">
                <div class="userPhoto">
                    <img src="/images/member.gif" alt=""/>
                </div>
                <div class="userStatus">
                    <div class="statusBox">
                        <p>
                            <span class="user_name"><?php print $session->get("user")['member_name']?></span><span>님</span>
                            <a href="<?php print $base_url; ?>/account/myPage/modify">
                                <span class="brackets">회원정보변경</span>
                            </a>
                        </p>
                        <p class="row-2">
                            <span class="levelPoint parentheses">호야샵을 이용해주셔서 감사합니다</span>
                        </p>
                    </div>
                    <p class="notification">
                        현재 페이지에서는 회원탈퇴, 회원정보 수정, 구매내역 조회가 가능합니다.
                    </p>
                </div>
            </div>
            <div class="point_box">
                <div class="header">
                    <span class="point_title">포인트</span>
                </div>
                <span class="number"><?php print $session->get('user')['point'];?></span>
                <span class="unit">점</span>
            </div>
        </div>

        <div class="my_menu">
            <ul class="menu_title">
                <?php
                    if($session->get('user')['grade'] == "common") {
                ?>
                        <li class='menu_button'><a href="<?php print $base_url?>/account/myPage/modify">회원정보 확인 및 수정</a></li>
                        <li class='menu_button'><a href="<?php print $base_url?>/account/myPage/delete">회원탈퇴</a></li>
                        <li class='menu_button'><a href="<?php print $base_url?>/account/myPage/buyList">구매내역</a></li>
                <?php
                    } else if ($session->get('user')['grade'] == "admin") {
                ?>
                        <li class='menu_button'><a href="<?php print $base_url?>/account/myPage/modify">회원정보 확인 및 수정</a></li>
                        <li class='menu_button'><a href="<?php print $base_url?>/account/myPage/delete">회원탈퇴</a></li>
                        <li class='menu_button'><a href="<?php print $base_url?>/account/myPage/productAdd">상품등록</a></li>
                <?php
                    }
                ?>
            </ul>
        </div>
        <div class="contents">
            <?php print $_content; ?>
        </div>
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
    function delete_passConfirm_check() {

        if(!document.delete_form.pass.value) {
            alert("비밀번호를 입력해주세요");
            document.delete_form.pass.focus();

        } else if(!document.delete_form.pass_confirm.value) {
            alert("비밀번호 확인을 입력해주세요");
            document.delete_form.pass_confirm.focus();
        } else {
            if(document.delete_form.pass.value != document.delete_form.pass_confirm.value) {
                alert("비밀번호가 일치하지 않습니다");

            } else {
                document.delete_form.submit();
            }
        }
    }

    function modify_check_input() {
        //pass 체크
        if(!document.modify_form.pass.value) {
            alert("현재 비밀번호를 입력해주세요");
            document.modify_form.pass.focus();
            return;
        }

        //change_pass 체크
        if(!document.modify_form.change_pass.value) {
            alert("변경 비밀번호를 입력해주세요");
            document.modify_form.change_pass.focus();
            return;
        }

        //change_pass_confirm 체크
        if(!document.modify_form.change_pass_confirm.value) {
            alert("변경 비밀번호 확인을 입력해주세요");
            document.modify_form.change_pass_confirm.focus();
            return;
        }

        if(document.modify_form.change_pass.value != document.modify_form.change_pass_confirm.value) {
            alert("비밀번호가 일치하지 않습니다");
            document.modify_form.change_pass.focus();
            return;
        }

        //name 체크
        if(!document.modify_form.change_name.value) {
            alert("이름을 입력해주세요");
            document.modify_form.change_name.focus();
            return;
        }

        //gender 체크
        if(!document.modify_form.change_gender.value) {
            alert("성별을 체크해주세요");
            return;
        }

        //address 체크
        if(!document.modify_form.change_address.value) {
            alert("주소를 입력해주세요");
            document.modify_form.change_address.focus();
            return;
        }

        //phone 체크
        if(!document.modify_form.change_phone1.value || !document.modify_form.change_phone2.value || !document.modify_form.change_phone3.value) {
            alert("전화번호를 입력해주세요");

            if(!document.modify_form.change_phone1.value) {
                document.modify_form.change_phone1.focus();
            } else if(!document.modify_form.change_phone2.value) {
                document.modify_form.change_phone2.focus();
            } else if(!document.modify_form.change_phone3.value) {
                document.modify_form.change_phone3.focus();
            }
            return;
        }

        //email 체크
        if(!document.modify_form.change_email1.value) {
            alert("메일를 입력해주세요");
            document.modify_form.change_email1.focus();
            return;
        }

        //if에 걸리지 않을 시 확인
        document.modify_form.submit();
    }

    function product_add_check_value() {
        if(!document.productAdd_form.product_name.value) {
            alert("상품명을 입력해주세요");
            document.productAdd_form.product_name.focus();
            return;
        } else if(!document.productAdd_form.price.value) {
            alert("가격을 입력해주세요");
            document.productAdd_form.price.focus();
            return;

        } else if(!document.productAdd_form.product_point.value) {
            document.productAdd_form.product_point.focus();
            alert("포인트 적립을 입력해주세요");
            return;
        }
        document.productAdd_form.submit();
    }
</script>

