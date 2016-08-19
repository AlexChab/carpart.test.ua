<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    public function behaviors(){
        return [
          'access' => [
            'class' => AccessControl::className(),
            'rules' => [
              [
                'allow' => true,
                'roles' => ['@']
              ]
            ]
          ]
        ];
    }
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function debug($data){
        echo '<pre>'.print_r($data,true).'</pre>';
    }
}
