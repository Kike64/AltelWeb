
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


<div id="header">
    <ul>

        <li><a href="<?php echo constant('URL'); ?>logout">Logout</a></li>
    </ul>

    <div id="profile-container">
        <a href="<?php echo constant('URL');?>user">
            <div class="name"><?php echo $user->getUsername(); ?></div>
            
        </a>
        <div id="submenu">
            <ul>
                <li><a href="<?php echo constant('URL'); ?>user">Ver perfil</a></li>
                <li class='divisor'></li>
                <li><a href="<?php echo constant('URL'); ?>logout">Cerrar sesión</a></li>
            </ul>
        </div>
    </div>
</div>
