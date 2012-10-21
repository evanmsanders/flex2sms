<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Pager to SMS</title>
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
          <a class="brand" href="#">Pager to SMS</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link">Username</a>
            </p>
            <ul class="nav">
              <li><?php echo $this->Html->link('<i class="icon-home icon-white"></i> Home', '/', array('escape'=>false)); ?></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><?php echo $this->Html->link('Contacts', array('controller' => 'contacts', 'action' => 'index')); ?></li>
                  <li><?php echo $this->Html->link('<i class="icon-plus"></i> Create', array('controller' => 'contacts', 'action' => 'create'), array('escape'=>false)); ?></li>
                  <li><?php echo $this->Html->link('<i class="icon-list"></i> List', array('controller' => 'contacts', 'action' => 'index'), array('escape'=>false)); ?></li>
                </ul>
              </li>
              <li><?php echo $this->Html->link('Logs', array('controller' => 'messages', 'action' => 'index')); ?></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


    <div class="container">
        <title><?php echo $title_for_layout; ?> : Flex2SMS</title>
    </head>
    <body>
        <header id="header">
            <p>Menu</p>
        </header>
        <div id="content">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
        
    </div> <!-- /container -->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <?php echo $this->Html->script('bootstrap.min.js'); ?>
</body>
</html>