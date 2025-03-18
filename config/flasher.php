<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default PHPFlasher driver
    |--------------------------------------------------------------------------
    | Este é o driver padrão usado pelo PHPFlasher.
    */
    'default' => 'toastr',

    /*
    |--------------------------------------------------------------------------
    | Opções de estilo das notificações
    |--------------------------------------------------------------------------
    | Aqui você pode configurar o estilo das notificações.
    */
    'themes' => [
        'toastr' => [
            'options' => [
                'progressBar' => true,
                'closeButton' => true,
                'timeOut' => 5000,
                'positionClass' => 'toast-top-right',
                'preventDuplicates' => false,
                'showMethod' => 'fadeIn',
                'hideMethod' => 'fadeOut',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Global PHPFlasher options
    |--------------------------------------------------------------------------
    | Estas são opções globais do PHPFlasher que se aplicam a todos os drivers.
    */
    'options' => [
        'timer' => 5000,
        'position' => 'top-right',
        'dismiss' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Auto register service provider
    |--------------------------------------------------------------------------
    | Se você definir isso como true, o PHPFlasher será registrado automaticamente.
    */
    'auto_register' => true,

    /*
    |--------------------------------------------------------------------------
    | Config que permitirá o funcionamento correto do pacote
    |--------------------------------------------------------------------------
    */
    'scripts' => true,
    'styles' => true,
    'flash_bag' => true,
]; 