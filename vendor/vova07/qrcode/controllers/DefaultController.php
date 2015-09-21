<?php

namespace vendor\vova07\qrcode\controllers;

use yii\web\Controller;
use yii;

class DefaultController extends Controller
{
    // public function __construct($id, $module, $config = [])
    // {
    //     if (Yii::$app->user->isGuest) {
    //         $this->redirect('/backend/login/', 301);
    //     }
    //     $this->id = $id;
    //     $this->module = $module;
    //     parent::__construct($config);
    // }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
