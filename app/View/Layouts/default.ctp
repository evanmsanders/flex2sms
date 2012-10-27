<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title_for_layout; ?> - Flex2SMS</title>
        <?php echo $this->Html->css('bootstrap.min'); ?>
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
                .sidebar-nav {
                padding: 9px 0;
            }
        </style>
        <?php echo $this->Html->css('bootstrap-responsive'); ?>
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <?php echo $this->Html->script('bootstrap.min.js'); ?>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Flex2SMS</a>
                    <div class="nav-collapse collapse">
                        <p class="navbar-text pull-right">Logged in as <a href="#" class="navbar-link">Username</a></p>
                        <ul class="nav">
                            <li><?php echo $this->Html->link('<i class="icon-home icon-white"></i> Home', '/', array('escape'=>false)); ?></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i> Contacts<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                <li><?php echo $this->Html->link('<i class="icon-plus"></i> Add', array('controller' => 'contacts', 'action' => 'add'), array('escape'=>false)); ?></li>
                                <li><?php echo $this->Html->link('<i class="icon-list"></i> List', array('controller' => 'contacts', 'action' => 'index'), array('escape'=>false)); ?></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-fire icon-white"></i> Brigades<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                <li><?php echo $this->Html->link('<i class="icon-plus"></i> Add', array('controller' => 'brigades', 'action' => 'add'), array('escape'=>false)); ?></li>
                                <li><?php echo $this->Html->link('<i class="icon-list"></i> List', array('controller' => 'brigades', 'action' => 'index'), array('escape'=>false)); ?></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Modems<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                <li><?php echo $this->Html->link('<i class="icon-plus"></i> Add', array('controller' => 'modems', 'action' => 'add'), array('escape'=>false)); ?></li>
                                <li><?php echo $this->Html->link('<i class="icon-list"></i> List', array('controller' => 'modems', 'action' => 'index'), array('escape'=>false)); ?></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                <li><?php echo $this->Html->link('<i class="icon-plus"></i> Add', array('controller' => 'services', 'action' => 'add'), array('escape'=>false)); ?></li>
                                <li><?php echo $this->Html->link('<i class="icon-list"></i> List', array('controller' => 'services', 'action' => 'index'), array('escape'=>false)); ?></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Capcodes<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                <li><?php echo $this->Html->link('<i class="icon-plus"></i> Add', array('controller' => 'capcodes', 'action' => 'add'), array('escape'=>false)); ?></li>
                                <li><?php echo $this->Html->link('<i class="icon-list"></i> List', array('controller' => 'capcodes', 'action' => 'index'), array('escape'=>false)); ?></li>
                                </ul>
                            </li>
                            <li><?php echo $this->Html->link('<i class="icon-list-alt icon-white"></i> Message Logs', array('controller' => 'messages', 'action' => 'index'), array('escape'=>false)); ?></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container">
            <div id="content">
                <?php echo $this->Session->flash('success', array('element' => 'success')); ?>
                <?php echo $this->Session->flash('error', array('element' => 'error')); ?>
                <h1><?php echo $title_for_layout; ?></h1>
                <?php echo $this->fetch('content'); ?>
            </div>
        </div> <!-- /container -->
    </body>
</html>
