<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property int $id ID
 * @property string $product Product
 * @property string $sku SKU
 * @property float $price Price
 * @property string $image Image
 */
class Product extends \yii\db\ActiveRecord
{
    const SCENARIO_CREATE = 'create';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product', 'sku', 'price', 'image'], 'required'],
            [['price'], 'number'],
            [['product', 'image'], 'string', 'max' => 150],
            [['sku'], 'string', 'max' => 50],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['product', 'sku', 'price', 'image'];
        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product' => 'Product',
            'sku' => 'SKU',
            'price' => 'Price',
            'image' => 'Image',
        ];
    }
}
