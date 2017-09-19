<div id="product_info_container">
    <span class="product_name"><?php echo $product['product_name']?></span>
    <div class="previous_wrap">
        <a onclick="clickPrevious()">이전페이지</a>
    </div>
    <div class="type_wrap">제품분류 :
        <span><?php echo $product['type']?></span>
    </div>
    <div class="product_img_wrap">
        <img src="<?php echo $product['img_path'].$product['img_name']?>">
    </div>
    <div class="info_wrap">
        <div class="product_info_wrap">
            <span class="product_info_wrap_title">PRODUCT INFO</span>
            <span class="product_info_wrap_title_K">제품정보</span>
            <ul>
                <li>
                    시즌&nbsp;&nbsp;&nbsp;
                    <span>2016/ALL</span>
                </li>
                <li>
                    인기도&nbsp;&nbsp;&nbsp;
                    <span><?php echo $product['buy_count']?></span> (구매수) /
                    <span><?php echo $product['click_count']?></span> (조회수)
                </li>
            </ul>
        </div>
        <div class="product_delivery_info_wrap">
            <span class="product_info_wrap_title">DELIVERY INFO</span>
            <span class="product_info_wrap_title_K">배송정보</span>
            <ul>
                <li>
                    배송방법&nbsp;&nbsp;&nbsp;
                    <span>우체국 택배</span>
                </li>
                <li>
                    평균 배송일&nbsp;&nbsp;&nbsp;
                    <span>1일</span>
                </li>
            </ul>
        </div>
        <div class="product_price_info_wrap">
            <span class="product_info_wrap_title">PRICE INFO</span>
            <span class="product_info_wrap_title_K">가격정보</span>
            <ul>
                <li>
                    판매가&nbsp;&nbsp;&nbsp;
                    <span><?php echo $product['price']?></span>원
                </li>
                <li>
                    적립&nbsp;&nbsp;&nbsp;
                    <span><?php echo $product['point']?></span>%
                </li>
                <li>부가설명</li>
            </ul>
        </div>
        <div class="product_option_wrap">
            <form action="/buyItem" method="post" id="product_cart_or_buy_form">
                <input type="hidden" name="product_no" value="<?php echo $product['no']?>">
                <span class="product_info_wrap_title">SELECT OPTION</span>
                <span class="product_info_wrap_title_K">옵션선택</span>
                <div class="product_option_box">
                    사이즈
                    <select name="product_size">
                        <?php
                        if($product['type'] == "top" or $product['type'] == "outer") {
                        ?>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                        <?php
                        } else if($product['type'] == "shoes") {
                        ?>
                            <option value="220mm">220</option>
                            <option value="230mm">230</option>
                            <option value="240mm">240</option>
                            <option value="250mm">250</option>
                            <option value="260mm">260</option>
                            <option value="270mm">270</option>
                            <option value="280mm">280</option>
                        <?php
                        } else if($product['type'] == "eyewear") {
                        ?>
                            <option value="none">none</option>
                        <?php
                        }
                        ?>
                    </select>
                    <div class="product_count_wrap">
                        수량
                        <input type="text" name="product_count" value="1">
                    </div>
                </div>
                <div class="product_buy_button_wrap">
                    <input type="submit" value="바로 구매">
                </div>
            </form>
        </div>
    </div>
    <div class="product_additional_img">
        <img src="<?php echo $product['img_path'].$product['img_name']?>">
    </div>
</div>