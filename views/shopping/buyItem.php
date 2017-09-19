<div class="container">
    <div class="menu_type_title_wrap">
        <div class="menu_title">ORDER / PAYMENT</div>
    </div>
    <div class="buy_product_info_wrap">
        <div>
            <span class="menu_title_wrap">PRODUCT INFO</span>
            <span class="additional_menu_title">상품정보</span>
        </div>
        <div class="buy_product_info_table_wrap">
            <table>
                <thead>
                <tr>
                    <th class="buy_product_info">상품 정보</th>
                    <th class="buy_product_amount">수량</th>
                    <th class="buy_product_price">상품 금액</th>
                    <th class="buy_product_point">적립금</th>
                    <th class="buy_product_deliveryPrice">배송비</th>
                    <th class="buy_product_all_price">주문금액</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="buy_product_info">
                        <img src="<?php echo $item['img_path'].$item['img_name']?>">
                        <div class="buy_product_option_wrap">
                            <div class="buy_product_name"><?php echo $item['product_name'] ?></div>
                            <div class="buy_product_option">옵션 : <?php echo $itemSize ?></div>
                        </div>
                    </td>
                    <td class="buy_product_amount"><?php echo $itemCount ?></td>
                    <td class="buy_product_price"><?php echo $item['price'] ?>원</td>
                    <td class="buy_product_point"><?php echo $item['price']*($item['point']/100) ?></td>
                    <td class="buy_product_deliveryPrice">무료</td>
                    <td class="buy_product_all_price"><?php echo $item['price']*$itemCount ?>원</td>
                </tr>
                </tbody>
            </table>
            <div class="buy_info_wrap">
                <div>구매 가능 수량이 1개로 제한된 상품은 주문 취소 시, 24간 내 가상계좌 재주문이 불가합니다.</div>
                <div>호야샵은 기본적으로 대한민국 내 제주도 및 도서 산간 지역 포함 <span>전 지역, 전 상품 무료배송입니다.</span></div>
                <div>해외 배송 상품이나 일부 업체의 경우, 교환/환불 시 반송료가 다를 수 있으며 상품 페이지에 별도 표기되어 있습니다.</div>
            </div>
        </div>
    </div>
    <div class="buy_product_info_wrap">
        <div>
            <span class="menu_title_wrap">RECIPIENT  INFO</span>
            <span class="additional_menu_title">수령자 정보</span>
        </div>
        <form action="/purchase" method="post" name="buy_form" class="buy_form">
            <input type="hidden" value="<?= $this->escape($_token)?>" name="_token">
            <input type="hidden" name="buy_product_no" value="<?php echo $item['no'] ?>">
            <input type="hidden" name="buy_product_name" value="<?php echo $item['product_name'] ?>">
            <input type="hidden" name="buy_product_option" value="<?php echo $itemSize ?>">
            <input type="hidden" name="buy_product_amount" value="<?php echo $itemCount ?>">
            <input type="hidden" name="buy_product_price" value="<?php echo $item['price']*$itemCount ?>">
            <input type="hidden" name="buy_product_point" value="<?php echo $item['price']*($item['point']/100) ?>">
            <input type="hidden" name="buyer" value="<?php echo $buyer['id']?>">
            <input type="hidden" name="buy_product_img" value="<?php echo $item['img_path'].$item['img_name']?>">
            <div class="recipient_input_wrap">
                <ul>
                    <li class="buyer_wrap">
                        <span>구매자</span>
                        <span><?php echo $buyer['member_name']?></span>
                    </li>
                </ul>
                <ul>
                    <li class="recipient_phone_wrap">
                        <span>휴대전화</span>
                        <span>
                            <input type="text" name="recipient_phone" value="<?php echo $buyer['phone']?>">
                        </span>
                    </li>
                </ul>
                <ul>
                    <li class="recipient_address_wrap">
                        <span>배송지 주소</span>
                        <span>
                            <input type="text" name="recipient_address" value="<?php echo $buyer['address']?>">
                        </span>
                    </li>
                </ul>
                <ul>
                    <li class="memo_wrap">
                        <div>배송 메모</div>
                        <textarea name="memo"></textarea>
                    </li>
                </ul>
            </div>
            <div class="buy_button">
                <a onclick="clickPayment()">PAYMENT</a>
            </div>
        </form>
    </div>
</div>