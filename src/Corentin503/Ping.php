<?php

namespace Corentin503;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Server;

class Ping extends Command
{
    public function __construct()
    {
        parent::__construct("ping", "Permet de tester la connexion d'un joueur", "/ping");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        $config = Main::getInstance()->getConfig();
        $player = Server::getInstance()->getPlayerByPrefix($args[0]);

        if (!is_null($args[0])) {
            if ($config->get("permission") === true) {
                if ($sender->hasPermission("ping.use")) {
                    $sender->sendMessage("§9Ping for {$player->getName()} is §f{$player->getNetworkSession()->getPing()}§9 ms !");
                }
            } else $sender->sendMessage("§9Ping for {$player->getName()} is §f{$player->getNetworkSession()->getPing()}§9 ms !");
        } else $sender->sendMessage("§cArgument is empty");
    }
}
