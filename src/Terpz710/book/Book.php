<?php

declare(strict_types=1);

namespace Terpz710\book;

use pocketmine\plugin\PluginBase;
use pocketmine\player\Player;
use pocketmine\item\VanillaItems;
// Import this class
use cooldogedev\libBook\libBook;

class Book extends PluginBase {

    public static $instance;

    public function onLoad() : void{
        self::$instance = $this;
    }

    protected function onEnable() : void{
        $this->getServer()->getPluginManager()->registerEvents(new BookListener(), $this);
        // Register the book
        LibBook::register($this);
    }

    public static function getInstance(): self {
        return self::$instance;
    }

    public function openBook(Player $player) {
        // Get the written book item
        $item = VanillaItems::WRITTEN_BOOK();
        $playerName = $player->getName();
        
        //Set the books pages
        $item->setPageText(0, "Welcome {$playerName}\nThis is a book Example plugin!");
        $item->setPageText(1, "Terpz710 made this!");
        $item->setPageText(2, "If you need a plugin, Im sorry i stopped taking commisions :(");
        // Send the book to the player
        LibBook::sendPreview($player, $item);
    }
}