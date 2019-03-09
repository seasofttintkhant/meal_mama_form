<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $dateFormat = 'U';

    public static function getData($key)
	{
		$arrWhere[] = array('key', $key);
		$config = self::where($arrWhere)->first();
		if(isset($config) && !empty($config))
		{
			return $config->value;
		}
		else
		{
			return false;
		}
	}
	
	public static function updateData($key, $value)
	{
		if(isset($key) && !empty($key))
		{
			$arrWhere[] = array('key', $key);
			$config = self::where($arrWhere)->first();
			if(isset($config) && !empty($config))
			{
				$config->value = $value;
				$config->save();
			}
			else
			{
				$config = new Setting;
		        $config->key = $key;
				$config->value = $value;
		        $config->save();
			}
		}
	}
}
