<?php
function route($url) {
    switch ($url[0])
        {
            case "":
            case "uvod":
                return '/uvod.php';
            case "grafy":
                return '/grafy.php';
            case "hardware":
                return '/hardware.php';
            case "site":
                return '/site.php';
            case "ukladani-dat":
                return '/ukladani-dat.php';   
            case "ciselne-soustavy":
                return '/ciselne-soustavy.php'; 
            case "hra3":
                return '/hra3Novy.php'; 
            case "hra1":
                return '/hra1.php';
            case "hra4":
                return '/hra4Novy.php';
            case "hra2":
                return '/hra2.php';
            case "hry":
                return '/hry.php';  
            case "hra1-vlastni-graf":
                return '/creatingOwnGraph.php';
            case "hra1-napis-json":
                return '/write-json.php';  
            default:
                return '/error.php';
        }
    }
?>