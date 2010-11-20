<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php $this->widget('application.extensions.fckeditor.FCKEditorWidget',array(
							"model"=>$model,                # Data-Model
							"attribute"=>'content',         # Attribute in the Data-Model
							"height"=>'400px',
							"width"=>'500px',
							"toolbarSet"=>'Mehex',          # EXISTING(!) Toolbar (see: fckeditor.js)
							"fckeditor"=>Yii::app()->basePath."/../fckeditor/fckeditor.php",
# Path to fckeditor.php
							"fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",
# Realtive Path to the Editor (from Web-Root)
							"config" => array("EditorAreaCSS"=>Yii::app()->baseUrl.'/css/index.css',),
# Additional Parameter (Can't configure a Toolbar dynamicly)
							) ); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php echo $form->textField($model,'tags',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tags'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
        <?php echo $form->dropDownList( $model,'status',Lookup::items('PostStatus') ); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
