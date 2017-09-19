<form action='/account/modifyExecute' method='post' name='modify_form' class='modify_form'>
    <input type="hidden" value="<?= $this->escape($_token)?>" name="_token">
    <div class='mode_title_wrap'>
        <p class='mode_title'>회원정보 확인 및 수정</p>
    </div>
    <div id='modify_id'>
        * 아이디 :
        <?php print $user['id']?>
    </div><hr>
    <div id='modify_pass'>
        * 현재 비밀번호 :
        <input type='password' name='pass'>
    </div><hr>
    <div id='modify_change_pass'>
        * 변경 비밀번호 :
        <input type='password' name='change_pass'>
    </div><hr>
    <div id='modify_change_pass_confirm'>
        * 비밀번호 확인 :
        <input type='password' name='change_pass_confirm'>
    </div><hr>
    <div id='modify_name'>
        * 이름 :
        <input type='text' name='change_name' value='<?php print $user['member_name']?>'>
    </div><hr>
    <div id='modify_gender'>
        * 성별 :
        <input type='radio' name='change_gender' value='male'> 남
        <input type='radio' name='change_gender' value='female'> 여
    </div><hr>
    <div id='modify_address'>
        * 주소 :
        <input type='text' name='change_address' value='<?php print $user['address']?>'>
    </div><hr>
    <div id='modify_phone'>
        * 전화번호 :
        <input type='text' value='010' name='change_phone1'> -
        <input type='text' name='change_phone2'> -
        <input type='text' name='change_phone3'>
    </div><hr>
    <div id='modify_email'>
        * 메일 :
        <input type='text' name='change_email1'> @
        <select name='change_email2'>
            <option value='naver.com'>네이버</option>
            <option value='gmail.com'>구글</option>
            <option value='daum.net'>다음</option>
        </select>
    </div><hr>
    <div class='button_wrap'>
        <input type='button' value='확인' onclick='modify_check_input()'>
        <input type='button' value='취소' onclick='window.close()'>
    </div>
</form>
