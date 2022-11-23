<?php
/**
 * Module class.
 *
 * Copyright ©2022 Kaeness
 * Author: Christian Lescuyer / Goélette
 */
declare(strict_types=1);

namespace ShareMeBaby;

use Laminas\Mvc\Controller\AbstractController;
use Laminas\View\Renderer\PhpRenderer;
use Omeka\Module\AbstractModule;
use ShareMeBaby\Form\ConfigForm;

class Module extends AbstractModule
{
    /**
     * Get this module's configuration data.
     *
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * Get this module's configuration form.
     *
     * @param PhpRenderer $renderer
     * @return string HTML for form
     */
    public function getConfigForm(PhpRenderer $renderer)
    {
        $settings      = $this->getServiceLocator()->get('Omeka\Settings');
        $configuration = $settings->get('share_me_baby_configuration', array());

        $form = new ConfigForm;
        $form->init();
        $form->setData($configuration);

        return $renderer->formCollection($form, false);
    }

    /**
     * Handle this module's configuration form.
     *
     * @param AbstractController $controller
     * @return bool False if there was an error during handling
     */
    public function handleConfigForm(AbstractController $controller)
    {
        $form = new ConfigForm;
        $form->init();
        $form->setData($controller->params()->fromPost());
        if (!$form->isValid()) {
            $controller->messenger()->addErrors($form->getMessages());

            return false;
        }
        $formData = $form->getData();

        $settings = $this->getServiceLocator()->get('Omeka\Settings');
        $settings->set('share_me_baby_configuration', $formData);

        return true;
    }
}
