<div class='review_select_container'>
    <div class='menu_type_title_wrap'>
        <div class='menu_title'>REVIEW
            <span id='review_num_span'>no.<?php echo $review['review_no']; ?></span>
        </div>
    </div>
    <div class='review_selectView_wrap'>
        <ul>
            <li class='review_select_title'>제목 : <?php echo $review['review_title']; ?></li>
            <li class='review_select_writer'>작성자 : <?php echo $review['review_writer']; ?></li>
        </ul>
        <ul>
            <li class='review_select_date'>일자 : <?php echo $review['review_date']; ?></li>
            <li class='review_select_count'>조회수 : <?php echo $review['review_count']; ?></li>
        </ul>
        <div class='review_select_contents'><?php echo $review['review_content']; ?></div>
        <div class='review_select_fileList_wrap'>
        <?php

            $files = explode('*', $review['review_file']);
            $fileExplodeCount = count($files) - 1;

            for($upload_count = 0; $upload_count < $fileExplodeCount; $upload_count++) {
                if (file_exists($files[$upload_count])) {
                    $file_name = explode('file/', $files[$upload_count]);
                    $real_filename = $file_name[1];
                    ?>
                    <a href="/review/fileDownload?file=<?= $real_filename?>"><?= $real_filename ?></a>
                <?php
                }
            }
            ?>
        </div>
    </div>
</div>