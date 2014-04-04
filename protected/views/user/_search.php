<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fname'); ?>
		<?php echo $form->textField($model,'fname',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lname'); ?>
		<?php echo $form->textField($model,'lname',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activated'); ?>
		<?php echo $form->textField($model,'activated'); ?>
	</div>

	<div class="row">
		<?php 
			echo $form->checkBox($model,'disable',array('style'=>'float:left'));
			echo $form->label($model,'disable'); 
		?>
		<?php //echo $form->label($model,'disable'); ?>
		<?php //echo $form->textField($model,'disable'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isAdmin'); ?>
		<?php echo $form->textField($model,'isAdmin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isProMentor'); ?>
		<?php echo $form->textField($model,'isProMentor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isPerMentor'); ?>
		<?php echo $form->textField($model,'isPerMentor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isDomMentor'); ?>
		<?php echo $form->textField($model,'isDomMentor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isStudent'); ?>
		<?php echo $form->textField($model,'isStudent'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isMentee'); ?>
		<?php echo $form->textField($model,'isMentee'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isJudge'); ?>
		<?php echo $form->textField($model,'isJudge'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isEmployer'); ?>
		<?php echo $form->textField($model,'isEmployer'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->