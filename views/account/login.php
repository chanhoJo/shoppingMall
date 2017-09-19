<form action='/account/loginExecute' method='post' name='login_form' id='login_form'>
    <input type="hidden" value="<?= $this->escape($_token)?>" name="_token">
    <div class='mode_title_wrap'>
        <p class='mode_title'>로그인</p>
        <p class='mode_process'></p><hr>
    </div>
    <div id='login_id'>
        아이디 :
        <input type='text' name='id'>
    </div><hr>
    <div id='login_pass'>
        비밀번호 :
        <input type='password' name='pass'>
    </div><hr>
    <div class='button_wrap'>
        <input type='button' value='로그인' onclick='click_login()'>
        <input type='button' value='취소' onclick='window.close()'>
    </div>
</form>

