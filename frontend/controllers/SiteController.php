<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\CommentForm;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
        return $this->render('index');
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionComment() {
        $model = new CommentForm();

        $formData = Yii::$app->request->post();

        if (Yii::$app->request->isPost) {
            
            $model->attributes = $formData['CommentForm'];

            if ($model->validate() && $model->save()) {
                Yii::$app->session->setFlash('info', 'You comment send!');
            }
        }
        
        $commentList = $model->getList();
        
        return $this->render('comment', [
            'model' => $model,
            'commentList' => $commentList,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout() {
        return $this->render('about');
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionSamplepost() {
        return $this->render('samplepost');
    }
    
    
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
}