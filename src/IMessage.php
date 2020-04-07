<?php

namespace Icernn03\Msgowl;

interface IMessage
{
    public function toArray(): Array;
    public function toJson(): string;
}