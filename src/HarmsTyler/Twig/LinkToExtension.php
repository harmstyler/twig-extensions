<?php

namespace HarmsTyler\Twig;

use Symfony\Bundle\FrameworkBundle\Routing\Router;

class LinkToExtension extends \Twig_Extension
{

    private $router;

    public function __construct(Router $router) {
        // Just retrieve the router here
        $this->router = $router;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('link_to', array($this, 'buildLink'), array('is_safe' => array('html'))),
        );
    }

    public function buildLink($body, $urlOptions, array $htmlOptions = array())
    {
        if (is_array($urlOptions))
        {
            $path = array_keys($urlOptions);
            $path = $path[0];
            $urlOptions = array_shift($urlOptions);
            $url = $this->router->generate($path, $urlOptions);
        }
        else
        {
            $url = $this->router->generate($urlOptions);
        }
        $htmlOptionsString = '';
        foreach ($htmlOptions as $key => $option){
            $htmlOptionsString = " $key='$option'";
        }

        return '<a href="' . $url . '"' . $htmlOptionsString . '>' . $body . '</a>';
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'link_to_extension';
    }
}
