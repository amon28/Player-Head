<?php
namespace PlayerHead;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\inventory\Inventory;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\item\Item;
use pocketmine\item\ItemBlock;
use pocketmine\entity\Entity;

class Main extends PluginBase implements Listener{
    
    public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
    }
    
    public function onDeath(PlayerDeathEvent $ev){

     $player = $ev->getPlayer();
     $cause = $player->getLastDamageCause();
 
    if($cause instanceof EntityDamageByEntityEvent){
     $damager = $cause->getDamager();
    if($damager instanceof Player){
     $inv = $damager->getInventory();
     $head = Item::get(397,3,1);
     $name = $player->getName();
     $head->setCustomName("§e$name's Head");
     $inv->addItem($head);
  }
}
}
    public function onDisable(){
     $this->getLogger()->info("§cOffline");
    }
}
