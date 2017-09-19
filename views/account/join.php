<form action="/account/joinExecute" method="post" name="join_form" id="join_form">
    <input type="hidden" value="<?= $this->escape($_token)?>" name="_token">
    <div class="mode_title_wrap">
        <p class="mode_title">회원가입</p>
        <p class="mode_process">정보입력 > 가입완료</p><hr>
    </div>
    <div id="join_id">
        * 아이디 :
        <input type="text" name="id">
    </div><hr>
    <div id="join_pass">
        * 비밀번호 :
        <input type="password" name="pass">
    </div><hr>
    <div id="join_pass_confirm">
        * 비밀번호 확인 :
        <input type="password" name="pass_confirm">
        <input type="button" value="확인" onclick="passConfirm_check()">
    </div><hr>
    <div id="join_name">
        * 이름 :
        <input type="text" name="name">
    </div><hr>
    <div id="join_gender">
        * 성별 :
        <input type="radio" name="gender" value="male"> 남
        <input type="radio" name="gender" value="female"> 여
    </div><hr>
    <div id="join_address">
        * 주소 :
        <input type="text" name="address">
    </div><hr>
    <div id="join_phone">
        * 전화번호 :
        <input type="text" value="010" name="phone1"> -
        <input type="text" name="phone2"> -
        <input type="text" name="phone3">
    </div><hr>
    <div id="join_email">
        * 메일 :
        <input type="text" name="email1"> @
        <select name="email2">
            <option value="naver.com">네이버</option>
            <option value="gmail.com">구글</option>
            <option value="daum.net">다음</option>
        </select>
    </div><hr>
    <div id="join_info">
        - 아이디는 추후 변경하실 수 없습니다.<br>
        - 이메일과 휴대전화번호는 아이디/비밀번호 찾기에 이용되기 때문에 정확히 기입하세요.<br>
        - 주문관련안내 및 중요공지 등은 이메일과 SMS 동의여부와 관계없이 전송됩니다.<br>
    </div><hr>
    <div class="button_wrap">
        <input type="button" value="확인" onclick="check_input()">
        <input type="button" value="취소" onclick="window.close()">
    </div>
</form>

