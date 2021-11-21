<?php

namespace App\Listeners;

use App\Events\NoticesParsed;
use App\Models\Log;

class NoticesLogging
{
    public function handle(NoticesParsed $parsedEvent)
    {
        $log = new Log();
        $log->date_logging = $parsedEvent->date;
        $log->request_method = $parsedEvent->method;
        $log->request_url = $parsedEvent->url;
        $log->response_http_code = $parsedEvent->status;

        $log->save();
    }
}
