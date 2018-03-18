<?php

namespace awzaw\bookchecker;

use pocketmine\event\Listener;
use pocketmine\item\Item;
use pocketmine\item\ItemFactory;
use pocketmine\plugin\PluginBase;
use pocketmine\event\player\PlayerJoinEvent;

class Main extends PluginBase implements Listener {

    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onPlayerJoin(PlayerJoinEvent $event){
        $inv = $event->getPlayer()->getInventory()->getContents();
        foreach($inv as $item){
            if ($item->getId() === Item::WRITTEN_BOOK && !$item->hasCompoundTag()){
                $event->getPlayer()->getInventory()->remove(ItemFactory::get(Item::WRITTEN_BOOK));
            }
        }
    }

}
