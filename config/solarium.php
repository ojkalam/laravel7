<?php

return [
    'endpoint' => [
        'localhost' => [
            'host' => env('SOLR_HOST', '127.0.0.1'),
            'port' => env('SOLR_PORT', '8983'),
            'path' => env('SOLR_PATH', '/solr/'),
            'core' => env('SOLR_CORE', 'Ecom_search')
        ]
    ]
];
