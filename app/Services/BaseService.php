<?php

namespace App\Services;

use App\Traits\PhotoTrait;
use App\Traits\SvgTrait;
use App\Traits\WordTrait;

class BaseService
{
    use PhotoTrait, WordTrait, SvgTrait;
}