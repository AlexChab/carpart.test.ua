<?php

namespace app\modules\admin\controllers;
use Yii;
use app\models\SuppliersForm;
use app\models\Suppliers;

class SuppliersController extends DefaultController
{
    public function actionIndex()
    {
        $data = Suppliers::find()->all();
        $dataProvider = new ArrayDataProvider([
          'allModels' => $data,
          'pagination' => [
            'pageSize' => 100,
          ],
          'sort' => [
            'attributes' => ['id','name','short_name'],
          ],
        ]);
        return $this->render('index',['dataProvider'=>$dataProvider]);



        print_r($data);
        return $this->render('index');
        
    }
    public function actionAddsuppliers(){
        $form = new SuppliersForm();
        if($form->load(Yii::$app->request->post()) && $form->validate()) {
            $data['name'] = $form->name;
            $data['shortName'] =$form->shortName;
            $customer = new Suppliers();
            //$customer = Suppliers::findOne(2);
            $customer->name = $form->name;
            $customer->short_name = $form->shortName;
            $customer->save();
        }
        return $this->render('suppliers',['suppliersForm'=>$form]);
        
    }
}
