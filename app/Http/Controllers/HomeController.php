<?php

namespace App\Http\Controllers;

use App\Components\Services\NoticeService;
use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;

class HomeController extends Controller
{
    public function __construct(private ResponseFactory $responseFactory)
    {
    }

    public function index(NoticeService $service): Response
    {
        $notices = $service->list();

        return $this->responseFactory->view('admin.index',[
            'notices' => $notices,
        ]);
    }
}
