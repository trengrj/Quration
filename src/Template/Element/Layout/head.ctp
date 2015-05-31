<?php
use Cake\Routing\Router;
use Cake\Utility\Inflector;
use Cake\Core\Configure;
?>
<head>
    <base href="<?= Router::url("/", true) ?>" />
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui">
    <meta name="mobile-web-app-capable" content="yes">
    <?= $this->fetch('meta') ?>
    <title><?= $this->fetch('title') ?> - <?= Configure::read('Site.name') ?></title>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png" />
    <?php
    $this->append('css', $this->Html->css([
        'bootstrap.min',
        'app.css',
    ]));

    $controller = Inflector::variable($this->request->params['controller']);
    $action = Inflector::variable($this->request->params['action']);

    if (is_readable(WWW_ROOT . 'css' . DS . ($path = 'c' . DS . $controller . '.css'))) {
        $this->append('css', $this->Html->css($path));
    }

    if (is_readable(WWW_ROOT . 'css' . DS . ($path = 'c' . DS . $controller . DS . $action . '.css'))) {
        $this->append('css', $this->Html->css($path));
    }
    ?>
    <?= $this->fetch('css') ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
