<?php

namespace App\Http\Controllers;
use App\Repositories\Banner\BannerRepositoryInterface;
use App\Repositories\ProductType\ProductTypeRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $banner;
    protected $productType;

    public function __construct(BannerRepositoryInterface $banner, ProductTypeRepositoryInterface $productType)
    {
        // $this->middleware('auth');
        $this->banner = $banner;
        $this->productType = $productType;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $paramsBN = [
            'select' => ['id','title','image_banner'],
        ];
        $whereBN = [
            ['start_date', '<=', now()->format('Y-m-d H:i:s')],
            ['end_date', '>=', now()->format('Y-m-d H:i:s')],
            ['is_visible','Y'],
        ];
        $paramsPRTP = [
            'select' => ['id','title','image'],
        ];  
        $banner = $this->banner->getBannerHome($paramsBN,$whereBN,3);
        $productType = $this->productType->getProductType($paramsPRTP,[],4);
        return view('index',compact('banner','productType'));
    }
}
