<?php
namespace Firewall;

class Firewall
{
	// Hold an instance of the class
    private static $instance;

    // The singleton method
    public static function singleton()
    {
        if (!isset(self::$instance)) { self::$instance = new static; }
        return self::$instance;
    }

	public function __call ( string $name , array $arguments )
	{
		if( !method_exists($this, $name) ) { die('Method Not Exsits'); }
		return call_user_func_array([$this, $name], $arguments);
	}

	public static function __callStatic ( string $name , array $arguments )
	{
		return call_user_func_array([static::singleton(), $name], $arguments);
	}

	public function run( )
	{
		die(__METHOD__);
	}
}