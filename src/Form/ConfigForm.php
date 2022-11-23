<?php
/**
 * Module configuration form.
 *
 * Copyright ©2022 Kaeness
 * Author: Christian Lescuyer / Goélette
 */
declare(strict_types=1);

namespace ShareMeBaby\Form;

use Laminas\Form\Element;
use Laminas\Form\Form;
use Laminas\InputFilter\InputFilterProviderInterface;
use Laminas\Validator\NotEmpty;

/**
 * Configuration form for the module
 */
class ConfigForm extends Form implements InputFilterProviderInterface
{
    public function init()
    {
        $this->add([
        'name' => 'block_heading',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Default block heading',         // @translate
                'info'  => 'This text will be used as the default for the block heading option.', // @translate
            ],
        ]);
        $this->add([
            'name' => 'twitter_handle',
            'type' => Element\Text::class,
            'options' => [
                'label' => 'Twitter handle for sharing',    // @translate
                'info'  => 'Enter optional Twitter handle', // @translate
            ],
        ]);
        $this->add([
            'name' => 'networks',
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
                        'label' => 'Twitter',   // @translate
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

    public function getInputFilterSpecification()
    {
        $inputFilter[] = [
            'name' => 'networks',
            'validators' => [
                [
                    'name' => NotEmpty::class,
                    'options' => [
                        'messages' => [
                            NotEmpty::IS_EMPTY => 'Please select at least one social network.', // @translate
                        ],
                    ],
                ],
            ],
        ];

        return $inputFilter;
    }
}
