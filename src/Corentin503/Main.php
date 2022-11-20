<?php

namespace Corentin503;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    public static Main $main;

    public function onEnable(): void
    {
        self::$main = $this;
        $this->getServer()->getCommandMap()->register("", new Ping());
    }

    public static function getInstance(): Main
    {
        return self::$main;
    }
}