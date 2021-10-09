<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use yii\httpclient\Client;
use app\models\Tickers;

class TickersController extends AppController
{
   /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = Tickers::find()->orderBy(['id' => SORT_DESC])->all();

        return $this->render('index', compact('model'));
    }


   /**
     * Displays create.
     *
     * @return string
     */
    public function actionCreate()
    {
        $model = new Tickers();
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $model->created_at = date('Y-m-d H:i:s');
            if ($model->save()) {
                $update_delete = Tickers::find()->orderBy(['id' => SORT_DESC])->all();
                $html = $this->renderPartial('jsUpdate', ['page' => $update_delete], true);
                return ['success' => true, 'html' => $html];

            } else {
                return ['success' => false];
            }
        }
    }


   /**
     * Displays delete.
     *
     * @return string
     */
    public function actionDelete()
    {
        if (Yii::$app->request->isAjax) {
            $model = Tickers::findOne(Yii::$app->request->post('id'));
            Yii::$app->response->format = Response::FORMAT_JSON;
            if ($model->delete()) {
                $update_delete = Tickers::find()->orderBy(['id' => SORT_DESC])->all();
                $html = $this->renderPartial('jsUpdate', ['page' => $update_delete], true);
                return ['success' => true, 'html' => $html];

            } else {
                return ['success' => false];
            }
        }
    }
    
    /**
     * Https request
     *
     * @return string
     */
    public function actionAdd()
    {
        if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {
            $client = new Client();
            $response = $client->createRequest()
                ->setFormat(Client::FORMAT_JSON)
                ->setMethod('GET')
                ->setUrl('https://tradernet.ru/securities/export?tickers=MOEX+SBER&params=bap+bbp')
                ->send();

                $tickets = json_decode($response->content);

                foreach ($tickets as $key => $item) {
                    $model = new Tickers();
                    $model->bbp = $item->bbp;
                    $model->bap = $item->bap;
                    $model->created_at = date('Y-m-d H:i:s');
                    $model->save();
                }
        }
        
    }

}