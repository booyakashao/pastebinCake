<!-- app/View/Users/edit.ctp -->
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Edit User'); ?></legend>
        <?php 
	echo $this->Form->input('username', array('default' => $user['User']['username']));
        echo $this->Form->input('password');
        echo $this->Form->input('role', array(
            'options' => array(
				'admin' => 'Admin', 
				'author' => 'Author',
				'reader' => 'Reader'
				),
	     'default' => $user['User']['role']
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

