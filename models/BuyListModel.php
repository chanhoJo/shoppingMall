<?php
/**
 * Created by PhpStorm.
 * User: bon
 * Date: 2017-01-23
 * Time: 오전 12:48
 */

class BuyListModel extends ExecuteModel {

    public function insertBuyListRecord($argBPName, $argBPrice,$argBAmount, $argBSize, $argBAddress, $argBPhone, $argBuyer, $argMemo,$argBPImg) {
        $query = "INSERT INTO buyList VALUE (NULL, :buy_product_name, :buy_price, :buy_amount, :buy_size, now(), :buyer_address, :buyer_phone, :buyer, :memo,:buy_product_img)";
        $this->handlingRecord(
            $query,
            array(
                ':buy_product_name' => $argBPName,
                ':buy_price' => $argBPrice,
                ':buy_amount' => $argBAmount,
                ':buy_size' => $argBSize,
                ':buyer_address' => $argBAddress,
                ':buyer_phone' => $argBPhone,
                ':buyer' => $argBuyer,
                ':memo' => $argMemo,
                ':buy_product_img' => $argBPImg
            )
        );
    }

    public function getBuyListRecord($argBuyer) {
        $query = "SELECT *
                  FROM buylist
                  WHERE buyer = :buyer";
        $buyListRow = $this->getAllRecord(
            $query,
            array(
                'buyer' => $argBuyer
            )
        );
        return $buyListRow;
    }
}