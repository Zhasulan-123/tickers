<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class AppController extends Controller
{
   /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }
}