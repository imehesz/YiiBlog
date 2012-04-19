<?php 
	if( ! empty( $_POST ) )
	{
		Yii::app()->clientScript->registerScript( 'candidateFormJump', "window.location.hash='candidateForm';", CClientScript::POS_END );
	}
?>
<h1>Yeti award - <small>Grrrrr</small></h1>
<p>
	The <strong>Yii Radiio</strong> and the <strong>Yii Framework team</strong> proud to announce the <strong>YETI Award</strong>.
</p>

<p>
	<strong>YETI</strong> stands for <strong>Yii Enthusiast Trophii</strong> ... <i>/yes, we know how to spell/</i>. It will be an annual thing where people from the community will be rewarded becasue of their love for the Yii framework. (ie: writing extensions, WIKIs, publishing screencasts, helping others on #IRC ... etc ).
</p>
<p>
	And the coolest thing is, <strong>YOU</strong> get to be the part of it! <u>Here are the rules:</u><br />
	<ul>
		<li>Use the form below to nominate a developer by <strong>October 31st</strong></li>
		<li>We will announce the <strong>10 finalists</strong> shortly after that</li>
		<li>On <strong>Dec. 3rd</strong> we'll reveal who is the <strong>WINNER</strong>, and the First runnner-up.</li>
		<li>Current <strong>team members</strong> and the <strong>Yii Radiio crew</strong> can not be nominated! <i>/we rock already/ </i></li>
	</ul>
</p>

<hr />
	<img src="<?php echo Yii::app()->theme->baseUrl ?>/images/yeti.png" style="float:right;" title="Yeti by thomax">
<a name="candidateForm"></a>
<h2>Nominate a developer</h2>

<div class="form">
<?php if( Yii::app()->user->hasFlash( 'yetiadded' ) ) : ?>
	<div class="successSummary">
		<?php echo Yii::app()->user->getFlash( 'yetiadded' ) ?>
	</div>
	<a href="#top">Top</a>
<?php else: ?>

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
		<p class="hint">
			Your email address so we can contact you for stuff
		</p>
		</div>

		<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'comment'); ?>
		<p class="hint">
			Why do you think this person deserves to recieve the award? (ie: extensions, WIKIs, #IRC etc)
		</p>

		</div>

				<div>
				<?php $this->widget('CCaptcha'); ?>
				<?php echo $form->textField($model,'verifyCode'); ?>
				</div>
				<div class="hint">Please enter the letters as they are shown in the image above.
				<br/>Letters are not case-sensitive.</div>


		<div class="row buttons">
		<?php echo CHtml::submitButton( 'Nominate' ); ?>
		</div>

		<?php $this->endWidget(); ?>

<?php endif ?>

</div><!-- form -->
