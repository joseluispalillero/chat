<?php

namespace MilSonUno\Chat\Tests;

use GrahamCampbell\TestBench\AbstractPackageTestCase;
use MilSonUno\Chat\ChatServiceProvider;

/**
 * This is the abstract test case class.
 */
abstract class TestCase extends AbstractPackageTestCase
{
    /**
     * Get the service provider class.
     *
     * @param \Illuminate\Contracts\Foundation\Application $app
     *
     * @return string
     */
    protected function getServiceProviderClass($app)
    {
        return ChatServiceProvider::class;
    }
}
