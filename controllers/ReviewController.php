<?php

class ReviewController extends Controller{
    const WRITE = "review/write";
      public function indexAction() {
          $reviewRecord = $this->_connect_model->get('Review')->getAllReviewRecord("normal");
          $index_view = $this->render(array(
              'review' => $reviewRecord
          ), null, "template");
          return $index_view;
      }

      public function writeAction() {
          $user = $this->_session->get('user')['id'];
          $write_view = $this->render(array(
              '_token' => $this->getToken(self::WRITE),
              "user" => $user
          ), null, "template");
          return $write_view;
      }

      public function viewAction() {
          $review_no = $this->_request->getGet('no');
          $this->_connect_model->get('Review')->modifyReviewRecord($review_no);
          $reviewRecord = $this->_connect_model->get('Review')->getReviewRecord($review_no);
          $view_view = $this->render(array(
              'review' => $reviewRecord
          ), null, "template");
          return $view_view;
      }

      public function writeExecuteAction() {
          $token = $this->_request->getPost('_token');
          if(!$this->checkToken(self::WRITE, $token)) {
              return $this->redirect('/'.self::WRITE);
          }

          $title = $this->_request->getPost('title');
          $content = $this->_request->getPost('content');
          $writer = $this->_request->getPost('writer');
          $upload_file = $this->_request->getFiles('upload_file');
          $upload_files = "";

          for ($iCount = 0; $iCount < count($upload_file['name']); $iCount++) {
              $file_name = $upload_file['name'][$iCount];
              $file_tmp_name = $upload_file['tmp_name'][$iCount];

              $upload_path = './file/';
              $upload_file_name = $upload_path.$file_name;
              $file_path = $upload_path.$file_name."*";

              $upload_files .= $file_path;

              move_uploaded_file($file_tmp_name, $upload_file_name);
          }

          $this->_connect_model->get('Review')->insertReviewRecord($title, $content, $writer, $upload_files);
          $reviewNo = $this->_connect_model->get('Review')->getReviewNoRecord();
          $this->redirect('/alert/14');
      }

      public function fileDownloadAction() {
          $real_filename = $this->_request->getGet('file');
          $file_dir = './file/';

          $this->_response->setHeader('Content-Type', 'application/x-octetstream');
          $this->_response->setHeader('Content-Length', filesize($file_dir.$real_filename));   //파일의 경로 로 사이즈를 알수있음.
          $this->_response->setHeader('Content-Disposition', 'attachment; filename='.$real_filename);
          $this->_response->setHeader('Content-Transfer-Encoding', 'binary');
          $this->_response->send();

          $fp = fopen($file_dir.$real_filename, "r");
          fpassthru($fp);
          fclose($fp);
      }
}

?>
