<?php

namespace FlexBlade;

use Exception;
use FlexBlade\Blade\BladeCompiler;

class Blade
{
    private static BladeCompiler $compiler;
    private static Bag $bag;

    public static function registerComponentNamespace(string $namespace, string $directory) : void
    {
        self::compiler()->registerNamespace($namespace,$directory);
    }

    public static function compiler() : BladeCompiler
    {
        if(!isset(self::$compiler)) {
            self::$compiler = new BladeCompiler();
        }

        return self::$compiler;
    }

    /**
     * @throws Exception
     */
    public static function render(string $view, array $data = []) : string
    {
        return self::compiler()->render($view, $data);
    }
    public static function Bag(): Bag
    {
        if(!isset(self::$bag)){
            self::$bag = new Bag();
        }
        return self::$bag;
    }

    public static function enableCache(string $directory) : void
    {
        self::compiler()->setCacheLocation($directory);
    }


}