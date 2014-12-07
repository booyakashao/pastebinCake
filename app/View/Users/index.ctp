<!-- app/View/Users/index.ctp -->
<?php $this->assign('title', 'Index Users'); ?>
<h1>List of active users</h1>

<?php
$paginator = $this->Paginator;
?>

<div>
<?php echo $this->Html->link('Logout', array('action' => 'logout')); ?>
</div>

<table>
	<tr>
		<th>Username</th>
		<th>Role</th>
		<th>Edit</th>
		<th>Delete</th>
	</tr>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo $user['User']['username']; ?></td>
		<td><?php echo $user['User']['role']; ?></td>
		<td><?php echo $this->Html->link('Edit', array('action' => 'edit', $user['User']['id'])); ?></td>
		<td><?php echo $this->Html->link('Delete', array('action' => 'delete', $user['User']['id'])); ?></td>
	</tr>
	<?php endforeach; ?>
	<?php unset($user); ?>
</table>

<div>
<?php echo $this->Html->link('Add', array('action' => 'add')); ?>
</div>

	<!-- Pagination section -->
	<div class='paging'>
		<?php
		echo $paginator->first("First");


		if($paginator->hasPrev()) {
			echo $paginator->prev("Prev");
		}

		echo $paginator->numbers(array('modulus' => 5));

		if($paginator->hasNext()) {
			echo $paginator->next("Next");		
		}

		echo $paginator->last("Last");
		?>

	</div>
