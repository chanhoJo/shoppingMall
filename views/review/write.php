<div class='review_select_container'>
    <div class='menu_type_title_wrap'>
        <div class='menu_title'>REVIEW WRITE</div>
    </div>
    <div>
        <form action='/review/writeExecute' method='post' enctype='multipart/form-data'>
            <input type="hidden" value="<?= $this->escape($_token)?>" name="_token">
            <div class='write_review_wrap'>
                <div class='write_review_title'>
                    <span>
                        제목
                    </span>
                    <span>
                        <input type='text' name='title'>
                    </span>
                </div><hr>
                <div class='write_review_writer'>
                    <span>
                        작성자
                    </span>
                    <span>
                        <?php echo $user;?>
                        <input type='hidden' name='writer' value='<?php echo $user;?>'>
                    </span>
                </div><hr>
                <div class='write_review_uploadFile'>
                    <span>
                        <input type='file' name='upload_file[]' multiple>
                    </span>
                </div><hr>
                <div class='write_review_content'>
                    <div class='write_review_content_title'>내용</div>
                    <span>
                        <textarea name='content' id='' cols='30' rows='10'></textarea>
                    </span>
                </div>
                <div class='write_review_button'>
                    <input type='submit' value='작성'>
                </div>
            </div>
        </form>
    </div>
</div>