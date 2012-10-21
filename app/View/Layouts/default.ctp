<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
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
        <footer id="footer">
            <p>Flex2SMS Footer stuff.</p>
        </footer>
    </body>
</html>
