<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
    
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
	<title>
		<?php //echo $cakeDescription ?>
		<?php echo $this->fetch('title'); ?>
	</title>
	
	<!--Google Ad sense -->
	<script type="text/javascript">
                google_ad_client = "ca-pub-9653430912934834";
                google_ad_slot = "2946828029";
                google_ad_width = 728;
                google_ad_height = 90;
                google_ad_client</script>
        <!-- Ad1 -->
        <script type="text/javascript"
        src="//pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>
	<!--################# -->
        
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
                echo $this->Html->css('1-col-portfolio');
                echo $this->Html->css('bootstrap.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
                echo $this->Html->script('jquery');
                echo $this->Html->script('bootstrap.min');
	?>
</head>
<body>
	<div id="container">
                <!-- Navigation -->
                <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                    <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/">Pastebin scraper</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li>
                                <?php 
                                    if($userRole == 'admin') {
                                        echo $this->Html->link('AdminPage', 
                                                                array(
                                                                    'controller' => 'users', 
                                                                    'action' => 'index')
                                                            );
                                    }
                                ?>
                            </li>
                            <li>
                                <?php echo $this->Html->link('Search for Post', 
                                                            array('controller' => 'pastebinentries',
                                                                  'action' => 'search')
                                                            ); 
                                ?>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container -->
                </nav>
            
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
