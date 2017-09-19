<?php

class ShoppingController extends Controller{
    const PURCHASE = "";

    public function indexAction() {
        $selectType= $this->_request->getGet('type');

        switch ($selectType) {
            case null:
            case 1:
                $productType = "top";
                break;
            case 2:
                $productType = "outer";
                break;
            case 3:
                $productType = "shoes";
                break;
            case 4:
                $productType = "eyewear";
                break;
        }
        $rankProductRecord = $this->_connect_model->get('Product')->getAllProductAndImageRecord("list", "rank", $productType);
        $rankReviewRecord = $this->_connect_model->get('Review')->getAllReviewRecord("rank");

        $index_view = $this->render(array(
            'rankProduct' => $rankProductRecord, //상품 목록(구매순)
            'rankReview' => $rankReviewRecord
        ), null, "template");

        return $index_view;
    }

    public function listAction($params){
        // 상품 목록 정보를 model에 요청하여 가져옴
        $selectType= $this->_request->getGet('type');

        switch ($selectType) {
            case 1:
                $productType = "top";
                break;
            case 2:
                $productType = "outer";
                break;
            case 3:
                $productType = "shoes";
                break;
            case 4:
                $productType = "eyewear";
                break;
        }
        $rankProductRecord = $this->_connect_model->get('Product')->getAllProductAndImageRecord("list", "rank", $productType);
        $normalProductRecord = $this->_connect_model->get('Product')->getAllProductAndImageRecord("list", "normal", $productType);

        $list_view = $this->render(array(
            'rankProduct' => $rankProductRecord, //상품 목록(구매순)
            'normalProduct' => $normalProductRecord, //상품 목록(번호순)
        ), null, "template");

        return $list_view;
    }

    public function itemAction() {
        $itemNo = $this->_request->getGet('pno');
        $this->_connect_model->get('Product')->modifyProductRecord($itemNo, "click_count");
        $itemRecord = $this->_connect_model->get('Product')->getProductAndImageRecord($itemNo);
        $item_view = $this->render(array(
            'product' => $itemRecord,
            'itemNo' => $itemNo
        ), null, "template");
        return $item_view;
    }

    public function buyItemAction() {

        if($this->_session->isAuthenticated() == true) {

            $itemNo = $this->_request->getPost('product_no');
            $itemCount = $this->_request->getPost('product_count');
            $itemSize = $this->_request->getPost('product_size');

            $itemRecord = $this->_connect_model->get('Product')->getProductAndImageRecord($itemNo);

            $buyer = $this->_session->get('user')['id'];
            $buyerRecord = $this->_connect_model->get('Member')->getMemberRecord($buyer);

            $buyItem_view = $this->render(array(
                'item' => $itemRecord,
                'itemCount' => $itemCount,
                'itemSize' => $itemSize,
                'itemNo' => $itemNo,
                'buyer' => $buyerRecord,
                '_token' => $this->getToken(self::PURCHASE)
            ), null, "template");
            return $buyItem_view;
        } else {
            $this->redirect('/alert/11');
        }
    }

    public function purchaseAction() {
        $token = $this->_request->getPost('_token');
        if(!$this->checkToken(self::PURCHASE, $token)) {
            return $this->redirect('/'.self::PURCHASE);
        }

        if($this->_session->isAuthenticated() == true) {
            $buyProductName = $this->_request->getPost('buy_product_name');
            $buySize = $this->_request->getPost('buy_product_option');
            $buyAmount = $this->_request->getPost('buy_product_amount');
            $buyPrice = $this->_request->getPost('buy_product_price');
            $buyPoint = $this->_request->getPost('buy_product_point');
            $buyProductImg = $this->_request->getPost('buy_product_img');
            $buyer = $this->_request->getPost('buyer');
            $buyerPhone = $this->_request->getPost('recipient_phone');
            $buyerAddress = $this->_request->getPost('recipient_address');
            $memo = $this->_request->getPost('memo');

            $itemNo = $this->_request->getPost('buy_product_no');
            $this->_connect_model->get('Product')->modifyProductRecord($itemNo, "buy_count", $buyAmount);
            $this->_connect_model->get('Member')->modifyMemberPointRecord($buyer, $buyPoint);
            $this->_connect_model->get('BuyList')->insertBuyListRecord(
                $buyProductName,
                $buyPrice,
                $buyAmount,
                $buySize,
                $buyerAddress,
                $buyerPhone,
                $buyer,
                $memo,
                $buyProductImg
            );

            $this->redirect('/alert/15');
        } else {
            $this->redirect('/alert/11');
        }
    }

    public function alertAction($param) {
        $message = $param['message'];
        $script1 = null;
        $script2 = null;
        $script3 = null;

        switch ($message) {
            //login 오류 메시지
            case 1:
                $script1 = "window.alert('아이디가 틀렸습니다.')";
                $script2 = "location.replace('/account/login')";
                break;
            //logout 오류 메시지
            case 2:
                $script1 = "window.alert('비밀번호가 틀렸습니다.')";
                $script2 = "location.replace('/account/login')";
                break;
            case 3:
                $script1 = "window.parent.opener.location.reload()";
                $script2 = "window.close()";
                break;
            case 4:
                $script1 = "window.alert('회원가입 되었습니다.')";
                $script2 = "window.close()";
                break;
            case 5:
                $script1 = "window.alert('로그아웃 되었습니다.')";
                $script2 = "location.replace('/')";
                break;
            case 6:
                $script1 = "window.alert('잘못된 접근입니다.')";
                $script2 = "location.replace('/')";
                break;
            case 7:
                $script1 = "window.alert('회원이 탈퇴되었습니다.')";
                $script2 = "window.parent.opener.location.reload()";
                $script3 = "window.close()";
                break;
            case 8:
                $script1 = "window.alert('비밀번호를 확인해주세요.')";
                $script2 = "location.replace('/account/myPage/delete')";
                break;
            case 9:
                $script1 = "window.alert('회원정보가 수정되었습니다\\n다시 로그인해주세요.')";
                $script2 = "window.parent.opener.location.reload()";
                $script3 = "window.close()";
                break;
            case 10:
                $script1 = "window.alert('비밀번호를 확인해주세요.')";
                $script2 = "location.replace('/account/myPage/modify')";
                break;
            case 11:
                $script1 = "window.alert('로그인을 해주세요.')";
                $script2 = "window.open(
                            '/account/login',
                            '로그인',
                            'width=1200, height=610, scrollbars=no, resizeable=no'
                        )";
                break;
            case 12:
                $script1 = "window.alert('상품 등록이 완료되었습니다.')";
                $script2 = "window.close()";
                break;
            case 13:
                $script1 = "window.alert('사이즈 입력이 잘못되었습니다.')";
                $script2 = "location.replace('/account/myPage/productAdd')";
                break;
            case 14:
                $script1 = "window.alert('후기 작성이 완료되었습니다.')";
                $script2 = "location.replace('/review')";
                break;
            case 15:
                $script1 = "window.alert('결재 감사합니다.')";
                $script2 = "location.replace('/')";
                break;
        }

        $alert_view = $this->render(array(
            'script1' => $script1,
            'script2' => $script2,
            'script3' => $script3
        ), null, "alertTemplate");

        return $alert_view;
    }
}

?>