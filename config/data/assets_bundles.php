<?php

return [
    'layout' => [
        'styles' => [
            [
                'id'        => 'header',
                'href'      => asset('/css/header.css'),
                'priority'  => 1000,
            ],
            [
                'id'        => 'footer',
                'href'      => asset('/css/footer.css'),
                'priority'  => 1000,
            ],
            [
                'id'        => 'main',
                'href'      => asset('/css/main.css'),
                'priority'  => 10000,
            ],
            [
                'id'        => 'nav_panel',
                'href'      => asset('/css/nav_panel.css'),
                'priority'  => 1000,
            ],
            [
                'id'        => 'modal',
                'href'      => asset('/css/models/modal.css'),
                'priority'  => 500,
            ],
            [
                'id'        => 'breadcrumbs',
                'href'      => asset('/css/models/breadcrumbs.css'),
                'priority'  => 600,
            ],
            [
                'id'        => 'icons',
                'href'      => asset('/css/models/icons.css'),
                'priority'  => 500,
            ],
            [
                'id'        => 'animations',
                'href'      => asset('/css/models/animations.css'),
                'priority'  => 500,
            ],
            [
                'id'        => 'colors',
                'href'      => asset('/css/models/colors.css'),
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
                'src'       => asset('/js/jQueryExtensions/DataAttributes.js'),
                'priority'  => 1,
                'version'   => '1.0.0',
            ],
            [
                'id'        => 'main',
                'src'       => asset('/js/main.js'),
                'priority'  => 10000,
            ],
            [
                'id'        => 'nav_panel',
                'src'       => asset('/js/models/nav_panel.js'),
                'priority'  => 500,
            ],
            [
                'id'        => 'modal',
                'src'       => asset('/js/models/modal.js'),
                'priority'  => 500,
            ],
        ]
    ],
    'form' => [
        'styles' => [
            [
                'id'        => 'form__core',
                'href'      => asset('/css/models/form/core.css'),
                'priority'  => 500,
            ],
            [
                'id'        => 'form__label',
                'href'      => asset('/css/models/form/label.css'),
                'priority'  => 500,
            ],
            [
                'id'        => 'form__button',
                'href'      => asset('/css/models/form/button.css'),
                'priority'  => 500,
            ],
            [
                'id'        => 'form__checkbox',
                'href'      => asset('/css/models/form/checkbox.css'),
                'priority'  => 500,
            ],
            [
                'id'        => 'form__datetime',
                'href'      => asset('/css/models/form/datetime.css'),
                'priority'  => 500,
            ],
            [
                'id'        => 'form__edited_string',
                'href'      => asset('/css/models/form/edited_string.css'),
                'priority'  => 500,
            ],
            [
                'id'        => 'form__file',
                'href'      => asset('/css/models/form/file.css'),
                'priority'  => 500,
            ],
            [
                'id'        => 'form__number',
                'href'      => asset('/css/models/form/number.css'),
                'priority'  => 500,
            ],
            [
                'id'        => 'form__password',
                'href'      => asset('/css/models/form/password.css'),
                'priority'  => 500,
            ],
            [
                'id'        => 'form__radio',
                'href'      => asset('/css/models/form/radio.css'),
                'priority'  => 500,
            ],
            [
                'id'        => 'form__select',
                'href'      => asset('/css/models/form/select.css'),
                'priority'  => 500,
            ],
            [
                'id'        => 'form__text',
                'href'      => asset('/css/models/form/text.css'),
                'priority'  => 500,
            ],
            [
                'id'        => 'form__textarea',
                'href'      => asset('/css/models/form/textarea.css'),
                'priority'  => 500,
            ],
            [
                'id'        => 'form__togglebox',
                'href'      => asset('/css/models/form/togglebox.css'),
                'priority'  => 500,
            ],
            [
                'id'        => 'icons',
                'href'      => asset('/css/models/icons.css'),
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
                'src'       => asset('/js/jQueryExtensions/DataAttributes.js'),
                'priority'  => 1,
                'version'   => '1.0.0',
            ],
            [
                'id'        => 'form',
                'src'       => asset('/js/models/form.js'),
                'priority'  => 500,
            ],
        ]
    ],
    'ckeditor' => [
        'styles' => [
            [
                'id'            => 'ckeditor',
                'href'          => asset('/js/ckeditor5-43.2.0/ckeditor5/ckeditor5.css'),
                'priority'      => 500,
            ],
            [
                'id'            => 'ckeditor_custom',
                'href'          => asset('/css/models/form/ckeditor.css'),
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
                'src'           => asset('/js/models/ckeditor_init.js'),
                'priority'      => 600,
                'version'       => '43.2.0',
                'attributes'    => [
                    'type' => 'module',
                ],
            ],
        ]
    ],
];