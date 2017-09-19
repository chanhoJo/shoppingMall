<div id="index_contents">
    <div id="rank_product">
        <div id="rank_product_title">
            BEST Product
            <div>
                <a href="<?php print $base_url; ?>?type=1">상의</a>
                <a href="<?php print $base_url; ?>?type=2">아우터</a>
                <a href="<?php print $base_url; ?>?type=3">신발</a>
                <a href="<?php print $base_url; ?>?type=4">악세사리</a>
            </div>
        </div>
        <div id="rank_product_content">
            <ul class="rank_product_ul">
                <li id="rank_product_wrap_1">No. 1
                    <div id="rank_product_img1">
                        <a href="/item?pno=<?php echo $rankProduct[0]['no']?>"><img src="<?php echo $rankProduct[0]['img_path'].$rankProduct[0]['img_name']?>"></a>
                    </div>
                    <div class="rank_product_info">
                        <a href="/item?pno=<?php echo $rankProduct[0]['no']?>">
                            <span><?php echo $rankProduct[0]['product_name']?></span><br>
                            <span><?php echo $rankProduct[0]['price']?>원</span>
                        </a>
                    </div>
                </li>
            </ul>
            <?php
                for($iCount = 0; $iCount < 3; $iCount++) {
                    $number1 = $iCount + 2;
                    $number2 = $number1 + 3;
            ?>
                <ul class='rank_product_ul'>
                    <li class='rank_product_wrap'>No.<?php echo $number1?>
                        <div class='rank_product_img'>
                            <a href='/item?pno=<?php echo $rankProduct[$iCount+1]['no']?>'><img src="<?php echo $rankProduct[$iCount+1]['img_path'].$rankProduct[$iCount+1]['img_name']?>"></a>
                        </div>
                        <div class='rank_product_info'>
                            <a href='/item?pno=<?php echo $rankProduct[$iCount+1]['no']?>'>
                                <span><?php echo $rankProduct[$iCount+1]['product_name']?></span><br>
                                <span><?php echo $rankProduct[$iCount+1]['price']?>원</span>
                            </a>
                        </div>
                    </li>
                    <li class='rank_product_wrap'>No.<?php echo $number2?>
                        <div class='rank_product_img'>
                            <a href='/item?pno=<?php echo $rankProduct[$iCount+4]['no']?>'><img src="<?php echo $rankProduct[$iCount+4]['img_path'].$rankProduct[$iCount+4]['img_name']?>"></a>
                        </div>
                        <div class='rank_product_info'>
                            <a href='/item?pno=<?php echo $rankProduct[$iCount+4]['no']?>'>
                                <span><?php echo $rankProduct[$iCount+4]['product_name']?></span><br>
                                <span><?php echo $rankProduct[$iCount+4]['price']?>원</span>
                            </a>
                        </div>
                    </li>
                </ul>
            <?php
                }
            ?>
        </div>
    </div>
    <div id="index_review">
        <div id="index_review_title">
            BEST Review
            <a href="./view/list.php?no=5">전체보기</a>
        </div>
        <div id="index_review_contents">
            <ul>
                <?php
                    for($iCount = 0; $iCount < 6;$iCount++) {
                        if (isset($rankReview[$iCount]['review_no'])) {
                            ?>
                            <li class='index_review'>
                                <div class='index_reviewInfo'>
                                    <a href='/review/view?no=<?php echo $rankReview[$iCount]['review_no']?>'>
                                    <div>제목 : <?php echo $rankReview[$iCount]['review_title']?></div>
                                    <hr>
                                    <div>작성자 : <?php echo $rankReview[$iCount]['review_writer']?></div>
                                    <hr>
                                    <div>조회수 : <?php echo $rankReview[$iCount]['review_count']?></div>
                                    <hr>
                                    </a>
                                </div>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li class='index_review'>
                                <div class='index_reviewInfo'>
                                    <a>
                                        등록된 상품<br>
                                        후기가 없습니다.<br>
                                    </a>
                                </div>
                            </li>
                            <?php
                        }
                    }
                ?>
            </ul>
        </div>
    </div>
</div>