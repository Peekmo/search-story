<?php

/**
* @author Axel Anceau <Peekmo>
*/
namespace Peekmo\Story;

class Config
{
    /**
     * @var array
     */
    private static $config = array(
        'analyzer' => array(),
        'parser'   => array(),
        'rule'     => array()
    );

    /**
     * Adds a new available configuration
     *
     * @param string $type        Type of config (analyzer, parser or rule)
     * @param string $name        Name (unique identifier) for the config
     * @param string $description Short description of the element
     * @param string $class       Namespace of the class
     *
     * @throws \InvalidArgumentException for invalid type or duplicate name value
     */
    public static function add($type, $name, $description, $class)
    {
        if (!in_array($type, array('analyzer', 'parser', 'rule'))) {
            throw new \InvalidArgumentException(sprintf('Unknown type %s', $type));
        }

        if (!empty(self::$config[$type][$name])) {
            throw new \InvalidArgumentException(sprintf('Name %s already used for %s', $name, $type));
        }

        self::$config[$type][$name] = array(
            'description' => $description,
            'class'       => $class
        );
    }

    /**
     * Returns configs matching the given parameters
     *
     * @param string $type Type of config (analyzer, parser or rule)
     * @param string $name Name of the config (Must provide a type)
     *
     * @throws \InvalidArgumentException if name is provided but not the type
     */
    public static function get($type = null, $name = null)
    {
        if (is_null($type) && !is_null($name)) {
            throw new \InvalidArgumentException('You must provide a type when you search a name');
        }

        if (is_null($type)) {
            return self::$config;
        } else if (is_null($name)) {
            return isset(self::$config[$type]) ? self::$config[$type] : array();
        } else {
            return (isset(self::$config[$type]) && isset(self::$config[$type][$name]))
                ? self::$config[$type][$name]
                : array()
            ;
        }
    }
}
