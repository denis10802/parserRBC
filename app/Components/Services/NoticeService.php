<?php

namespace App\Components\Services;

use App\Components\DataTransferObjects\NoticeResponseDto;
use App\Models\Notice;

class NoticeService
{
    public function list(): \Illuminate\Support\Collection
    {
        return Notice::all()->map(function (Notice $notice) {
            return new NoticeResponseDto(
                $notice->title,
                $notice->link,
                $notice->date_public,
                $notice->author,
                $notice->image_path,
                $notice->description,
            );
        });
    }
}
