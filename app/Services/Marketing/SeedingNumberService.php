<?php

namespace App\Services\Marketing;

use App\Models\SeedingNumber;
use App\Constants\StatusCode;

class SeedingNumberService
{
    public $seeding;

    public function __construct(SeedingNumber $seeding)
    {
        $this->seeding = $seeding;
    }

    public function getAll()
    {
        $data = $this->seeding->orderBy('id', 'desc')->paginate(StatusCode::PAGINATE_20);
        return $data;
    }
}