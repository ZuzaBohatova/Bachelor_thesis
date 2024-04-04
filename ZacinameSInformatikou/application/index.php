<?php
    require_once "router.php"; 

    function main()
    {
        if (!isset($_SERVER['PATH_INFO']))
        {
            header('Location: index.php/', false, 303);
            return;
        }
        
        $url = explode('/', substr($_SERVER['PATH_INFO'], 1));
        return route($url);
        
    }
    require_once __DIR__ . '/pages/header.html';
    require_once __DIR__ . main();
    require_once __DIR__ . '/pages/footer.html';
?>
