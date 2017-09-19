<?php

class AccountController extends Controller{
    const LOGIN = "account/login";
    const JOIN = "account/join";
    const MODIFY = "account/myPage/modify";
    const DELETE = "account/myPage/delete";
    const PRODUCTADD = "account/myPage/productAdd";


    public function loginAction(){
        $login_view = $this->render(array(
            '_token' => $this->getToken(self::LOGIN)
        ), null, "windowTemplate");
        return $login_view;
    }

    public function loginExecuteAction() {
        $token = $this->_request->getPost('_token');
        if(!$this->checkToken(self::LOGIN, $token)) {
            return $this->redirect('/'.self::LOGIN);
        }
        $loginId = $this->_request->getPost('id');
        $loginPass = $this->_request->getPost('pass');
        $userRecord = $this->_connect_model->get('Member')->getMemberRecord($loginId);

        if($userRecord == false) {
            $this->redirect('/alert/1');
        } else {
            if($loginPass == $userRecord['pass']) {
                $this->_session->set('user', $userRecord);
                $this->_session->setAuthenticateStatus(true);
                $this->redirect('/alert/3');
            } else {
                $this->redirect('/alert/2');
            }
        }

    }

    public function joinAction(){
        $join_view = $this->render(array(
            '_token' => $this->getToken(self::JOIN)
        ), null, "windowTemplate");
        return $join_view;
    }

    public function joinExecuteAction() {
        $token = $this->_request->getPost('_token');
        if(!$this->checkToken(self::JOIN, $token)) {
            return $this->redirect('/'.self::JOIN);
        }

        $id = $this->_request->getPost('id');
        $pass = $this->_request->getPost('pass');
        $name = $this->_request->getPost('name');
        $gender = $this->_request->getPost('gender');
        $address = $this->_request->getPost('address');
        $phone = $this->_request->getPost('phone1')."-".$this->_request->getPost('phone2')."-".$this->_request->getPost('phone3');
        $email = $this->_request->getPost('email1')."@".$this->_request->getPost('email2');

        $this->_connect_model->get('Member')->insertMemberRecord($id, $pass, $name, $address, $gender, $phone, $email);
        $this->redirect('/alert/4');
    }

    public function logoutExecuteAction() {
        if($this->_session->isAuthenticated() == true) {
            $this->_session->clear();
            $this->_session->setAuthenticateStatus(false);
            $this->redirect('/alert/5');
        } else {
            $this->redirect('/alert/6');
        }
    }

    protected function deleteAction() {
        $userId = $this->_session->get('user')['id'];
        $userRecord = $this->_connect_model->get('Member')->getMemberRecord($userId);
        $this->_session->setPoint($userRecord['point']);
        $delete_view = $this->render(array(
            '_token' => $this->getToken(self::DELETE)
        ), null, "myPageTemplate");
        return $delete_view;
    }

    protected function buyListAction() {
        $userId = $this->_session->get('user')['id'];
        $userGrade = $this->_session->get('user')['grade'];
        $userRecord = $this->_connect_model->get('Member')->getMemberRecord($userId);
        $buyListRecord = $this->_connect_model->get('BuyList')->getBuyListRecord($userId);
        $this->_session->setPoint($userRecord['point']);
        if($userGrade == "common") {
            $buyList_view = $this->render(array(
                'buyList' => $buyListRecord
            ), null, "myPageTemplate");
            return $buyList_view;
        } else {
            $this->redirect('/alert/6');
        }

    }
    protected function modifyAction() {
        $userId = $this->_session->get('user')['id'];
        $userRecord = $this->_connect_model->get('Member')->getMemberRecord($userId);
        $this->_session->setPoint($userRecord['point']);
        $modify_view = $this->render(array(
            'user' => $userRecord,
            '_token' => $this->getToken(self::MODIFY)
        ), null, "myPageTemplate");
        return $modify_view;
    }

    public function deleteExecuteAction() {
        $token = $this->_request->getPost('_token');
        if(!$this->checkToken(self::DELETE, $token)) {
            return $this->redirect('/'.self::DELETE);
        }

        $userId = $this->_session->get('user')['id'];
        $pass = $this->_request->getPost('pass');
        $userRecord = $this->_connect_model->get('Member')->getMemberRecord($userId);

        if($pass == $userRecord['pass']) {
            $this->_connect_model->get('Member')->deleteMemberRecord($userId);
            $this->_session->clear();
            $this->_session->setAuthenticateStatus(false);
            $this->redirect('/alert/7');
        } else {
            $this->redirect('/alert/8');
        }
    }

    public function modifyExecuteAction() {
        $token = $this->_request->getPost('_token');
        if(!$this->checkToken(self::MODIFY, $token)) {
            return $this->redirect('/'.self::MODIFY);
        }

        $userId = $this->_session->get('user')['id'];
        $pass = $this->_request->getPost('pass');
        $changePass = $this->_request->getPost('change_pass');
        $changePassConfirm = $this->_request->getPost('change_pass_confirm');
        $changeName = $this->_request->getPost('change_name');
        $changeGender = $this->_request->getPost('change_gender');
        $changeAddress = $this->_request->getPost('change_address');
        $changePhone = $this->_request->getPost('change_phone1').$this->_request->getPost('change_phone2').$this->_request->getPost('change_phone3');
        $changeEmail = $this->_request->getPost('change_email1');
        $userRecord = $this->_connect_model->get('Member')->getMemberRecord($userId);

        if($pass == $userRecord['pass']) {
            $this->_connect_model->get('Member')->modifyMemberRecord($changePass, $changeName, $changeGender, $changeAddress, $changePhone, $changeEmail, $userId);
            $this->_session->clear();
            $this->_session->setAuthenticateStatus(false);
            $this->redirect('/alert/9');
        } else {
            $this->redirect('/alert/10');
        }
    }

    public function productAddAction() {
        $user = $this->_session->get('user');
        if($this->_session->isAuthenticated() == true) {
            if($user['grade'] == "admin") {
                $productAdd_view = $this->render(array(
                    '_token' => $this->getToken(self::PRODUCTADD)
                ), null, "myPageTemplate");
                return $productAdd_view;
            } else {
                $this->redirect('/alert/6');
            }
        } else {
            $this->redirect('/alert/11');
        }
    }

    public function productAddExecuteAction() {
        $token = $this->_request->getPost('_token');
        if(!$this->checkToken(self::PRODUCTADD, $token)) {
            return $this->redirect('/'.self::PRODUCTADD);
        }

        $productName = $this->_request->getPost('product_name');
        $price = $this->_request->getPost('price');
        $type = $this->_request->getPost('type');
        $size = $this->_request->getPost('size');
        $point = $this->_request->getPost('product_point');
        $upload_file = $this->_request->getFiles('upload_file');
        $upload_files = "";

        if($this->sizeCheck($type, $size) == true) {
            $this->_connect_model->get('Product')->insertProductRecord($productName, $price, $type, $size, $point);

            for ($iCount = 0; $iCount < count($upload_file['name']); $iCount++) {

                $file_name = $upload_file['name'][$iCount];
                $file_tmp_name = $upload_file['tmp_name'][$iCount];
                $upload_path = "";

                if($type == "top") {
                    $upload_path = './images/product_img/top/';
                } else if($type == "outer") {
                    $upload_path = './images/product_img/outer/';
                } else if($type == "shoes") {
                    $upload_path = './images/product_img/shoes/';
                } else if($type == "eyewear") {
                    $upload_path = './images/product_img/eyewear/';
                }

                $upload_file_name = $upload_path.$file_name;
                $file_path = $upload_path.$file_name."*";

                $upload_files .= $file_path;

                move_uploaded_file($file_tmp_name, $upload_file_name);
                $lastProductNo = $this->_connect_model->get('Product')->getLastProductRecord();
                $num = (int)$lastProductNo['no'];

                $this->_connect_model->get('Product')->insertProductImageRecord($num, $file_name, $upload_path);
            }
            $this->redirect('/alert/12');
        } else {
            $this->redirect('/alert/13');
        }
    }

    protected function sizeCheck($argType, $argSize) {
        $type = $argType;
        $size = $argSize;

        if($type == "top" || $type == "outer") {
            if(!($size == "S" || $size == "M" || $size == "L" || $size == "XL" || $size == "XXL")) {
                return false;
            } else {
                return true;
            }
        } else if($type == "shoes") {
            if(!($size == "220mm" || $size == "230mm" || $size == "240mm" || $size == "250mm" || $size == "260mm" || $size == "270mm" || $size == "280mm")) {
                return false;
            } else {
                return true;
            }
        } else if($type == "eyewear") {
            if(!$size == "none") {
                return false;
            } else {
                return true;
            }
        }
    }



}

?>

