<!-- File: /app/View/PasteBinEntries/index.ctp -->
<?php
$paginator = $this->Paginator;
?>

<div>
<?php 
	if($userRole == 'admin') {
		echo $this->Html->link('AdminPage', array('controller' => 'users', 'action' => 'index'));
	}
?>
</div>

<h1>Pastebin Entries</h1>

<div>
<?php echo $this->Html->link('Search for Post', array('action' => 'search')); ?>
</div>

<table>
	<tr>
		<th>Id</th>
		<th>URL</th>
		<th>Delete Action</th>
	</tr>

	<?php foreach ($pasteBinEntries as $entry): ?>
	<tr>
		<td><?php echo $this->Html->link($entry['Pastebinentry']['id'], array('controller' => 'pastebinentries', 'action' => 'view', $entry['Pastebinentry']['id'])); ?></td>
		<td><a href="<?php echo $entry['Pastebinentry']['URL']; ?>"><?php echo $entry['Pastebinentry']['URL']; ?></a></td>
		<td>
		<?php
			echo $this->Form->postLink(
             			'Delete',
              			array('action' => 'delete', $entry['Pastebinentry']['id']),
              			array('confirm' => 'Are you sure?')
         		);
		?>
		</td>
	</tr>
	<?php endforeach ?>
	<?php unset($entry)?>
</table>

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
