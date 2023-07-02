<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cart}}".
 *
 * @property int $id ID
 * @property string $user User
 * @property string $product Product
 * @property string $image Image
 * @property int $quantity Quantity
 * @property float $price Price
 * @property float $total_price Total Price
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cart}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user', 'product', 'image', 'quantity', 'price', 'total_price'], 'required'],
            [['quantity'], 'integer'],
            [['price', 'total_price'], 'number'],
            [['user', 'product', 'image'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'product' => 'Product',
            'image' => 'Image',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'total_price' => 'Total Price',
        ];
    }
}
