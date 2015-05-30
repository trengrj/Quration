<?php
use Cake\Core\Configure;
?>
<!-- navigation bar -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only"><?= __('Toggle navigation') ?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/">
            <img class="navbar_logo" src="/img/ch_logo/NAVBAR_chlogo.png"></a>

        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($userInfo)): ?>

                <li><a href="/search?suburb=&activity_id=&time=">Find Classes</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= __('My Account') ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?= $this->Html->link(__('My Account'), ['controller' => 'Bookings', 'action' => 'index', 'plugin' => 'Bookings']) ?></li>
                        <li><?= $this->Html->link(__('Log Out'), ['controller' => 'Users', 'action' => 'logout', 'plugin' => 'Users']) ?></li>
                    </ul>
                </li>
                <?php else: ?>
                <li class="navbar_trial"><?= $this->Html->link(__('Start Your Trial'), ['controller' => 'Users', 'action' => 'register', 'plugin' => 'Users']) ?></li>

                <li><?= $this->Html->link(__('How It Works'), ['controller' => 'Pages', 'action' => 'display', 'howitworks', 'plugin' => false]) ?></li>
                <li><?= $this->Html->link(__('FAQ'), ['controller' => 'Pages', 'action' => 'display', 'faq', 'plugin' => false]) ?></li>

                <li><?= $this->Html->link(__('Log In'), ['controller' => 'Users', 'action' => 'login', 'plugin' => 'Users']) ?></li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
