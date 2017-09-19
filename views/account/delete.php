<form action="<?php print $base_url; ?>/account/deleteExecute" method="post" name="delete_form" class="delete_form">
    <input type="hidden" value="<?= $this->escape($_token)?>" name="_token">
    <div class="delete_wrap">
        <div class="mode_title_wrap">
            <p class="mode_title">회원탈퇴</p>
        </div>
        <?php print $base_url; ?>
        <div>
            비밀번호
            <span class="pass_box"><input type="password" name="pass"></span>
        </div><hr>
        <div>
            비밀번호 확인
            <span class="pass_box"><input type="password" name="pass_confirm"></span>
        </div><hr>
        <div class="button_wrap">
            <input type="button" value="확인" onclick="delete_passConfirm_check()">
            <input type="button" value="취소" onclick="window.close()">
        </div>
    </div>
</form>