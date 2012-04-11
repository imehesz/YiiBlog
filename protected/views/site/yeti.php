<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'yeti-form',
		'enableAjaxValidation'=>false,
)); ?>

<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

<div class="row">
<?php echo $form->labelEx($model,'yiiuser_id'); ?>
<?php echo $form->textField($model,'yiiuser_id', array( 'size' => 10 ) ); ?>
<?php echo $form->error($model,'yiiuser_id'); ?>
<p class="hint">
	The User ID from the http://yiiframework.com site
</p>
</div>

<div class="row">
<?php echo $form->labelEx($model,'yiiuser_name'); ?>
<?php echo $form->textField($model,'yiiuser_name',array('size'=>25,'maxlength'=>255)); ?>
<?php echo $form->error($model,'yiiuser_name'); ?>
<p class="hint">
	The User Name from the http://yiiframework.com site (ie: jacmoe, joblo, gusnips etc)
</p>

</div>

<div class="row">
<?php echo $form->labelEx($model,'email_address'); ?>
<?php echo $form->textField($model,'email_address',array('size'=>40,'maxlength'=>255)); ?>
<?php echo $form->error($model,'email_address'); ?>
</div>

<div class="row">
<?php echo $form->labelEx($model,'comment'); ?>
<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'comment'); ?>
<p class="hint">
	Why do you think this person deserves to recieve the award?
</p>

</div>

<div class="row buttons">
<?php echo CHtml::submitButton( 'Submit' ); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
