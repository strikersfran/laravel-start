<?php

return [
    'name' => 'Installer',
    
    /**
     * -----------------------------------------------------------------------
     * Server Requirements
     * -----------------------------------------------------------------------
     *
     * This is the default Laravel server requirements, you can add as many
     * as your application require, we check if the extensions is enabled
     * by loading through the array and run "extension_loaded" on it.
     */
    'requirements' => [
        'php_version' => '7.0',
        'php_extensions' => [
            'mbstring',
            'openssl',
            'pdo',
            'tokenizer',
        ]
    ],

    /**
     * -----------------------------------------------------------------------
     * Folders Permissions
     * -----------------------------------------------------------------------
     *
     * This is the default Laravel folders permissions, if your application
     * requires more permissions just add them to the array list below.
     */
    'folder_permissions' => [
        'bootstrap/cache/' => '775',
        'storage/app/' => '775',
        'storage/framework/' => '775',
        'storage/logs/' => '775',
    ],
];
