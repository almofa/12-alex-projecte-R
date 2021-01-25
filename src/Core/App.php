<?php
namespace App\Core;
use App\Database;
use Exception;

/**
 * Class App
 * App service container
 * @package App\Core
 */
class App
{
    /**
     * @var array
     */
    private static array $container = [];

    /**
     * @param string $key
     * @param mixed $value
     */
    public static function bind(string $key, $value)
    {
        static::$container[$key] = $value;
    }

    /**
     * @param string $key
     * @return mixed
     * @throws Exception
     */

    public static function get(string $key)
    {
        if (!array_key_exists($key, static::$container)) {
            throw new Exception("The $key doesn't exist in the container");
        }
        return static::$container[$key];
    }

    /**
     * Retrieve a model instance
     * @param string $className
     * @return Model
     */
    public static function getModel(string $className): Model
    {
        if (!array_key_exists($className, static::$container)) {
            static::$container[$className] = new $className(Database::getConnection());
        }
        return static::$container[$className];
    }
}