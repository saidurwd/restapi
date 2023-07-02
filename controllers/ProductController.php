<?php

namespace app\controllers;

use app\models\Product;
use yii\rest\ActiveController;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;

class ProductController extends ActiveController
{
    public $modelClass = 'app\models\Product';

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
                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'DELETE', 'HEAD', 'OPTIONS'],
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
    public function actionAllProducts()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $products = Product::find()->all();
        if (count($products) > 0) {
            return array('status' => 'success', 'data' => $products);
        } else {
            return array('status' => false, 'data' => 'No Products Found');
        }
    }

    public function actionCreateProduct()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $product = new Product();
        $product->scenario = Product::SCENARIO_CREATE;
        $product->attributes = \yii::$app->request->post();
        if ($product->validate()) {
            $product->save();
            return array('status' => true, 'data' => 'Product is successfully saved');
        } else {
            return array('status' => false, 'data' => $product->getErrors());
        }
    }

    public function actionUpdateProduct()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $attributes = \yii::$app->request->post();
        $product = Product::find()->where(['id' => $attributes['id']])->one();

        if (count($product) > 0) {
            $product->attributes = \yii::$app->request->post();
            $product->save();
            return array('status' => true, 'data' => 'Product is updated successfully');
        } else {
            return array('status' => false, 'data' => 'No products found');
        }
    }

    public function actionDeleteProduct()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $attributes = \yii::$app->request->post();
        $product = Product::find()->where(['id' => $attributes['id']])->one();
        if (count($product) > 0) {
            $product->delete();
            return array('status' => true, 'data' => 'Product is successfully deleted');
        } else {
            return array('status' => false, 'data' => 'No Product Found');
        }
    }
}
