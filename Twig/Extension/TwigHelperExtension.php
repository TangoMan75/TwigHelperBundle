<?php

namespace TangoMan\TwigHelperBundle\Twig\Extension;

class TwigHelperExtension extends \Twig_Extension
{
    /**
     * @var \Twig_Environment
     */
    private $template;

    /**
     * TwigHelperExtension constructor.
     *
     * @param \Twig_Environment $template
     */
    public function __construct(\Twig_Environment $template)
    {
        $this->template = $template;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tangoman_twig_helper';
    }

    /**
     * @return array
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('start_with', [$this, 'startWithFunction']),
        ];
    }

    /**
     * Checks if at least one item from haystack starts with needle
     *
     * @param string $needle
     * @param array  $haystack
     *
     * @return bool
     */
    public function startWithFunction($needle, $haystack = [])
    {
        if ($haystack == []) {
            return true;
        }

        if (in_array($needle, $haystack)) {
            return true;
        } else {
            foreach ($haystack as $item) {
                if (strpos($needle, $item) === 0) {
                    return true;
                }
            }
        }

        return false;
    }
}
