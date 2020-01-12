<?php


namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
	public static function tableName(){
		return 'product';
	}

	public function getCategory(){
		return $this->hasMany(Category::className(), ['id' => 'category_id']);
	}
}
