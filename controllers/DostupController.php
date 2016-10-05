<?php

namespace app\controllers;

use Yii;
use app\models\User;

class DostupController
{
	public $user_id;

    public function getUserId(){
    	$user_id = Yii::$app->user->identity->id;
    	return $user_id;
    }

    public function userDostup($id){
    	$dostup = User::find('category_id')->where(['id'=>$id])->one();
    	if($dostup->category_id != 1){
    		return $this->redirect('site/index');
    	}
    }
}

?>