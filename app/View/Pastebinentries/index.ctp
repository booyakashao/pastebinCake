<!-- File: /app/View/PasteBinEntries/index.ctp -->
<?php
$paginator = $this->Paginator;
?>

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Pastebin Entries
            <small>Thank you and have an A1 day</small>
        </h1>
    </div>
</div>

<?php foreach ($pasteBinEntries as $entry): ?>
    <div class="row">
        <div class="col-md-12">
            <h3>ID: 
                <?php echo $entry['Pastebinentry']['id']; ?>
            </h3>
            <h4>URL: 
                <a href="<?php echo $entry['Pastebinentry']['URL']; ?>">
                    <?php echo $entry['Pastebinentry']['URL']; ?>
                </a>
            </h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
            <?php echo $this->Html->link(
                        'View Pastebin <span class="glyphicon glyphicon-chevron-right"></span>', 
                        array(
                            'controller' => 'pastebinentries', 
                            'action' => 'view', 
                            $entry['Pastebinentry']['id']
                        ),
                        array(
                            'class' => 'btn btn-primary',
                            'escape'=>false
                        )
                    ); 
            ?>
            <!--<a class="btn btn-primary" href="#">View Pastebin <span class="glyphicon glyphicon-chevron-right"></span></a> -->
        </div>
    </div>
<?php endforeach ?>
<?php unset($entry)?>

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
