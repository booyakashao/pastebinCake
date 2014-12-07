<!-- File :/app/View/Pastebinentries/view.ctp -->

<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head> 

<h3>Pastebin Detailed Entry </h3>

<!--Google Ad sense -->

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- First Ad -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-9653430912934834"
     data-ad-slot="6262524027"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

<br/>

<!--################# -->

<?php
	echo $this->Html->link("Back to all Pastebins",  array('controller' => 'pastebinentries', 'action' => 'index'));	
?>

<script>
<?php $this->start('script'); ?>	
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
<?php $this->end(); ?>
</script>


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
