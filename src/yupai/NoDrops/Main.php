<?php

namespace yupai\NoDrops;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;
use pocketmine\event\player\PlayerItemHeldEvent;
use pocketmine\event\player\PlayerJoinEvent;


class Main extends PluginBase implements Listener {

    public function OnEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this ,$this);
        $this->getLogger()->info(TextFormat::GREEN . "■■■■■■■■■■NoDrops by Yupai Enable!■■■■■■■■■");
        @mkdir($this->getDataFolder());
		$this->config = new Config($this->getDataFolder()."config.yml", Config::YAML, array(
		"item"=>"264"
		));
    }
    public function OnPlayer(PlayerJoinEvent $j){
    $player=$j->getPlayer();
    $player->sendMessage("§cThis server can't §4drop item§c which in server config setting !");
    }

    public function OnDisable(){
        $this->getLogger()->info(TextFormat::RED . "■■■■■■■■■■ NoDrops by Yupai Disable!■■■■■■■■■■" );
    }

    public function onDrop(PlayerDropItemEvent $event){
        $player = $event->getPlayer();
        if($event->getItem()->getId()!=$this->config->get("item")){
        return;
        }
        $event->setCancelled(true);
        $n=$player->getName();
        $player->sendTip("§4You can't drop those items! \n          §a$n");
    } 
}
