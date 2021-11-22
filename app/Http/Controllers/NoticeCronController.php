<?php

namespace App\Http\Controllers;

use App\Components\Services\NoticeService;
use App\Contracts\FeedReadInterface;
use App\Events\NoticesParsed;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

final class NoticeCronController
{
   public function update(
       FeedReadInterface $readRBC,
       NoticeService $noticeService,
       Redirector    $redirect,
       Dispatcher $dispatcher,
       Request $request,
   ): RedirectResponse
   {
       $notice = $readRBC->read();

       $noticeService->refresh($notice);

       $dispatcher->dispatch(new NoticesParsed(
           $readRBC->responseStatus,
           $request->method(),
           $request->url(),
           date('DATE_RFC822')
       ));

       return $redirect->to('/');
   }
}
