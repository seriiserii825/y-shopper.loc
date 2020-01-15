<?php


namespace app\controllers;

use app\models\Category;
use app\models\Product;
use yii\data\Pagination;

class CategoryController extends AppController
{
	public function actionIndex(){
		$hits = Product::find()->asArray()->where(['hit' => '1'])->limit(6)->all();
		$this->setMeta('E-SHOPPER');
		return $this->render('index', compact('hits'));
	}

	public function  actionView($id){
		$id = \Yii::$app->request->get('id');
		$category = Category::findOne($id);

		if ($category === null) { // item does not exist
			throw new \yii\web\HttpException(404, 'Такой категории нету');
		}

		$query = Product::find()->asArray()->where(['category_id' => $id]);
		$pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
		$products = $query->offset($pages->offset)->limit($pages->limit)->all();
		$this->setMeta('E-SHOPPER | '.$category->name, $category->keywords, $category->description);

		return $this->render('view', compact('products', 'pages', 'category'));
	}

}