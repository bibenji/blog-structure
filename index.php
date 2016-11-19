<?php

    include('config/config_bd.php');
    
    

    function chargerClasse($classe) {        
        //echo __DIR__ . '/' . str_replace('\\', '/', $classe) . '.class.php';
        
        // require $classe . '.class.php';
        require __DIR__ . '/' . str_replace('\\', '/', $classe) . '.class.php';
    }

    spl_autoload_register('chargerClasse');

    if (isset($_GET['redirection']))
    {
        include('modules/redirection/redirection.php');
    }
    elseif (isset($_GET['admin']))
    {
        include('modules/admin/admin.php');
    }
    else
    {
        include('web/layout.php');
    }

?>