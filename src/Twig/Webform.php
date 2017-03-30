<?php
namespace Drupal\wm_webform_simplifier\Twig;

/**
 * Class DefaultService.
 *
 * @package Drupal\MyTwigModule
 */
class Webform extends \Twig_Extension {

    /**
     * {@inheritdoc}
     * This function must return the name of the extension. It must be unique.
     */
    public function getName()
    {
        return 'webform';
    }

    /**
     * In this function we can declare the extension function
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction(
                'webform',
                [
                    $this,
                    'webform'
                ],
                [
                    'is_safe' => array('html')
                ]
            ),
        ];
    }

    /**
     * The php function to load a given webform
     */
    public function webform($webform)
    {
        if ($webform) {
            return \Drupal::entityTypeManager()
                ->getViewBuilder('webform')
                ->view($webform);
        }
        return '';
    }

}
