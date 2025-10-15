<?php

return [
    'layout' => [
        'styles' => [
            [
                'id'        => 'header',
                'href'      => '/css/header.css',
                'priority'  => 1000,
            ],
            [
                'id'        => 'footer',
                'href'      => '/css/footer.css',
                'priority'  => 1000,
            ],
            [
                'id'        => 'main',
                'href'      => '/css/main.css',
                'priority'  => 10000,
            ],
            [
                'id'        => 'nav_panel',
                'href'      => '/css/nav_panel.css',
                'priority'  => 1000,
            ],
            [
                'id'        => 'modal',
                'href'      => '/css/models/modal.css',
                'priority'  => 500,
            ],
            [
                'id'        => 'breadcrumbs',
                'href'      => '/css/models/breadcrumbs.css',
                'priority'  => 600,
            ],
            [
                'id'        => 'icons',
                'href'      => '/css/models/icons.css',
                'priority'  => 500,
            ],
            [
                'id'        => 'animations',
                'href'      => '/css/models/animations.css',
                'priority'  => 500,
            ],
            [
                'id'        => 'colors',
                'href'      => '/css/models/colors.css',
                'priority'  => 500,
            ],
        ],
        'scripts' => [
            [
                'id'        => 'jQuery',
                'src'       => 'https://code.jquery.com/jquery-3.7.1.min.js',
                'priority'  => 0,
                'version'   => '3.7.1',
            ],
            [
                'id'        => 'jQuery_extension__data_attributes',
                'src'       => '/js/jQueryExtensions/DataAttributes.js',
                'priority'  => 1,
                'version'   => '1.0.0',
            ],
            [
                'id'        => 'main',
                'src'       => '/js/main.js',
                'priority'  => 10000,
            ],
            [
                'id'        => 'nav_panel',
                'src'       => '/js/models/nav_panel.js',
                'priority'  => 500,
            ],
            [
                'id'        => 'modal',
                'src'       => '/js/models/modal.js',
                'priority'  => 500,
            ],
        ]
    ],
    'form' => [
        'styles' => [
            [
                'id'        => 'form__core',
                'href'      => '/css/models/form/core.css',
                'priority'  => 500,
            ],
            [
                'id'        => 'form__label',
                'href'      => '/css/models/form/label.css',
                'priority'  => 500,
            ],
            [
                'id'        => 'form__button',
                'href'      => '/css/models/form/button.css',
                'priority'  => 500,
            ],
            [
                'id'        => 'form__checkbox',
                'href'      => '/css/models/form/checkbox.css',
                'priority'  => 500,
            ],
            [
                'id'        => 'form__datetime',
                'href'      => '/css/models/form/datetime.css',
                'priority'  => 500,
            ],
            [
                'id'        => 'form__edited_string',
                'href'      => '/css/models/form/edited_string.css',
                'priority'  => 500,
            ],
            [
                'id'        => 'form__file',
                'href'      => '/css/models/form/file.css',
                'priority'  => 500,
            ],
            [
                'id'        => 'form__number',
                'href'      => '/css/models/form/number.css',
                'priority'  => 500,
            ],
            [
                'id'        => 'form__password',
                'href'      => '/css/models/form/password.css',
                'priority'  => 500,
            ],
            [
                'id'        => 'form__radio',
                'href'      => '/css/models/form/radio.css',
                'priority'  => 500,
            ],
            [
                'id'        => 'form__select',
                'href'      => '/css/models/form/select.css',
                'priority'  => 500,
            ],
            [
                'id'        => 'form__text',
                'href'      => '/css/models/form/text.css',
                'priority'  => 500,
            ],
            [
                'id'        => 'form__textarea',
                'href'      => '/css/models/form/textarea.css',
                'priority'  => 500,
            ],
            [
                'id'        => 'form__togglebox',
                'href'      => '/css/models/form/togglebox.css',
                'priority'  => 500,
            ],
            [
                'id'        => 'icons',
                'href'      => '/css/models/icons.css',
                'priority'  => 500,
            ],
        ],
        'scripts' => [
            [
                'id'        => 'jQuery',
                'src'       => 'https://code.jquery.com/jquery-3.7.1.min.js',
                'priority'  => 0,
                'version'   => '3.7.1',
            ],
            [
                'id'        => 'jQuery_extension__data_attributes',
                'src'       => '/js/jQueryExtensions/DataAttributes.js',
                'priority'  => 1,
                'version'   => '1.0.0',
            ],
            [
                'id'        => 'form',
                'src'       => '/js/models/form.js',
                'priority'  => 500,
            ],
        ]
    ],
    'ckeditor' => [
        'styles' => [
            [
                'id'            => 'ckeditor',
                'href'          => '/js/ckeditor5-43.2.0/ckeditor5/ckeditor5.css',
                'priority'      => 500,
            ],
            [
                'id'            => 'ckeditor_custom',
                'href'          => '/css/models/form/ckeditor.css',
                'priority'      => 500,
            ],
        ],
        'scripts' => [
            [
                'id'            => 'jQuery',
                'src'           => 'https://code.jquery.com/jquery-3.7.1.min.js',
                'priority'      => 0,
                'version'       => '3.7.1',
            ],
            [
                'id'            => 'ckeditor_init',
                'src'           => '/js/models/ckeditor_init.js',
                'priority'      => 600,
                'version'       => '43.2.0',
                'attributes'    => [
                    'type' => 'module',
                ],
            ],
        ]
    ],
    'tabs' => [
        'styles' => [
            [
                'id'        => 'tabs',
                'href'      => '/css/models/tabs.css',
                'priority'  => 500,
            ],
        ],
        'scripts' => [
            [
                'id'        => 'jQuery',
                'src'       => 'https://code.jquery.com/jquery-3.7.1.min.js',
                'priority'  => 0,
                'version'   => '3.7.1',
            ],
            [
                'id'        => 'jQuery_extension__data_attributes',
                'src'       => '/js/jQueryExtensions/DataAttributes.js',
                'priority'  => 1,
                'version'   => '1.0.0',
            ],
            [
                'id'        => 'tabs',
                'src'       => '/js/models/tabs.js',
                'priority'  => 500,
            ],
        ]
    ],
    'accordions' => [
        'styles' => [
            [
                'id'        => 'accordions',
                'href'      => '/css/models/accordions.css',
                'priority'  => 500,
            ],
        ],
        'scripts' => [
            [
                'id'        => 'jQuery',
                'src'       => 'https://code.jquery.com/jquery-3.7.1.min.js',
                'priority'  => 0,
                'version'   => '3.7.1',
            ],
            [
                'id'        => 'jQuery_extension__data_attributes',
                'src'       => '/js/jQueryExtensions/DataAttributes.js',
                'priority'  => 1,
                'version'   => '1.0.0',
            ],
            [
                'id'        => 'accordions',
                'src'       => '/js/models/accordions.js',
                'priority'  => 500,
            ],
        ]
    ],
];