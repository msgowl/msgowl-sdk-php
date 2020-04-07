<?php

namespace Icernn03\Msgowl\Tests;

use Orchestra\Testbench\TestCase;
use Icernn03\Msgowl\MsgowlServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [MsgowlServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
