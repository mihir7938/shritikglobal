<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UploadImageService;
use App\Services\EmailService;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    private $imageService, $emailService;

    public function __construct (
        UploadImageService $imageService,
        EmailService $emailService
    )
    {
        $this->imageService = $imageService;
        $this->emailService = $emailService;
    }

    public function index(Request $request)
    {
        return view('index');
    }
}
