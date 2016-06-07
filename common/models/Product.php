<?php

namespace common\models;

use Yii;
use common\models\ProductImage;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $brand_id
 * @property integer $body_type_id
 *
 * @property BodyType $bodyType
 * @property Brand $brand
 * @property ProductImage[] $productImages
 */
class Product extends \yii\db\ActiveRecord
{
    public $imageFiles;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'brand_id', 'body_type_id'], 'required'],
            [['description'], 'string'],
            [['brand_id', 'body_type_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['body_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => BodyType::className(), 'targetAttribute' => ['body_type_id' => 'id']],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'id']],
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'brand_id' => 'Brand',
            'body_type_id' => 'Body Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBodyType()
    {
        return $this->hasOne(BodyType::className(), ['id' => 'body_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'id']);
    }

    public function upload($product_id)
    {
        foreach ($this->imageFiles as $file) {
            $path = '/uploads/product_image/' . $file->baseName . '.' . $file->extension;
            $file->saveAs(\Yii::getAlias('@frontend') . '/web/uploads/product_image/' . $file->baseName . '.' . $file->extension);
            $productImage = new ProductImage();
            $productImage->path = $path;
            $productImage->product_id = $product_id;
            $productImage->save(false);
        }
    }
}
