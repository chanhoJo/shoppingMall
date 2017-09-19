<div class="buyList_wrap">
    <p class="mode_title">구매내역</p><hr>
    <table class="buyList_table_wrap">
        <thead>
        <tr>
            <th class="buy_no">번호</th>
            <th class="buy_img">이미지</th>
            <th class="buy_product">상품</th>
            <th class="buy_price">가격</th>
            <th class="buy_count">수량</th>
            <th class="buy_size">사이즈</th>
            <th class="buy_address">주소</th>
            <th class="buy_phone">연락처</th>
            <th class="buy_memo">메모</th>
            <th class="buy_date">구매일</th>
        </tr>
        </thead>
        <tbody>
            <?php
            foreach ($buyList as $buyListRow) {
            ?>
                <tr>
                    <td class="buy_no"><?php echo $buyListRow['buy_no']?></td>
                    <td class="buy_img"><img src="<?php echo $buyListRow['buy_product_img']?>"></td>
                    <td class="buy_product"><?php echo $buyListRow['buy_product_name']?></td>
                    <td class="buy_price"><?php echo $buyListRow['buy_price']?></td>
                    <td class="buy_count"><?php echo $buyListRow['buy_amount']?></td>
                    <td class="buy_size"><?php echo $buyListRow['buy_size']?></td>
                    <td class="buy_address"><?php echo $buyListRow['buyer_address']?></td>
                    <td class="buy_phone"><?php echo $buyListRow['buyer_phone']?></td>
                    <td class="buy_memo"><?php echo $buyListRow['memo']?></td>
                    <td class="buy_date"><?php echo $buyListRow['buy_date']?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>