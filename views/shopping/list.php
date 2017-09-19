<div class="menu_lank_wrap">
    <div class="menu_title_wrap">
        <span class="menu_title_wrap">RANKING</span>
        <span class="additional_menu_title">스토어랭킹</span>
    </div>
    <div class="menu_lank_product_wrap">
        <ul class="menu_product_ul">
            <?php
            for($iCount = 0; $iCount < 7; $iCount++) {
            ?>
                <li class="menu_lank_product">
                    <div class="menu_lank_product_img">
                        <div class="best_wrap">BEST<?php echo $iCount+1?></div>
                        <a href="/item?pno=<?php echo $rankProduct[$iCount]['no']?>"><img src="<?php echo $rankProduct[$iCount]['img_path'].$rankProduct[$iCount]['img_name']?>"></a>
                    </div>
                    <div class="menu_lank_product_info">
                        <a href="/item?pno=<?php echo $rankProduct[$iCount]['no']?>">
                            <span><?php echo $rankProduct[$iCount]['product_name']?></span><br>
                            <span><?php echo $rankProduct[$iCount]['price']?>원</span>
                        </a>
                    </div>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>
<div class="menu_list_wrap">
    <div class="menu_title_wrap">
        <span class="menu_title_wrap">PRODUCT LIST</span>
        <span class="additional_menu_title">심플리스트</span>
    </div>
    <div class="menu_list_product_wrap">
        <?php
        $productIndex = 0;
        for($oCount = 0; $oCount < 2; $oCount++) {
        ?>
            <ul class="menu_product_ul">
            <?php
            for ($iCount = 0; $iCount < 7; $iCount++) {
                if(!isset($normalProduct[$productIndex]['no'])) {
            ?>
                    <li class="menu_product_unexists">
                        <img src="./images/read.png">
                    </li>
                <?php
                } else {
                ?>
                    <li class="menu_lank_product">
                        <div class="menu_normal_product_img">
                            <a href="/item?pno=<?php echo $normalProduct[$productIndex]['no']?>"><img src="<?php echo $normalProduct[$productIndex]['img_path'].$normalProduct[$productIndex]['img_name']?>"></a>
                        </div>
                        <div class="menu_normal_product_info">
                            <a href="/item?pno=<?php echo $normalProduct[$productIndex]['no']?>">
                                <span><?php echo $normalProduct[$productIndex]['product_name']?></span><br>
                                <span><?php echo $normalProduct[$productIndex]['price']?>원</span>
                            </a>
                        </div>
                    </li>
            <?php
                }
                $productIndex++;
            }
            ?>
            </ul><br>
        <?php
        }
        ?>
        </div>
    </div>
</div>