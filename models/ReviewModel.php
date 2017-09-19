<?php
/**
 * Created by PhpStorm.
 * User: bon
 * Date: 2017-01-16
 * Time: 오후 2:10
 */

class ReviewModel extends ExecuteModel {

    public function insertReviewRecord($argReviewTitle, $argReviewContent, $argReviewWriter, $argReviewFile) {
        $query = "INSERT INTO review VALUE (NULL, :review_title, :review_content, now(), :review_count, :review_writer, :review_file)";
        $this->handlingRecord(
            $query,
            array(
                ':review_title' => $argReviewTitle,
                ':review_content' => $argReviewContent,
                ':review_count' => 0,
                ':review_writer' => $argReviewWriter,
                ':review_file' => $argReviewFile
            )
        );
    }

    public function deleteReviewRecord($argReviewNo) {
        $query = "DELETE FROM review WHERE review_no = :review_no";
        $this->handlingRecord(
            $query,
            array(
                'review_no' => $argReviewNo
            )
        );
    }

    public function modifyReviewRecord($argReviewNo) {
        $reviewRecord = $this->getReviewRecord($argReviewNo);
        $count = $reviewRecord['review_count'] + 1;

        $query = "UPDATE review SET review_count = :review_count WHERE review_no = :review_no";
        $this->handlingRecord(
            $query,
            array(
                'review_count' => $count,
                'review_no' => $argReviewNo
            )
        );
    }

    public function getReviewRecord($argReviewNo) {
        $query = "SELECT * FROM review WHERE review_no = :review_no";
        $reviewRow = $this->getRecord(
            $query,
            array(
                ':review_no' => $argReviewNo
            )
        );
        return $reviewRow;
    }

    public function getAllReviewRecord($selectMode) {
        if($selectMode == "rank") {
            $query = "SELECT * FROM review ORDER BY review_count DESC, review_no ASC";
        } else if($selectMode == "normal") {
            $query = "SELECT * FROM review ORDER BY review_no DESC";
        }
        $reviewRow = $this->getAllRecord(
            $query
        );
        return $reviewRow;
    }

    public function getReviewNoRecord() {
        $query = "SELECT * FROM review ORDER BY review_no DESC limit 1";
        $reviewRow = $this->getRecord(
            $query
        );
        return $reviewRow;
    }
}