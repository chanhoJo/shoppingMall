<?php
/**
 * Created by PhpStorm.
 * User: bon
 * Date: 2017-01-16
 * Time: 오후 2:10
 */

class ProductModel extends ExecuteModel {

//    product
    public function insertProductRecord($argPname,$argPrice,$argType,$argSize, $argPoint) {
        $query = "INSERT INTO product(product_name, price, type, size, buy_count, click_count, point) VALUES (:product_name, :price, :type, :size, :buy_count, :click_count, :point)";
        $this->handlingRecord(
            $query,
            array(
                ':product_name'=>$argPname,
                ':price'=>$argPrice,
                ':type'=>$argType,
                ':size'=>$argSize,
                ':buy_count' => 0,
                ':click_count' => 0,
                ':point'=>$argPoint,
            )
        );
    }

    public function deleteProductRecord($argNo) {
        $query = "DELETE FROM product WHERE no = :no";
        $this->handlingRecord(
            $query,
            array(
                ':no'=>$argNo
            )
        );
    }

    public function getProductAndImageRecord($argNo) {
        $query = "SELECT p.*, i.img_name, i.img_path
                  FROM product p, images i
                  WHERE p.no = i.no
                  AND p.no = :no";
        $productRow = $this->getRecord(
            $query,
            array(
                ':no' => $argNo
            )
        );
        return $productRow;
    }

    public function modifyProductRecord($argNo, $argModifyPart, $argBuyAmount = 0) {
        $row = $this->getProductAndImageRecord($argNo);

        if($argModifyPart == "buy_count") {
            $query = "UPDATE product SET buy_count = :modiCount WHERE no = :pNo";
            $count = $row['buy_count'] + $argBuyAmount;
        } else if($argModifyPart == "click_count") {
            $query = "UPDATE product SET click_count = :modiCount WHERE no = :pNo";
            $count = $row['click_count'] + 1;
        }
        $this->handlingRecord(
            $query,
            array(
                ':modiCount' => $count,
                ':pNo' => $argNo
            )
        );
    }

    public function getAllProductAndImageRecord($viewMode, $selectMode, $argProductType) {
        if($viewMode == "list") {
            if ($selectMode == "rank") {
                $query = "SELECT p.*, i.img_name, i.img_path
                      FROM product p, images i
                      WHERE p.no = i.no
                      AND p.type = :type
                      GROUP BY p.no
                      ORDER BY p.buy_count DESC, p.click_count DESC, p.no asc";
            } else if ($selectMode == "normal") {
                $query = "SELECT p.*, i.img_name, i.img_path
                      FROM product p, images i
                      WHERE p.no = i.no
                      AND p.type = :type
                      GROUP BY p.no
                      ORDER BY p.no";
            }
        } else {
            if ($selectMode == "rank") {
                $query = "SELECT p.*, i.img_name, i.img_path
                      FROM product p, images i
                      WHERE p.no = i.no
                      AND p.type = :type
                      ORDER BY p.buy_count DESC, p.click_count DESC, p.no asc";
            } else if ($selectMode == "normal") {
                $query = "SELECT p.*, i.img_name, i.img_path
                      FROM product p, images i
                      WHERE p.no = i.no
                      AND p.type = :type
                      ORDER BY p.no";
            }
        }
        $productRow = $this->getAllRecord(
            $query,
            array(
                ':type'=>$argProductType
            )
        );
        return $productRow;
    }

    public function getLastProductRecord() {
        $query = "SELECT no FROM product ORDER BY no DESC limit 1";
        $productRow = $this->getRecord($query);

        return $productRow;
    }

//    product image
    public function insertProductImageRecord($argNo, $argIName, $argIPath) {
        $query = "INSERT INTO images (no, img_name, img_path) VALUES (:iNo, :img_name, :img_path) ";
        $this->handlingRecord(
            $query,
            array(
                ":iNo"=>$argNo,
                ":img_name"=>$argIName,
                ":img_path"=>$argIPath
            )
        );
    }

}