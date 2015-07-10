<?php
namespace KGI

use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\player;
use pocketmine\utils\textFormat;
use pocketmine\utils\Config;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;

class KGI extends pluginBase{

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
   if($event instanceof PlayerDeathEvent){
    $id = $this->config->get("ItemID")
    $meta = $this->config->get("ItemMeta")
    $Number = $this->config->get("ItemNumber")
    $message = $this->config->get("GM");
    $killer = $event->getKiller();
    $killer->Item::get($ItemID ,$ItemMeta ,$ItemNumber );
    $killer->sendPopup("$message");
  }
 }
 public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
  switch (strtolower($command->getName())) {
   case "reloadK":
    $this->reloadConfig()
    $sender->sendPopup("config.yml reloaded!");
    return true;//処理を終了
    break;
  }
  return false;
 }
}
