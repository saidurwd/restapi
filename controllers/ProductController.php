<?php

namespace app\controllers;

use Yii;
use app\models\Product;
use yii\rest\ActiveController;

class ProductController extends ActiveController
{
    public $modelClass = 'app\models\Product';

    private function errorResponse($message)
    {
        // set response code to 400
        Yii::$app->response->statusCode = 400;
        return $this->asJson(['error' => $message]);
    }

    public function actionAllProducts()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $products = Product::find()->all();
        if (count($products) > 0) {
            return array('status' => 'success', 'data' => $products);
        } else {
            return array('status' => false, 'data' => 'No Products Found');
        }
    }

    public function actionCreateProduct()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $product = new Product();
        $product->scenario = Product::SCENARIO_CREATE;
        $product->attributes = yii::$app->request->post();
        if ($product->validate()) {
            $product->save();
            return array('status' => true, 'data' => 'Product is successfully saved');
        } else {
            return array('status' => false, 'data' => $product->getErrors());
        }
    }

    public function actionUpdateProduct()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $attributes = yii::$app->request->post();
        $product = Product::find()->where(['id' => $attributes['id']])->one();
        if ($product) {
            $product->attributes = yii::$app->request->post();
            $product->save();
            return array('status' => true, 'data' => 'Product is updated successfully');
        } else {
            return array('status' => false, 'data' => 'No products found');
        }

        // $productId = yii::$app->request->post('id');
        // $product = Product::findOne($productId);
        // if (is_null($product)) {
        //     return $this->errorResponse('Could not find product with provided ID');
        // }

        // if ($product) {
        //     $product->attributes = yii::$app->request->post();
        //     $product->save();
        //     return array('status' => true, 'data' => 'Product is updated successfully');
        // } else {
        //     return array('status' => false, 'data' => 'No products found');
        // }
    }

    public function actionDeleteProduct()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $attributes = yii::$app->request->post();
        $product = Product::find()->where(['id' => $attributes['id']])->one();
        if ($product) {
            $product->delete();
            return array('status' => true, 'data' => 'Product is successfully deleted');
        } else {
            return array('status' => false, 'data' => 'No Product Found');
        }
    }
}
