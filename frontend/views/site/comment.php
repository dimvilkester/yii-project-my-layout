<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\CommentForm */
/* @var $commentList array \frontend\models\CommentForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Comments';
?>
<div class="site-contact">
    
    <div class="row">
        <div class="col-lg-12">
            <?php foreach ($commentList as $list): ?>
                <div class="panel panel-info">
                    <div class="panel-heading">                  
                        <h3>
                            <?php echo Html::encode($list['name']); ?> 
                            <small><em>написал(а)</em> <?php echo Html::encode($list['data']); ?></small>
                        </h3>
                    </div>    
                    <div class="panel-body">
                        <p><?php echo Html::encode($list['text']); ?></p>
                    </div>
                </div>  
            <?php endforeach; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-5">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>Here you can leave a comment. Thank you.</p>
            
            <?php $form = ActiveForm::begin(); ?>
            
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'type' => 'text', 'placeholder' => 'Name', 'id' => 'name'])->label('Name') ?>
                </div>
            </div>
            
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <?= $form->field($model, 'email')->textInput(['type' => 'email', 'placeholder' => 'Email Address', 'id' => 'email'])->label('Email Address') ?>
                </div>
            </div>
            
            <div class="row control-group">
                <div class="form-group col-xs-12 floating-label-form-group controls">
                    <?= $form->field($model, 'comment')->textarea(['rows' => 6, 'type' => 'text', 'placeholder' => 'Comments', 'id' => 'comments'])->label('Comments') ?>
                </div>
            </div>
            
            <br>
            
            <div id="success"></div>
            <div class="row">
                <div class="form-group col-xs-12">
                    <?= Html::submitButton('Send', ['class' => 'btn btn-default']) ?>
                    <?= Html::resetButton('Reset', ['class' => 'btn btn-danger']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>