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
            new \Twig_SimpleFunction('end_with', [$this, 'endWithFunction']),
            new \Twig_SimpleFunction('is_string', [$this, 'isStringFunction']),
            new \Twig_SimpleFunction('is_numeric', [$this, 'isNumericFunction']),
        ];
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('to_array', [$this, 'toArrayFunction']),
        ];
    }

    /**
     * Find whether the type of a variable is string
     *
     * @param $var
     *
     * @return bool
     */
    public function isStringFunction($var)
    {
        return is_string($var);
    }

    /**
     * Finds whether a variable is a number or a numeric string
     *
     * @param $var
     *
     * @return bool
     */
    public function isNumericFunction($var)
    {
        return is_numeric($var);
    }

    /**
     * Converts stdObject or json string to array
     *
     * @return array
     */
    public function toArrayFunction($object)
    {
        if (is_string($object)) {
            return json_decode($object, true);
        }

        return json_decode(json_encode($object), true);
    }

    /**
     * Checks if at least one item from haystack ends with needle
     *
     * @param string $needle
     * @param array  $haystack
     *
     * @return bool
     */
    public function endWithFunction($needle, $haystack = [])
    {
        if ($haystack == []) {
            return true;
        }

        if (in_array($needle, $haystack)) {
            return true;
        } else {
            foreach ($haystack as $item) {
                $length = strlen($needle);
                if (substr($haystack, -$length) === $needle) {
                    return true;
                }
            }
        }

        return false;
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
