<?php
/* @var $this InvitationController */
/* @var $model Invitation */

$this->breadcrumbs=array(
	'Invitations'=>array('admin'),
	'Create',
);

?>

<h2>Send New Invitation</h2>

<?php echo $this->renderPartial('add', array('model'=>$model)); 

?>