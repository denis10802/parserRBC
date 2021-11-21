<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class NoticesParsed
{
    public function __construct(
        public int $status,
        public string $method,
        public string $url,
        public string $date,
    ) {
    }
}
