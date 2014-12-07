<!-- File: /app/View/Posts/index.ctp -->

<?php
$this->extend('/Common/view');

$this->assign('title', 'TITLE HERE');

?>


<?php $this->start('sidebar');?>
<li>
Item 1
</li>
<li>
Item 2
</li>
<li>
Item 3
</li>
<?php $this->end(); ?>


<h1>Blog posts</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Created</th>
    </tr>

    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php //foreach ($posts as $post): ?>
    <tr>
        <td><?php //echo $post['Post']['id']; ?></td>
        <td>
            <?php //echo $this->Html->link($post['Post']['title'],
//array('controller' => 'posts', 'action' => 'view', $post['Post']['id'])); ?>
        </td>
        <td><?php //echo $post['Post']['created']; ?></td>
    </tr>
    <?php //endforeach; ?>
    <?php //unset($post); ?>
</table>


<?php $this->append('sidebar'); ?>
<li>
Item 4
</li>
<li>
Item 5
</li>
<li>
Item 6
</li>
<?php $this->end(); ?>