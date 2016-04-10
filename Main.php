<?php

namespace yupai\NoDrops;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener {

    public function OnEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this ,$this);
        $this->getLogger()->info(TextFormat::GREEN . "NoDrops by Yupai Enable!");
        }
        public function onJoin(PlayerJoinEvent $join){
        $player=$join->getPlayer();
        
        $player->sendMessage("§4§lWarning:§c§lThis server can't drop items!");
    }

    public function OnDisable(){
        $this->getLogger()->info(TextFormat::RED . "NoDrops by Yupai Disable!");
    }

    public function onDrop(PlayerDropItemEvent $event){
        $player = $event->getPlayer();
        $event->setCancelled(true);
        $item=$event->getItem();
        $name=$item->getName();
        $player->sendMessage("§a§lyou can't drop§c§l $name §a§l!");
    } 
}
