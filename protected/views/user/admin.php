<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
    'Manage Users',
);

/*$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);*/

/*Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");*/

?>

<h2>Manage Users</h2>

<a href=../user/create>
<?php $this->widget('bootstrap.widgets.TbButton', array(
		'buttonType'=>'button',
		'label'=>'Add New User',
		'icon'=>'plus white',
		'size'=>'small',
		'type'=> 'success',
		//'url'=>'user/create',
		// button for ADD NEW USER
		// FIX HREF
));?>
</a>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<!--<div class="search-form" style="display:none">
<?php $this->renderPartial('search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $linkfind ='href="/coplat/index.php/user/findMentors"'; ?>
<div style="float: left">
    <a <?php echo $linkfind; ?>><img style="display: block;" border="0" src="/coplat/images/find.png" id="find" width="50" height="50">
        <p stlye="width: 200px; position: relative; top: -200px;">Find Domain Mentors</p>
    </a>
</div>





<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id'=>'user-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'username',
        'email',
        'fname',
        'mname',
        'lname',
        array(
            'name'=>'activated',
            'header'=>'Activated',
            'type'=>'raw',
            'htmlOptions'=>array('width'=>'10'),
        ),
        array(
            'name'=>'disable',
            'header'=>'Disable',
            'type'=>'raw',
            'htmlOptions'=>array('width'=>'10'),
        ),
        array(
            'name'=>'isProMentor',
            'header'=>'Project M.',
            'type'=>'raw',
        ),
        array(
            'name'=>'isDomMentor',
            'header'=>'Domain M.',
            'type'=>'raw',
        ),
        array(
            'name'=>'isPerMentor',
            'header'=>'Personal M.',
            'type'=>'raw',
        ),

        array(
            'class'=>'CButtonColumn',

        ),
    ))); ?>
