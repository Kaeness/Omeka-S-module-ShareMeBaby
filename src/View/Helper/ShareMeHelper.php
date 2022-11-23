<?php
/**
 * View helper.
 *
 * Copyright ©2022 Kaeness
 * Author: Christian Lescuyer / Goélette
 */
declare(strict_types=1);

namespace ShareMeBaby\View\Helper;

use Laminas\View\Helper\AbstractHelper;

/**
 * View helper to display the social share block.
 */
class ShareMeHelper extends AbstractHelper
{
    protected $module_settings;

    public function __construct($module_settings)
    {
        $this->module_settings = $module_settings;
    }

    public function __invoke()
    {
        // We use the module options
        $configuration = $this->module_settings->get('share_me_baby_configuration', array());

        $view = $this->getView();

        return $view->partial('social-sharing-block/common/block-layouts/social-sharing-block', [
            'block_heading'  => $configuration['block_heading'],
            'networks'       => $configuration['networks'],
            'this_url'       => $view->serverUrl() . $_SERVER['REQUEST_URI'],
            'title'          => $view->headTitle()->renderTitle(),
            'twitter_handle' => $configuration['twitter_handle'],
        ] );

        $html = '<h2>' . $block_heading . '</h2>';

        return $html;
    }
}

