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
		<?php echo $form->labelEx($model,'filename'); ?>
		<?php echo $form->textField($model,'filename',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'filename'); ?>
		<p class="hint">the name of the audio file (ie: episode35.mp3)</p>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'published_date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
							'name'=>'Post[published_date_calendar]',
							//'id'=>'user_Birthdate',
							'model'=>$model,

							// additional javascript options for the date picker plugin
							'options'=>array(
									'showAnim'=>'fold',
									),
							'htmlOptions'=>array(
									'style'=>'height:20px;',
									'size'=> 10,
							),
							'value' => $model->isNewRecord ? 
											date( 'm/d/Y', time() ) : 
											date( 'm/d/Y', $model->published_date )
					));
	?>
        <?php echo $form->dropDownList( $model,'published_hour', range(1,12) ); ?>
        <?php echo $form->dropDownList( $model,'published_min', array('00' => '00', '15' => '15', '30' => '30', '45' => '45') ); ?>
        <?php echo $form->dropDownList( $model,'published_ampm', array('am' => 'am', 'pm' => 'pm' ) ); ?>
		<p class="hint">If date is set in the future the post won't be displayed until that date!</p>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
