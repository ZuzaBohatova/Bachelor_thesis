<?php
    function error($code, $popis)
    {
        include __DIR__ . '/../vzory/errorVzor.php';
        http_response_code($code);
    }