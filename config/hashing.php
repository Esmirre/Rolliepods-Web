<?php

return [
    'driver' => env('HASH_DRIVER', 'bcrypt'),
    'bcrypt' => [
        'rounds' => env('BCRYPT_ROUNDS', 12),
        'verify' => true,
        'limit' => 0,
    ],
    'argon' => [
        'memory' => 65536,
        'threads' => 4,
        'time' => 4,
    ],
];
