<?php

namespace Msgowl\MsgowlSDKPhp;

interface IMessage
{
    public function toArray(): Array;
    public function toJson(): string;
}