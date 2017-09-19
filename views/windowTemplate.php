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
    function click_login() {
        if(!document.login_form.id.value) {
            alert("아이디를 입력해주세요");
        } else if(!document.login_form.pass.value) {
            alert("비밀번호를 입력해주세요");
        } else {
            document.login_form.submit();
        }
    }

    function passConfirm_check() {

        if(!document.join_form.pass.value) {
            alert("비밀번호를 입력해주세요");
            document.join_form.pass.focus();

        } else if(!document.join_form.pass_confirm.value) {
            alert("비밀번호 확인을 입력해주세요");
            document.join_form.pass_confirm.focus();
        } else {
            if(document.join_form.pass.value != document.join_form.pass_confirm.value) {
                alert("비밀번호가 일치하지 않습니다");

            } else {
                alert("비밀번호가 일치합니다");
            }
        }


    }

    function check_input() {

        //id 체크
        if(!document.join_form.id.value) {
            alert("아이디를 입력해주세요");
            document.join_form.id.focus();
            return; //현재 if에 만족할 경우 바로 종료
        }

        //pass 체크
        if(!document.join_form.pass.value) {
            alert("비밀번호를 입력해주세요");
            document.join_form.pass.focus();
            return;
        }

        //pass_confirm 체크
        if(!document.join_form.pass_confirm.value) {
            alert("비밀번호 확인을 입력해주세요");
            document.join_form.pass_confirm.focus();
            return;
        }

        if(document.join_form.pass.value != document.join_form.pass_confirm.value) {
            alert("비밀번호가 일치하지 않습니다");
            document.join_form.pass.focus();
            return;
        }

        //name 체크
        if(!document.join_form.name.value) {
            alert("이름을 입력해주세요");
            document.join_form.name.focus();
            return;
        }

        //gender 체크
        if(!document.join_form.gender.value) {
            alert("성별을 체크해주세요");
            return;
        }

        //address 체크
        if(!document.join_form.address.value) {
            alert("주소를 입력해주세요");
            document.join_form.address.focus();
            return;
        }

        //phone 체크
        if(!document.join_form.phone2.value || !document.join_form.phone3.value) {
            alert("전화번호를 입력해주세요");

            if(!document.join_form.phone2.value) {
                document.join_form.phone2.focus();
            } else {
                document.join_form.phone3.focus();
            }
            return;
        }

        //email 체크
        if(!document.join_form.email1.value) {
            alert("메일를 입력해주세요");
            document.join_form.email1.focus();
            return;
        }

        //if에 걸리지 않을 시 확인
        document.join_form.submit();
    }


    function reset_value() {
        document.join_form.id.value = "";
        document.join_form.pass.value = "";
        document.join_form.pass_confirm.value = "";
        document.join_form.name.value = "";
        document.join_form.address.value = "";
        document.join_form.phone2.value = "";
        document.join_form.phone3.value = "";
        document.join_form.email1.value = "";
    }
</script>

