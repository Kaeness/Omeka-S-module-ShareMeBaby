<?php
/**
 * View helper Factory.
 *
 * Copyright ©2022 Kaeness
 * Author: Christian Lescuyer / Goélette
 */
declare(strict_types=1);

namespace ShareMeBaby\Service\View\Helper;

use Interop\Container\ContainerInterface;
use ShareMeBaby\View\Helper\ShareMeHelper;
use Laminas\ServiceManager\Factory\FactoryInterface;

class ShareMeHelperFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $services, $requestedName, array $options = null)
    {
        return new ShareMeHelper($services->get('Omeka\Settings'));
    }
}