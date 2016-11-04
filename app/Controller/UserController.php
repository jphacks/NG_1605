<?php

App::uses('AppController', 'Controller');

class UserController extends AppController {
	   public function beforeFilter() {
        parent::beforeFilter();//これがないと、親であるAppControllerのbeforeFilter()が実行されない


        $this->Auth->allow(array(
                                'mypage',
                                'login',
                                'logout',
                                'opauthComplete'
                                ));

        $this->Auth->authenticate = array(
        // フォーム認証を利用
            'Form' => array(
            // 認証に利用するモデルの変更
            'userModel' => 'NewUser', //Userモデルを指定
            // 認証に利用するモデルのフィードを変更
            'fields' => array('username' => 'email', 'password' => 'password')
            )
        );

    }
	public function opauthComplete() {
		debug($this->data);
	}
}