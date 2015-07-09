<?php
namespace KGI

use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\player;
use pocketmine\utils\textFormat;
use pocketmine\utils\Config;

class KGI extends pluginBase{

  public function onEnable(){
   if(!file_exists($this->getDataFolder())){
    mkdir($this->getDataFolder(), 0744, true);//なければフォルダを作成
}
   $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML array(
        "test" => "data",
        "データ名(キー)" => "値",
));
   $this->getLogger()->info("KillGiveItem now loading...made by musaichiJP")
  }
  public function onLoad(){
   $this->getLogger()->info("done!Please enjoy this plugin life!")
  }
  public function PlayerDeathEvent(PlayerDeathEvent $event){
   if($event instanceof PlayerDeathEvent){
    $item = Item::get(1, 0, 1)
    $killer = $event->getKiller();//ころしたひと
    $killer->sendPopup("you are winner!gived item $item ")
    
