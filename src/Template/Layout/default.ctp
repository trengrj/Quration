<?php
use Cake\Routing\Router;
use Cake\Core\Configure;
use Cake\Controller\Component\AuthComponent;
use Users\Model\Entity\User;
?>
<!DOCTYPE html>
<html lang="en">
<?= $this->Element('Layout' . DS . 'head') ?>
<body>

    <?php echo $this->fetch('content'); ?>

    <?=$this->element('Layout' . DS . 'foot') ?>

</body>
</html>
