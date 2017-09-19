<form action='/account/productAddExecute' method='post' name='productAdd_form' class='modify_form' enctype='multipart/form-data'>
    <input type="hidden" value="<?= $this->escape($_token)?>" name="_token">
    <div class='product_wrap'>
        <div class='mode_title_wrap'>
            <p class='mode_title'>상품등록</p>
        </div>
        <div>
            상품명
            <span class='product_name_wrap'><input type='text' name='product_name'></span>
        </div><hr>
        <div>
            가격
            <span class='price_wrap'><input type='text' name='price'></span>
        </div><hr>
        <div>
            제품 타입
            <span class='product_type_wrap'>
                <select name='type'>
                    <option value='top'>상의</option>
                    <option value='outer'>아우터</option>
                    <option value='shoes'>신발</option>
                    <option value='eyewear'>안경</option>
                </select>
            </span>
        </div><hr>
        <div>
            사이즈
            <span class='product_size_wrap'>
                <select name='size' id='size'>
                   <option value='S'>의류-S</option>
                   <option value='M'>의류-M</option>
                   <option value='L'>의류-L</option>
                   <option value='XL'>의류-XL</option>
                   <option value='XXL'>의류-XXL</option>
                   <option value='220mm'>신발-230</option>
                   <option value='230mm'>신발-230</option>
                   <option value='240mm'>신발-240</option>
                   <option value='250mm'>신발-250</option>
                   <option value='260mm'>신발-260</option>
                   <option value='270mm'>신발-270</option>
                   <option value='280mm'>신발-280</option>
                   <option value='none'>안경-사이즈 무</option>
                </select>
            </span>
        </div><hr>
        <div>
            포인트 적립
            <span class='product_size_wrap'>
                <input type='text' name='product_point'>
            </span>
        </div><hr>
    </div>
    <div class='product_img_wrap'>
        이미지 업로드
        <span class='product_img_upload_wrap'>
            <input type='file' name='upload_file[]' multiple>
        </span>
    </div><hr>
    <div class='button_wrap'>
        <input type='button' value='확인' onclick='product_add_check_value()'>
        <input type='button' value='취소' onclick='window.close()'>
    </div>
</form>
