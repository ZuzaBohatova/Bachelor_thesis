<?php
    
    function main()
    {
        if (!isset($_SERVER['PATH_INFO']))
        {
            header('Location: index.php/', false, 303);
            return;
        }
        
        $url = explode('/', substr($_SERVER['PATH_INFO'], 1));
       
        switch ($url[0])
        {
            case "":
            case "uvod":
                require_once __DIR__ . '/uvod.php';
                break;
            case "grafy":
                require_once __DIR__ . '/grafy.php';
                break;
            case "hardware":
                require_once __DIR__ . '/hardware.php';
                break;
            case "site":
                require_once __DIR__ . '/site.php';
                break;
            case "ukladani-dat":
                require_once __DIR__ . '/ukladani-dat.php';
                break;   
            case "ciselne-soustavy":
                require_once __DIR__ . '/ciselne-soustavy.php';
                break; 
            case "hra3":
                require_once __DIR__ . '/hra3Novy.php';
                break; 
            case "hra4":
                require_once __DIR__ . '/hra4.php';
                break;
            case "hry":
                require_once __DIR__ . '/hry.php';
                break;  
            default:
                error(404, "Page not found");
                break;
        }
    }

    require_once __DIR__ . '/header.php';
    main();
    require_once __DIR__ . '/footer.php';
?>