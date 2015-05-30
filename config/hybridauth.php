<?php
use Cake\Core\Configure;

$config['HybridAuth'] = [
    'providers'  => [
        "Facebook" => array( // 'key' is your twitter application consumer key
            "enabled" => true,
            "keys"    => [
                "id" => "646048905495898",
                "secret" => "7ef4e0abe229609a7f0f57224ed79e75",
            ],
            "scope" => "email",
        ),

    ],
    'debug_mode' => Configure::read('debug'),
    'debug_file' => LOGS . 'hybridauth.log',
];
