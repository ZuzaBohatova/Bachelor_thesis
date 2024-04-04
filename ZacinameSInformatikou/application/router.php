<?php
function route($url) {
    switch ($url[0])
        {
            case "":
            case "uvod":
                return '/pages/prologue.html';
            case "hry":
                return '/pages/games.html';
            case "grafy":
                return '/pages/graphs.html';
            case "grafy-hra":
                return '/pages/graphs-game.html'; 
            case "grafy-vlastni-graf":
                return '/pages/graphs-creating-own-graph.html';
            case "grafy-napis-json":
                return '/pages/graphs-write-json.php';      
            case "ciselne-soustavy":
                return '/pages/number-systems.html'; 
            case "ciselne-soustavy-hra":
                return '/pages/number-systems-game.html';
            case "ukladani-dat":
                return '/pages/data-storage.html';   
            case "ukladani-dat-hra":
                return '/pages/data-storage-game.html'; 
            case "hardware":
                return '/pages/hardware.html';
            case "hardware-hra":
                return '/pages/hardware-game.html';
            case "informacni-systemy":
                return '/pages/information-systems.html';
            case "informacni-systemy-hra":
                return '/pages/information-systems-game.html';
            default:
                return '/pages/error.php';
        }
    }
?>