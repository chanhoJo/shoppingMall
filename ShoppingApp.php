<?php
/**
 * Created by PhpStorm.
 * User: bon
 * Date: 2017-01-18
 * Time: 오전 9:41
 */
require_once 'mvc/AppBase.php';

class ShoppingApp extends AppBase {

    public function getRootDirectory() {
        return dirname(__FILE__);
    }

    protected function doDbConnection() {
        $this->_connectModel->connect('root',   // 접속이름
            array(
                'string'    => 'mysql:dbname=shopping_mall;host=localhost;charset=utf8',  //DB 이름 - weblog
                'user'      => 'root',                                            //DB 사용자명
                'password'  => ''                                       //DB 사용자의 패스워드
            ));
    } // doDbConnection - function

    protected function getRouteDefinition() {
        return array(
            // AccountController 클래스 관련 Routing
            '/account/myPage/modify' => array('controller' => 'account', 'action' => 'modify'),
            '/account/myPage/buyList' => array('controller' => 'account', 'action' => 'buyList'),
            '/account/myPage/delete' => array('controller' => 'account', 'action' => 'delete'),
            '/account/myPage/productAdd' => array('controller' => 'account', 'action' => 'productAdd'),
            '/account/:action' => array('controller' => 'account'),

            // ShoppingController 클래스 관련 Routing
            '/'            => array('controller' => 'shopping', 'action' => 'index'),
            '/list'        => array('controller' => 'shopping', 'action' => 'list'),
            '/item'        => array('controller' => 'shopping', 'action' => 'item'),
            '/buyItem'     => array('controller' => 'shopping', 'action' => 'buyItem'),
            '/purchase'    => array('controller' => 'shopping', 'action' => 'purchase'),
            '/alert/:message'       => array('controller' => 'shopping', 'action' => 'alert'),

            // BoardController 클래스 관련 Routing
            '/review'                   => array('controller' => 'review', 'action' => 'index'),
            '/review/write'                   => array('controller' => 'review', 'action' => 'write'),
            '/review/view' => array('controller' => 'review', 'action' => 'view'),
            '/review/:action' => array('controller' => 'review')
        );
    }
}