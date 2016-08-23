<?php

namespace app\modules\admin\controllers;
use Yii;
use app\models\SuppliersForm;
use app\models\Suppliers;
use yii\data\ArrayDataProvider;

class SuppliersController extends DefaultController
{
    public function actionIndex()
    {
        $form = new SuppliersForm();
        if($form->load(Yii::$app->request->post()) && $form->validate()) {
            $data['name'] = $form->name;
            $data['shortName'] =$form->shortName;
            $customer = new Suppliers();
            $customer->name = $form->name;
            $customer->short_name = $form->shortName;
            $customer->save();
        }
        $dataProvider = new ArrayDataProvider([
          'allModels' => Suppliers::find()->all(),
          'pagination' => [
            'pageSize' => 100,
          ],
          'sort' => [
            'attributes' => ['id','name','short_name'],
          ],
        ]);
        return $this->render('index',['dataProvider'=>$dataProvider,'suppliersForm'=>$form]);
    
    }
    public function actionAddsuppliers(){
        $form = new SuppliersForm();
        if($form->load(Yii::$app->request->post()) && $form->validate()) {
            $data['name'] = $form->name;
            $data['shortName'] = $form->shortName;
            $customer = new Suppliers();
            $customer->name = $form->name;
            $customer->short_name = $form->shortName;
            $customer->save();
            print_r($customer);
        }
        return $this->render('suppliers',['suppliersForm'=>$form]);
        
    }
    public function actionView($id)
    {
        return $this->render('view', [
          'data' => Suppliers::findOne($id),
        ]);
    }
    public function actionUpdate($id){
        $data = Suppliers::findOne($id);
        $form = new SuppliersForm();
        if($form->load(Yii::$app->request->post()) && $form->validate()) {

            $values = [
              'name' => $form->name,
              'short_name' => $form->shortName,
            ];
            $customer = Suppliers::findOne($id);
            $customer->attributes = $values;
            $customer->save();
            return $this->redirect(['index']);

        }
        return $this->render('update',['suppliersForm'=>$form,'data'=>$data]);
    }
    
    public function actionDel($id)
    {
        if ($this->findModel($id)->delete()) {
            return $this->redirect(['index']);
        }
        $error ="Запись не может быть удалена";
        return $this->render('view', [ 'error' => $error,]);
        
    }
    protected function findModel($id)
    {
        if (($model = Suppliers::findOne($id)) !== null) {
            return $model;
        } else {
            $error ="Ошибка метода";
            return $this->render('view', [ 'error' => $error,]);
            // throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
