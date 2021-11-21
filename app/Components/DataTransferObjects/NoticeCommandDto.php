<?php

namespace App\Components\DataTransferObjects;

use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;

class NoticeCommandDto implements DecoderInterface
{
    public function __construct(
        public ?string $title,
        public ?string $link,
    ) {
    }

    public function decode(string $data, string $format, array $context = [])
    {
        // TODO: Implement decode() method.
    }

    public function supportsDecoding(string $format)
    {
        // TODO: Implement supportsDecoding() method.
    }
}
