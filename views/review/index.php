<div class='review_container'>
    <div class='menu_type_title_wrap'>
        <div class='menu_title'>REVIEW</div>
    </div>
    <article class='review_article'>
        <div class='review_insert_button_wrap'>
            <a href='/review/write'>글쓰기</a>
        </div>
        <table>
            <thead>
            <tr id='review_head'>
                <th class='review_no'>번호</th>
                <th class='review_title'>제목</th>
                <th class='review_writer'>작성자</th>
                <th class='review_date'>작성일</th>
                <th class='review_count'>조회</th>
            </tr>
            </thead>
            <tbody id='review_body'>
            <?php
            foreach ($review as $ReviewRow) {
            ?>
            <tr>
                <td class='review_no'><?php echo $ReviewRow['review_no']?></td>
                <td class='review_title'>
                    <a href='/review/view?no=<?php echo $ReviewRow['review_no']?>'>
                        <?php echo $ReviewRow['review_title']?>
                    </a>
                </td>
                <td class='review_writer'><?php echo $ReviewRow['review_writer'] ?></td>
                <td class='review_date'><?php echo $ReviewRow['review_date'] ?></td>
                <td class='review_count'><?php echo $ReviewRow['review_count'] ?></td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </article>
</div>