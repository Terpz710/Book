<?php

declare(strict_types=1);

namespace Terpz710\book\events;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use Terpz710\book\Book;

class BookListener implements Listener {

    protected function onJoin(PlayerJoinEvent $event) {
        $player = $event->getPlayer();
        Book::getInstance()->openBook($player);
    }
}