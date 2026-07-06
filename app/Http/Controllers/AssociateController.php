<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UploadImageService;
use App\Services\ProductService;
use App\Services\SubProductService;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Illuminate\Support\Facades\Auth;

class AssociateController extends Controller
{
    private $imageService, $productService, $subProductService;

    public function __construct (
        UploadImageService $imageService,
        ProductService $productService,
        SubProductService $subProductService
    )
    {
        $this->imageService = $imageService;
        $this->productService = $productService;
        $this->subProductService = $subProductService;
    }

    public function index(Request $request)
    {
        return view('associates.index');
    }
}