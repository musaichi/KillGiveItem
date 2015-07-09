<?php
namespace KGI

use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\player;
use pocketmine\utils\textFormat;

class KGI extends pluginBase{

  public function onEnable(){
   $this->getLogger()->info("KillGiveItem now loading...made by musaichiJP")
  }
  public function onLoad(){
   $this->getLogger()->info("done!Please enjoy this plugin life!")
  }
  public function PlayerDeathEvent(PlayerDeathEvent $event){
   if($event instanceof PlayerDeathEvent){
    $item = 
    $killer = $event->getKiller();//ころしたひと
    $killer->sendPopup("you are winner!gived item $item ")
    
