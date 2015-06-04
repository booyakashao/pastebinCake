<?php
$paginator = $this->Paginator;
?>

<h3>Pastebin Search Query </h3>

<?php
echo $this->Form->create(null, array('action' => 'search', 'type' => 'post'));
echo $this->Form->input('searchTerm', array('placeholder' => 'Search should be comma delimited', 'label' => 'Search Term'));
echo $this->Form->End('Search');
?>
<?php 

    $searchTermArrayString = "";

    if(isset($searchTermsPropogated)) {
       foreach ($searchTermsPropogated as $searchEntry):
           $searchTermArrayString += $searchEntry + ",";
       endforeach;
       unset($searchEntry);
    } 
    
    var_dump($searchTermArrayString);
?>

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
	echo $paginator->first("First") + $searchTermArrayString;


	if($paginator->hasPrev()) {
		echo $paginator->prev("Prev") + $searchTermArrayString;
	}

	echo $paginator->numbers(array('modulus' => 5));

	if($paginator->hasNext()) {
		echo $paginator->next("Next") + $searchTermArrayString;		
	}

	echo $paginator->last("Last") + $searchTermArrayString;
?>
</div>
