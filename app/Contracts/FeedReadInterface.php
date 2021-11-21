<?php

namespace App\Contracts;

use App\Components\DataTransferObjects\NoticeResponseDto;

interface FeedReadInterface
{
    /**
     * @return NoticeResponseDto[]
     */
    public function read(): array;
}
