<?php

namespace App\Facades;
use Illuminate\Support\Facades\Facade;

class LocateClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'LocateClient';
    }
}