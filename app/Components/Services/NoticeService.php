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

    public function refresh($notices): void
    {
        Notice::truncate();

        foreach ($notices as $notice) {
            $modelUpdate = new Notice();

            $modelUpdate->title = $notice->title;
            $modelUpdate->link = $notice->link;
            $modelUpdate->date_public = $notice->datePublication;
            $modelUpdate->author = $notice->author;
            $modelUpdate->description = $notice->description;
            $modelUpdate->image_path = $notice->imagePath;

            $modelUpdate->save();
        }
    }
}
