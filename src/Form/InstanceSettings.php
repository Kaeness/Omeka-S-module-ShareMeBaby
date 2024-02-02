<?php
/**
 * Instance Settings form.
 *
 * Copyright ©2022 Kaeness
 * Author: Christian Lescuyer / Goélette
 */
declare(strict_types=1);

namespace ShareMeBaby\Form;

use Laminas\Form\Element;
use Laminas\Form\Form;

/**
 * Configuration form for the block instance in each page
 */
class InstanceSettings extends Form
{
    public function init()
    {
        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][block_heading]',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Block heading',                               // @translate
                'info'  => 'If empty, the heading will not be displayed', // @translate
            ],
        ]);
        $this->add([
            'name' => 'o:block[__blockIndex__][o:data][networks]',
            'type' => Element\MultiCheckbox::class,
            'options' => [
                'label' => 'Enable sharing',                                                   // @translate
                'info'  => 'Check box to display a button for sharing on the social network',  // @translate
                'value_options' => [
                    [
                        'value' => 'enable_facebook',
                        'label' => 'Facebook',  // @translate
                    ],
                    [
                        'value' => 'enable_twitter',
                        'label' => 'X (Twitter)',   // @translate
                    ],
                    [
                        'value' => 'enable_linkedin',
                        'label' => 'LinkedIn',  // @translate
                    ],
                    [
                        'value' => 'enable_email',
                        'label' => 'Email',     // @translate
                    ],
                ],
            ],
        ]);
    }
}
