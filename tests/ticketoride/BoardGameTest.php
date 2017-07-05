<?php
namespace ticketoride;

use PHPUnit\Framework\TestCase;

class BoardGameTest extends TestCase
{
    public function testGetRoutesAfterInitializeShouldAssertEquals()
    {
        $boardGame = new BoardGame();
        $boardGame->initializeGame(10, 4, 10);

        $this->assertCount(10, $boardGame->getRoutes());
    }

    public function testGetPlayersAfterInitializeShouldAssertEquals()
    {
        $boardGame = new BoardGame();
        $boardGame->initializeGame(10, 4, 10);

        $this->assertCount(4, $boardGame->getPlayers());
    }

    public function testGetCardsAfterInitializeShouldAssertEquals()
    {
        $boardGame = new BoardGame();
        $boardGame->initializeGame(10, 4, 10);

        $this->assertEquals(90, $boardGame->getDeck()->getTotalCards());
    }
}