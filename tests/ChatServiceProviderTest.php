<?php

namespace MilSonUno\Chat\Tests;

use GrahamCampbell\TestBenchCore\ServiceProviderTrait;
use MilSonUno\Chat\Chat;

/**
 * This is the service provider test class.
 */
class ChatServiceProviderTest extends TestCase
{
    use ServiceProviderTrait;

    public function testChatIsInjectable()
    {
        $this->assertIsInjectable(Chat::class);
    }
}
