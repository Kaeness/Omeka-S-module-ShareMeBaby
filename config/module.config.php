<?php
/**
 * Module configuration file.
 *
 * Copyright ©2022 Kaeness
 * Author: Christian Lescuyer / Goélette
 */
declare(strict_types=1);

namespace ShareMeBaby;

return [
    'view_manager' => [
        'template_path_stack' => [
            dirname(__DIR__) . '/view',
        ],
    ],
    'view_helpers' => [
        'factories' => [
            'shareMeBaby' => Service\View\Helper\ShareMeHelperFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            dirname(__DIR__) . '/view',
        ],
    ],
    'block_layouts' => [
        'factories' => [
            'ShareMeBaby' => Service\BlockLayout\ShareMeBabyFactory::class,
        ],
    ],
    'form_elements' => [
        'invokables' => [
            Form\Form::class => Form\InstanceSettings::class,
        ],
    ],
    'translator' => [
        'translation_file_patterns' => [
            [
                'type'        => 'gettext',
                'base_dir'    => dirname(__DIR__) . '/language',
                'pattern'     => '%s.mo',
                'text_domain' => null,
            ],
        ],
    ],
];
