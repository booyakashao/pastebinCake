<!-- File :/app/View/Pastebinentries/view.ctp -->

	<?php $this->start('script');?>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<?php $this->end(); ?>

<h3>Pastebin Detailed Entry </h3>

<?php $this->append('script');?>
<script>
$(document).keydown(function(e){
      switch(e.keyCode) {
      	case 37 : 
		window.location= "/pastebinentries/view/<?php 
			if($pastebinPrev) {
				echo $pastebinPrev['Pastebinentry']['id']; 
			} else {
				echo $pastebinentry['Pastebinentry']['id'];			
			}
				
	?>"; 
	break;
      	case 39 : 
		window.location= "/pastebinentries/view/<?php
			if($pastebinNext) {
			 	echo $pastebinNext['Pastebinentry']['id']; 
			} else {
				echo $pastebinentry['Pastebinentry']['id'];	
			}
	?>"; 
	break;
    	}
});
</script>
<?php $this->end(); ?>
<br/>

<!--################# -->

<?php
	echo $this->Html->link("Back to all Pastebins",  array('controller' => 'pastebinentries', 'action' => 'index'));	
?>




<div style="width:100%;height:40px;">
<table>
	<tr>
		<td>
		<?php 
			if($pastebinPrev) { 
				echo $this->Html->link("<< Prev",  array('controller' => 'pastebinentries', 'action' => 'view', $pastebinPrev['Pastebinentry']['id']));
			} 
		?>	
		</td>
		<td>
		<?php
			if($pastebinNext) { 
				echo $this->Html->link("Next >>",  array('controller' => 'pastebinentries', 'action' => 'view', $pastebinNext['Pastebinentry']['id']));
			} 
		?>
		</td>
	</tr>
</table>
</div>

<h3><a href="<?php echo $pastebinentry['Pastebinentry']['URL']; ?>"><?php echo h($pastebinentry['Pastebinentry']['URL']); ?></a></h3>

<textarea rows="28">
<?php
echo $pastebinentry['Pastebinentry']['CONTENT'];
?>
</textarea>

<?php
	echo $this->Form->postLink(
             'Delete',
              array('action' => 'delete', $pastebinentry['Pastebinentry']['id']),
              array('confirm' => 'Are you sure?')
         );
?>
