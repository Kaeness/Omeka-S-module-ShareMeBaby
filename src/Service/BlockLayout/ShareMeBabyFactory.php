<?php
/**
 * Module factory.
 *
 * Copyright ©2022 Kaeness
 * Author: Christian Lescuyer / Goélette
 */
declare(strict_types=1);

namespace ShareMeBaby\Service\BlockLayout;

use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;
use ShareMeBaby\Site\BlockLayout\ShareMeBaby;

class ShareMeBabyFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $services, $requestedName, array $options = null)
    {
        $settings        = $services->get('Omeka\Settings');
        $defaultSettings = $settings->get('share_me_baby_configuration', array());

        return new ShareMeBaby(
            $services->get('FormElementManager'),
            $defaultSettings
        );
    }
}
