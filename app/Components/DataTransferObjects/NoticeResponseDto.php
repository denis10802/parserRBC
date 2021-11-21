<?php

namespace App\Components\DataTransferObjects;

final class NoticeResponseDto
{
    public function __construct(
        public ?string $title,
        public ?string $link,
        public ?string $datePublication,
        public ?string $author,
        public ?string $imagePath,
        public ?string $description,
    ) {
    }
}
