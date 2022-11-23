<?php
/**
 * Block layout class.
 *
 * Copyright ©2022 Kaeness
 * Author: Christian Lescuyer / Goélette
 */
declare(strict_types=1);

namespace ShareMeBaby\Site\BlockLayout;

use Laminas\View\Renderer\PhpRenderer;
use Laminas\Form\FormElementManager;
use Omeka\Api\Representation\SiteRepresentation;
use Omeka\Api\Representation\SitePageBlockRepresentation;
use Omeka\Api\Representation\SitePageRepresentation;
use Omeka\Site\BlockLayout\AbstractBlockLayout;
use ShareMeBaby\Form\InstanceSettings;

/**
 * Class ShareMeBaby
 *
 * It is apparently usual to name the class after the module
 */
class ShareMeBaby extends AbstractBlockLayout
{
    /**
     * @var FormElementManager
     */
    protected $formElementManager;

    /**
     * @var array
     */
    protected $defaultSettings = array();

    /**
     * @param FormElementManager $formElementManager
     * @param array $defaultSettings
     */
    public function __construct(FormElementManager $formElementManager, array $defaultSettings)
    {
        $this->formElementManager = $formElementManager;
        $this->defaultSettings    = $defaultSettings;
    }

    /**
     * Returns the button label in Page Edit.
     *
     * @return string
     */
    public function getLabel()
    {
        return 'Social share buttons'; // @translate
    }

    public function form(PhpRenderer $view, SiteRepresentation $site, SitePageRepresentation $page = null, SitePageBlockRepresentation $block = null)
    {
        $form = $this->formElementManager->get(InstanceSettings::class);
        $data = $block
            ? $block->data() + $this->defaultSettings
            : $this->defaultSettings;

        // Default
        if (!array_key_exists('networks', $data)) {
            $data['networks'] = array();
        }

        $form->setData([
            'o:block[__blockIndex__][o:data][block_heading]'  => $data['block_heading'],
            'o:block[__blockIndex__][o:data][twitter_handle]' => $data['twitter_handle'],
            'o:block[__blockIndex__][o:data][networks]'       => $data['networks'],
        ]);
        $form->prepare();
        $html = $view->formCollection($form);

        return $html;
    }

    public function render(PhpRenderer $view, SitePageBlockRepresentation $block)
    {
        $url = $view->serverUrl() . $_SERVER['REQUEST_URI'];

        // Twitter handle cannot be modified at the block level; use module settings
        $settings      = $block->getServiceLocator()->get('Omeka\Settings');
        $configuration = $settings->get('share_me_baby_configuration', array());

        return $view->partial('social-sharing-block/common/block-layouts/social-sharing-block', [
            'title'          => $block->page()->title(),
            'block_heading'  => $block->dataValue('block_heading'),
            'networks'       => $block->dataValue('networks', array()),
            'this_url'       => $url,
            'twitter_handle' => $configuration['twitter_handle'],
        ] );
    }
}
