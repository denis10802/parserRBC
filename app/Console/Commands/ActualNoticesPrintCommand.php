<?php

namespace App\Console\Commands;

use App\Components\DataTransferObjects\NoticeCommandDto;
use App\Components\Services\NoticeService;
use App\Contracts\FeedReadInterface;
use Illuminate\Console\Command;

class ActualNoticesPrintCommand extends Command
{
    protected $signature = 'notices:read';

    protected $description = 'Get notices from RBC';

    /**
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function handle(
        FeedReadInterface $feedReed,
        NoticeService     $noticeService,
    ) {
        /** * @var NoticeCommandDto[] * */
        $notices = $feedReed->readTitlesAndLinks();

        //serializing an array of NoticeCommandDto[] objects to a regular array
        $notices = $noticeService->serialize($notices);

        $this->table(
            ['title','link'],
            $notices
        );
    }
}
