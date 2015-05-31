
<script src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<?php
$this->append('script', $this->Html->script([
    //'jquery-2.1.3.min',
    //'bootstrap.min',
    'threejs/three.min',
    'threejs/StereoEffect',
    'threejs/DeviceOrientationControls',
    'threejs/OrbitControls',
    'has',
    'DetectScreenSize',
    'Kaikai',
    'audio',
    'util',
    'main',
    //'app',
]));
?>

<script>

    var BACK = {
        'slug': 'back',
        'href': '#',
        'preview': 'static/img/back.png'
    };
    var DEMOS = [];

    /*var SCENE = 'static/photospheres/hangar.jpg';

    var DEMOS = [
        {
            'slug': 'shop1',
            'href': '#',
            'preview': 'static/img/paper-bag.svg'
        },
        {
            'slug': 'compass1',
            'href': '#',
            'preview': 'static/img/compas.svg'
        },
        {
            'slug': 'smiley1',
            'href': '#',
            'preview': 'static/img/gift-box.svg'
        },
        {
            'slug': 'shop2',
            'href': '#',
            'preview': 'static/img/paper-bag.svg'
        },
        {
            'slug': 'compass2',
            'href': '#',
            'preview': 'static/img/compas.svg'
        },
        {
            'slug': 'smiley2',
            'href': '#',
            'preview': 'static/img/gift-box.svg'
        },
        {
            'slug': 'shop3',
            'href': '#',
            'preview': 'static/img/paper-bag.svg'
        },
        {
            'slug': 'compass3',
            'href': '#',
            'preview': 'static/img/compas.svg'
        },
        {
            'slug': 'smiley3',
            'href': '#',
            'preview': 'static/img/gift-box.svg'
        },
    ];
    */
</script>
<?php
use Cake\Utility\Inflector;

$controller = Inflector::variable($this->request->params['controller']);
$action = Inflector::variable($this->request->params['action']);

if (is_readable(WWW_ROOT . 'js' . DS . ($path = 'c' . DS . $controller) . '.js')) {
    $this->append('script', $this->Html->script($path));
}

if (is_readable(WWW_ROOT . 'js' . DS . ($path = 'c' . DS . $controller . DS . $action) . '.js')) {
    $this->append('script', $this->Html->script($path));
}
?>
<?= $this->fetch('script') ?>
