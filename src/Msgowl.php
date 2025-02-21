<?php

namespace Msgowl\MsgowlSDKPhp;

class Msgowl
{
    public static function API()
    {
        return new MsgowlAPI();
    }

    public static function OTP()
    {
        return new MsgowlOTP();
    }
}