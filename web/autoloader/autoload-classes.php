<?php
spl_autoload_register(function ($className) {
    $dir = '../../src/classes';

    $folders = [
        '/database/',
        '/cars/',
        '/clients/',
        '/rents/',
        '/users/',
        '/messages/'
    ];
    $ext = '.php';

    foreach ($folders as $folder) {
        $fileName = $dir . $folder . $className . $ext;

        if (file_exists($fileName)) {
            include_once($fileName);
        }
    }
});
