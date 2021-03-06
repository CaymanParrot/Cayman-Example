<?php
/**
 * Sample file for HTTP application settings
 */

// All factory entries can be replaced with a callable or an anonymous/lambda function
// All dependencies are references to other managers/services

return [
    
    'application' => [
        'name'       => 'Example',
        'version'    => 'v1.0',
        'api_url'    => 'https://[host-code].example.com',
        'api_prefix' => '/api/v1',
        'app_url'    => 'https://[host-code].example.com',
        'services'   => [
            'namespace' => '\\Example\\Application\\Service',
        ],
        'host_account_id' => 'random-uuid',// ID of host account
    ],
    
    'services' => [
        
    ],
    
    'managers' => [
        
//        'type' => [
//            'default' => [// ID of manager, there can be multiple instances of same type of manager
//                'factory'  => '\\Namespace\\Manager-Class::newManager',// any callable
//                'settings' => [
//                    'managers' => [// dependency references
//                        'another-type' => 'default',// ID of other manager with type as key
//                        // by default any manager can use 'default' instance of any other manager
//                    ],
//                ],
//            ],
//        ],
        
        'asset' => [
            'default' => [
                'factory'  => '\\Cayman\\Manager\\AssetManager\\LocalDisk::newManager',
                'settings' => [
                    'path' => __DIR__ . '/../assets/',
                    'url'  => 'https://app.example.com/assets/',
                ],
            ],
        ],
        
        'cache' => [
            'default' => [
                'factory'  => '\\Cayman\\Manager\\CacheManager\\Redis::newManager',
                'settings' => [
                    'default_life_time' => 300, // seconds
                ],
            ],
        ],

        'db' => [
            'default' => [
                'factory'  => '\\Cayman\\Manager\\DbManager\\PostgreSql::newManager',
                'settings' => [
                    'catalog' => 'dbname',
                    'schema'  => 'public',
                ],
            ],
        ],
        
        'email' => [
            'default' => [
                'factory'  => '\\Cayman\\Manager\\EmailManager\\PhpMail::newManager',
                'settings' => [
                    'smtp' => [
                        'servers'  => 'smtp1.example.com;smtp2.example.com',// Specify main and backup SMTP servers
                        'port'     => '587',
                        'tls'      => true,
                        'auth'     => true,
                        'username' => 'abcd',
                        'password' => 'efghhijklmnopqrst',
                    ],
                    'from_email' => 'abc@example.com',
                    'from_name'  => 'Admin',
                ],
            ],
        ],
        
        'entity' => [
            'default' => [
                'factory'  => '\\Cayman\\Manager\\EntityManager\\PostgreSql::newManager',
                'settings' => [

                ],
            ],
        ],
        
        'event' => [
            'default' => [
                'factory'  => '\\Cayman\\Manager\\EventManager\\SimpleEventManager::newManager',
                'settings' => [

                ],
            ],
        ],
        
        'filter' => [
            'default' => [
                'factory'  => '\\Cayman\\Manager\\FilterManager\\PhpFilter::newManager',
                'settings' => [

                ],
            ],
        ],
        
        'identity' => [
            'default' => [
                'factory'  => '\\Cayman\\Manager\\IdentityManager\\DbIdentityManager::newManager',
                'settings' => [

                ],
            ],
        ],
        
        'locale' => [
            'default' => [
                'factory'  => '\\Cayman\\Manager\\LocaleManager\\DbLocaleManager::newManager',
                'settings' => [

                ],
            ],
        ],

        'log' => [
            'default' => [
                'factory'  => '\\Cayman\\Manager\\LogManager\\PhpLog::newManager',
                'settings' => [
                    'file' => __DIR__ . '/../logs/'.date('Ymd').'.log',
                ],
            ],
        ],
        
        'pdo' => [
            'default' => [
                'factory'  => '\\Cayman\\Manager\\PdoFactory::newPdo',
                'settings' => [
                    'dsn'      => 'pgsql:host=127.0.0.1;port=5432;dbname=testdb',
                    'username' => 'admin',
                    'password' => 'securepassword',
                ],
            ],
        ],
        
        'redis' => [
            'default' => [
                'factory'  => '\\Cayman\\Manager\\RedisFactory::newRedis',
                'settings' => [
                    'servers' => [
                        ['127.0.0.1'],
                    ],
                ],
            ],
        ],
        
        'queue' => [
            'default' => [
                'factory'  => '\\Cayman\\Manager\\QueueManager\\Redis::newManager',
                'settings' => [

                ],
            ],
        ],
        
    ],
];
