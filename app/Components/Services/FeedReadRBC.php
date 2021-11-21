<?php

namespace App\Components\Services;

use App\Components\DataTransferObjects\NoticeCommandDto;
use App\Components\DataTransferObjects\NoticeResponseDto;
use App\Contracts\FeedReadInterface;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;

class FeedReadRBC implements FeedReadInterface
{
    public ?int $responseStatus;

    private function getBody(): string
    {
        $response = Http::get(config('app.feeds_url_rbc'));

        $this->responseStatus = $response->status();

        return $response->body();
    }

    /**
     * @return NoticeResponseDto[]
     */
    public function read(): array
    {
        $crawler = new Crawler($this->getBody());

        return $crawler->filterXPath('//channel//item')->each(function (
            Crawler $parentCrawler,
                    $i
        ) {
            $title = $parentCrawler->filterXPath('//title');
            $link = $parentCrawler->filterXPath('//link');
            $time = $parentCrawler->filterXPath('//pubDate');
            $author = $parentCrawler->filterXPath('//author');
            $imagePath = $parentCrawler->filterXPath('//rbc_news:image//rbc_news:url');
            $description = $parentCrawler->filterXPath('//description');

            return new NoticeResponseDto(
                $title->text(),
                $link->text(),
                $time->text('', false),
                $author->text('',false),
                $imagePath->text('',false),
                $description->text('',false),
            );
        });
    }

    public function readTitlesAndLinks(): array
    {
        $crawler = new Crawler($this->getBody());

        return $crawler->filterXPath('//channel//item')->each(function (
            Crawler $parentCrawler,
                    $i
        ) {
            $title = $parentCrawler->filterXPath('//title');
            $link = $parentCrawler->filterXPath('//link');

            return new NoticeCommandDto(
                $title->text(),
                $link->text(),
            );
        });
    }
}
