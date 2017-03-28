<?php

namespace LaravelDingBot;

use Ding\DingBot\DingBot;

class LaravelDingBot
{
	/**
	 *  发送消息
	 *  $group  group.at 部门+at列表
	 *  $content   消息内容
	 */
	public static function sendMessage($group, $content)
	{
		$groupArray = self::getGroup($group);

		$bot = DingBot::getInstance($group['token']);
        	$bot->sendMsg($content, $group['at']);
	}

	/**
	 *  获取配置参数
	 *  $groupStr  group.at 部门+at列表
	 */
	protected static function getGroup($groupStr)
	{
		$group = explode(".", $groupStr);
		print_r($group);exit();
		if (is_array($group) && count($group) > 1)
		{
			$yiiConf = isset(config("dingbot." . $group[0])) ? config("dingbot." . $group[0]) : [];
			$token = isset($yiiConf['token']) ? $yiiConf['token'] : '';
			$at = isset($yiiConf['at'][$group[1]]) ? $yiiConf['at'][$group[1]] : [];
		}
		else if (count($group) == 1)
		{
			$yiiConf = isset(config("dingbot." . $group[0])) ? config("dingbot." . $group[0]) : [];
			$token = isset($yiiConf['token']) ? $yiiConf['token'] : '';
			$at = [];
		}
		else
		{
			$token = '';
			$at = [];
		}

		return [
			'token' => $token,
		    	'at' => $at,
		];
	}
}