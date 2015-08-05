<?php
namespace KGI;

use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\player;
use pocketmine\utils\textFormat;
use pocketmine\utils\Config;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class KillGiveItem extends pluginBase{

  public function onEnable(){
   if(!file_exists($this->getDataFolder())){
    mkdir($this->getDataFolder(), 0744, true);//なければフォルダを作成
}
   $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML array(
    "GM" => "you are winner!Item given!",
    "ItemId" => "1",
    "ItemMeta" => "0",
    "ItemNumber" => "1",
));
   $this->getLogger()->info("KillGiveItem now loading...made by musaichiJP")
  }
  public function onLoad(){
   $this->getLogger()->info("done!Please enjoy this plugin life!")
  }
  public function PlayerDeathEvent(PlayerDeathEvent $event){
   $entity = $event->getEntity();
   $cause = $entity->getLastDamageCause();
   $id = $this->config->get("ItemID")
   $meta = $this->config->get("ItemMeta")
   $Number = $this->config->get("ItemNumber")
   $message = $this->config->get("GM");
    if($cause instanceof EntityDamageByEntityEvent){
     $killer = $cause->getDamager()->getPlayer();
     $killer->Item::get($id ,$meta ,$Number );
     $killer->sendPopup("$message");
     return true;
    }
  }
 public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
  switch (strtolower($command->getName())) {
   case "reloadK":
    $this->reloadConfig()
    $sender->sendPopup("config.yml has reloaded!");
    return true;
    break;
  }
  return false;
 }
}
