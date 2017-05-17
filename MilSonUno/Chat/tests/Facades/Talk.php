<?php

namespace MilSonUno\Chat\Tests\Facades;

use GrahamCampbell\TestBenchCore\FacadeTrait;
use MilSonUno\Chat\Tests\TestCase;

/**
 * This is the Chat facade test class.
 */
class Chat extends TestCase
{
    use FacadeTrait;

    /**
     * Get the facade accessor.
     *
     * @return string
     */
    protected function getFacadeAccessor()
    {
        return 'Chat';
    }

    /**
     * Get the facade class.
     *
     * @return string
     */
    protected function getFacadeClass()
    {
        return \MilSonUno\Chat\Facades\Chat::class;
    }

    /**
     * Get the facade root.
     *
     * @return string
     */
    protected function getFacadeRoot()
    {
        return \MilSonUno\Chat\Chat::class;
    }
}
