<?php

namespace Msgowl\MsgowlSDKPhp;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Icernn03\Msgowl\Skeleton\SkeletonClass
 */
class MsgowlFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'msgowl';
    }
}
