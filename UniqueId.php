<?php
/**
 * @link https://github.com/abolotin/yii2-unique-id/
 * @copyright Copyright (c) 2018 Anton Bolotin
 * @license https://github.com/abolotin/yii2-unique-id/license/
 */

namespace abolotin\yii2;

/**
 * UniqueId is a class for generating unique identificators for HTML-elements, used by widgets
 * @author Anton Bolotin <a.y.bolotin@gmail.com>
 */
class UniqueId extends \yii\base\Component {
    /**
     * @var string the prefix of ID, which will be used while generating
     */
    public static $prefix='w';
    /**
     * @var string the automatically generated prefix of ID, which will be used while generating
     */
    public static $autoIdPrefix;
    /**
     * @var integer the counter of IDs, which will be used while manual generating
     * @see getId() method
     */
    public static $counter=0;
    /**
     * @var string the suffix of IDs, which will be used while manual generating
     * @see getId() method
     */
    public static $suffix='t';

    /**
     * Constructor.
     * @param array $config name-value pairs that will be used to initialize the object properties.
     * Configuration may contain [[prefix]], [[autoIdPrefix]], [[counter]] and [[suffix]].
     * @throws InvalidConfigException if either [[id]] or [[basePath]] configuration is missing.
     */
    public function __construct($config=[]) {
        parent::__construct($config);

        // Initializing standard \yii\base\Widget's ID generator
        \yii\base\Widget::$autoIdPrefix=(static::$prefix ? static::$prefix : \yii\base\Widget::$autoIdPrefix) . static::getAutoIdPrefix();
    }

    /**
     * Setter for static proterty $prefix. Typically can be used while component initializing.
     * @param string $value
     */
    public function setPrefix($value) {
        static::$prefix=$value;
    }

    /**
     * Setter for static proterty $autoIdPrefix. Typically can be used while component initializing.
     * @param string $value
     */
    public function setAutoIdPrefix($value) {
        static::$autoIdPrefix=$value;
    }

    /**
     * Setter for static proterty $counter. Typically can be used while component initializing.
     * @param integer $value
     */
    public function setCounter($value) {
        static::$counter=$value;
    }

    /**
     * Setter for static proterty $suffix. Typically can be used while component initializing.
     * @param string $value
     */
    public function setSuffix($value) {
        static::$suffix=$value;
    }

    /**
     * Returns current auto-prefix of IDs. If not ready, generating it before.
     */
    public static function getAutoIdPrefix() {
        if (! static::$autoIdPrefix) static::$autoIdPrefix=md5(microtime() . rand(PHP_INT_MAX));
        return static::$autoIdPrefix;
    }

    /**
     * Returns unique ID, based on inner counter with suffix to prevent conflicting with standard generator.
     * May be used for manual assigning unique ID in code.
     */
    public static function getId() {
        return (static::$prefix ? static::$prefix : \yii\base\Widget::$autoIdPrefix) . static::getAutoIdPrefix() . static::$counter++ . static::$suffix;
    }
}