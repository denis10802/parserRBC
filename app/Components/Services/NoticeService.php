<?php

namespace App\Components\Services;

use App\Components\DataTransferObjects\NoticeResponseDto;
use App\Models\Notice;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

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

    /**
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function serialize(array $notices): array
    {
        $normalizer = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizer, $notices);

        return $serializer->normalize($notices);
    }
}
