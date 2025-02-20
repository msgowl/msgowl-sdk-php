<?php

namespace Msgowl\MsgowlSDKPhp\Tests;

use Orchestra\Testbench\TestCase;
use Msgowl\MsgowlSDKPhp\MsgowlServiceProvider;

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
