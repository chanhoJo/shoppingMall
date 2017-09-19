<?php
/**
 * Created by PhpStorm.
 * User: bon
 * Date: 2017-01-16
 * Time: 오전 9:44
 */

class MemberModel extends ExecuteModel {

    public function insertMemberRecord($argId, $argPass, $argMemberName, $argAddress, $argGender, $argPhone, $argEmail) {
        $query = "INSERT INTO member VALUES (:id, :pass, :member_name, :address, :gender, :phone, :email, :point, :grade)";
        $this->handlingRecord(
            $query,
            array(
                ':id'=>$argId,
                ':pass'=>$argPass,
                ':member_name'=>$argMemberName,
                ':address'=>$argAddress,
                ':gender'=>$argGender,
                ':phone'=>$argPhone,
                ':email'=>$argEmail,
                ':point'=> 0,
                ':grade'=>"common"
            )
        );
    }

    public function deleteMemberRecord($argId) {
        $query = "DELETE FROM member WHERE id = :id";
        $this->handlingRecord(
            $query,
            array(
                ':id'=>$argId
            )
        );
    }

    public function modifyMemberRecord($argPass, $argMemberName, $argGender, $argAddress, $argPhone, $argEmail, $argId) {
        $query = "UPDATE member SET pass = :pass, member_name = :member_name, gender = :gender, address = :address, phone = :phone, email = :email WHERE id = :id";
        $this->handlingRecord(
            $query,
            array(
                ':pass'=>$argPass,
                ':member_name'=>$argMemberName,
                ':gender'=>$argGender,
                ':address'=>$argAddress,
                ':phone'=>$argPhone,
                ':email'=>$argEmail,
                ':id'=>$argId
            )
        );
    }

    public function modifyMemberPointRecord($argId, $argPoint) {
        $user = $this->getMemberRecord($argId);
        $userPoint = $user['point'] + $argPoint;

        $query = "UPDATE member SET point = :point WHERE id = :id";
        $this->handlingRecord(
            $query,
            array(
                'point' => $userPoint,
                'id' => $argId
            )
        );
    }

    public function getMemberRecord($argId) {
        $query = "SELECT * FROM member WHERE id = :id";
        $memberRow = $this->getRecord(
            $query,
            array(
                ':id'=>$argId
            )
        );
        return $memberRow;
    }
}