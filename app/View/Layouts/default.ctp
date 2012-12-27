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
        <?php echo $this->Html->css('font-awesome'); ?>
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
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <?php echo $this->Html->link('Flex2SMS', '/', array('escape'=>false,'class'=>'brand')); ?>
                    <div class="nav-collapse collapse">
                        <p class="navbar-text pull-right">Logged in as <a href="#" class="navbar-link">Admin</a></p>
                        <ul class="nav">
                            <li><?php echo $this->Html->link('<i class="icon-home icon-white"></i> Home', '/', array('escape'=>false)); ?></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-group icon-white"></i> Contacts<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><?php echo $this->Html->link('<i class="icon-plus"></i> New Contact', array('controller' => 'contacts', 'action' => 'add'), array('escape'=>false)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="icon-list"></i> List Contacts', array('controller' => 'contacts', 'action' => 'index'), array('escape'=>false)); ?></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog icon-white"></i> Services<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><?php echo $this->Html->link('<i class="icon-plus"></i> New Service', array('controller' => 'services', 'action' => 'add'), array('escape'=>false)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="icon-list"></i> List Services', array('controller' => 'services', 'action' => 'index'), array('escape'=>false)); ?></li>
                                </ul>
                            </li>
                            
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-wrench icon-white"></i> Settings<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li class="nav-header"><i class="icon-fire"></i> Brigades</li>
                                    <li><?php echo $this->Html->link('<i class="icon-plus"></i> New brigade', array('controller' => 'brigades', 'action' => 'add'), array('escape'=>false)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="icon-list"></i> List brigades', array('controller' => 'brigades', 'action' => 'index'), array('escape'=>false)); ?></li>
                                    <li class="divider"></li>
                                    <li class="nav-header"><i class="icon-hdd"></i> Modems</li>
                                    <li><?php echo $this->Html->link('<i class="icon-plus"></i> New modem', array('controller' => 'modems', 'action' => 'add'), array('escape'=>false)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="icon-list"></i> List modems', array('controller' => 'modems', 'action' => 'index'), array('escape'=>false)); ?></li>
                                    <li class="divider"></li>
                                    <li class="nav-header"><i class="icon-tags"></i> Keywords</li>
                                    <li><?php echo $this->Html->link('<i class="icon-plus"></i> New keyword', array('controller' => 'keywords', 'action' => 'add'), array('escape'=>false)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="icon-list"></i> List keywords', array('controller' => 'keywords', 'action' => 'index'), array('escape'=>false)); ?></li>
                                    <li class="divider"></li>
                                    <li class="nav-header"><i class="icon-list-alt"></i> Capcodes</li>
                                    <li><?php echo $this->Html->link('<i class="icon-plus"></i> New capcode', array('controller' => 'capcodes', 'action' => 'add'), array('escape'=>false)); ?></li>
                                    <li><?php echo $this->Html->link('<i class="icon-list"></i> List capcodes', array('controller' => 'capcodes', 'action' => 'index'), array('escape'=>false)); ?></li>
                                </ul>
                                </li>
                            </li>
                            <li><?php echo $this->Html->link('<i class="icon-envelope icon-white"></i> SMS Logs', array('controller' => 'messages', 'action' => 'index'), array('escape'=>false)); ?></li>
                            <li><?php echo $this->Html->link('<i class="icon-list icon-white"></i> Scanner', array('controller' => 'scanners', 'action' => 'index'), array('escape'=>false)); ?></li>
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
