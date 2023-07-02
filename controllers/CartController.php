<?php

namespace app\controllers;

use yii\rest\ActiveController;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;

class CartController extends ActiveController
{
    public $modelClass = 'app\models\Cart';

    /**
     * List of allowed domains.
     * Note: Restriction works only for AJAX (using CORS, is not secure).
     */
    public function behaviors()
    {
        return [
            'corsFilter' => [
                'class' => \yii\filters\Cors::class,
                'cors' => [
                    // restrict access to
                    'Origin' => ['*'],
                    'Access-Control-Allow-Origin' => ['*'],
                    // Allow only GET, POST and PUT methods
                    'Access-Control-Request-Method' => ['POST', 'PUT', 'GET'],
                    // Allow only headers 'X-Wsse'
                    'Access-Control-Request-Headers' => ['*'], //X-Wsse
                    // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                    'Access-Control-Allow-Credentials' => false,
                    // Allow OPTIONS caching
                    'Access-Control-Max-Age' => 3600,
                    // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                    'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
                ],
            ],
        ];
    }

    public function actionCarts()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $carts = \app\models\Cart::find()->all();
        if (count($carts) > 0) {
            return array('status' => 'success', 'data' => $carts);
        } else {
            return array('status' => false, 'data' => 'No Products Found');
        }
    }
}
