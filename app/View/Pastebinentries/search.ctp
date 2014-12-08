<?php
$paginator = $this->Paginator;
?>

<h3>Pastebin Search Query </h3>

<!--Google Ad sense -->
<?php $this->start('script');?>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<?php $this->end(); ?>
<!-- First Ad -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-9653430912934834"
     data-ad-slot="6262524027"></ins>
<?php $this->append('script');?>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<?php $this->end(); ?>

<!--################# -->

<?php
echo $this->Form->create(null, array('action' => 'search', 'type' => 'post'));
echo $this->Form->input('searchTerm', array('placeholder' => 'Search should be comma delimited', 'label' => 'Search Term'));
echo $this->Form->End('Search');
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
