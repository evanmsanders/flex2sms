<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="<?php echo $this->Html->url('/'); ?>favicon.ico">
        <title><?php echo $title_for_layout; ?> - Flex2SMS</title>
        <script>BASE_PATH = '<?php echo Router::url('/', true); ?>';</script>
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
        <?php echo $this->Html->css('font-awesome.min'); ?>
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <?php echo $this->Html->script('bootstrap.min.js'); ?>
        <?php echo $this->Html->script('bootstrap-typeahead.js'); ?>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="fa fa-bar"></span>
                        <span class="fa fa-bar"></span>
                        <span class="fa fa-bar"></span>
                    </a>
                    <?php echo $this->Html->link('Flex2SMS', '/', array('escape'=>false,'class'=>'brand')); ?>
                    <div class="nav-collapse collapse">
                        <p class="navbar-text pull-right">
                            <?php if($this->Session->check('Auth.User.id')): ?>
                            Logged in as <?php echo $this->Session->read('Auth.User.username'); ?> &mdash; <?php echo $this->Html->link('Log out', array('controller' => 'users', 'action' => 'logout')); ?>
                            <?php else: ?>
                            <?php echo $this->Html->link('Log in', array('controller' => 'users', 'action' => 'login')); ?>
                            <?php endif; ?>
                        </p>
                        <ul class="nav">
                            <li><?php echo $this->Html->link('<i class="fa fa-home fa-inverse"></i> Home', '/', array('escape'=>false)); ?></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-group fa-inverse"></i> Contacts<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i> New Contact', array('controller' => 'contacts', 'action' => 'add'), array('escape'=>false)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-list"></i> List Contacts', array('controller' => 'contacts', 'action' => 'index'), array('escape'=>false)); ?></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog fa-inverse"></i> Services<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i> New Service', array('controller' => 'services', 'action' => 'add'), array('escape'=>false)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-list"></i> List Services', array('controller' => 'services', 'action' => 'index'), array('escape'=>false)); ?></li>
                                </ul>
                            </li>
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench fa-inverse"></i> Settings<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-header"><i class="fa fa-building-o"></i> Brigades</li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i> New brigade', array('controller' => 'brigades', 'action' => 'add'), array('escape'=>false)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-list"></i> List brigades', array('controller' => 'brigades', 'action' => 'index'), array('escape'=>false)); ?></li>
                                    <li class="divider"></li>
                                    <li class="nav-header"><i class="fa fa-hdd-o"></i> Modems</li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i> New modem', array('controller' => 'modems', 'action' => 'add'), array('escape'=>false)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-list"></i> List modems', array('controller' => 'modems', 'action' => 'index'), array('escape'=>false)); ?></li>
                                    <li class="divider"></li>
                                    <li class="nav-header"><i class="fa fa-tags"></i> Keywords</li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i> New keyword', array('controller' => 'keywords', 'action' => 'add'), array('escape'=>false)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-list"></i> List keywords', array('controller' => 'keywords', 'action' => 'index'), array('escape'=>false)); ?></li>
                                    <li class="divider"></li>
                                    <li class="nav-header"><i class="fa fa-list-alt"></i> Capcodes</li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i> New capcode', array('controller' => 'capcodes', 'action' => 'add'), array('escape'=>false)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-list"></i> List capcodes', array('controller' => 'capcodes', 'action' => 'index'), array('escape'=>false)); ?></li>
                                    <li class="divider"></li>
                                    <li class="nav-header"><i class="fa fa-user"></i> Users</li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-plus-circle"></i> New User', array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-list"></i> List Users', array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?></li>
                                </ul>
                                </li>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-list fa-inverse"></i> Logs<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><?php echo $this->Html->link('<i class="fa fa-list"></i> Scanner logs', array('controller' => 'scanners', 'action' => 'index'), array('escape'=>false)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-phone"></i> SMS logs', array('controller' => 'messages', 'action' => 'index'), array('escape'=>false)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-dot-circle-o"></i> Clickatell logs', array('controller' => 'clickatellLogs', 'action' => 'index'), array('escape'=>false)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="fa fa-envelope-o"></i> Email logs', array('controller' => 'emailLogs', 'action' => 'index'), array('escape'=>false)); ?></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container">
            <div id="content">
                <h1><?php if(!isset($page_heading)) { echo $title_for_layout;} else {echo $page_heading; } ?></h1>
                <?php echo $this->Session->flash('success', array('element' => 'success')); ?>
                <?php echo $this->Session->flash('error', array('element' => 'error')); ?>
                <?php echo $this->Session->flash('auth', array('element' => 'auth')); ?>
                <?php echo $this->fetch('content'); ?>
            </div>
            <div style="clear:both;">
                <button type="button" class="btn btn-info pull-right btn-mini" data-toggle="collapse" data-target="#queriesDump">
                  Show queries
                </button>
                <div id="queriesDump" class="collapse">
                    <?php echo $this->element('sql_dump'); ?>
                </div>
            </div>
        </div> <!-- /container -->
    </body>
</html>
