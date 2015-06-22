<!-- app/View/Users/edit.ctp -->
<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>   
        
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Edit User
                </h1>
            </div>
        </div>
        
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

