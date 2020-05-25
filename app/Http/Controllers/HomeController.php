<?php

namespace App\Http\Controllers;
use App\Repositories\Banner\BannerRepositoryInterface;
use App\Repositories\ProductType\ProductTypeRepositoryInterface;
use App\Repositories\Products\ProductsRepositoryInterface;
use App\Repositories\AboutUs\AboutUsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $banner;
    protected $productType;
    protected $product;
    protected $aboutUs;

    public function __construct(BannerRepositoryInterface $banner, ProductTypeRepositoryInterface $productType, ProductsRepositoryInterface $product, AboutUsRepositoryInterface $aboutUs)
    {
        // $this->middleware('auth');
        $this->banner = $banner;
        $this->productType = $productType;
        $this->product = $product;
        $this->aboutUs = $aboutUs;
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
        $paramsAB = [
            'select' => ['id','title','content','image'],
        ];  
        $whereAB = [
            ['is_visible','Y'],
        ];
        $banner = $this->banner->getBannerHome($paramsBN,$whereBN,3);
        $productType = $this->productType->getProductType($paramsPRTP,[],4);
        $aboutUs = $this->aboutUs->getAboutHome($paramsAB,$whereAB,6);
        return view('index',compact('banner','productType','aboutUs'));
    }

    public function ProductType($id){
        $params = [
            'select' => ['id','title','content','image_product','price','user_id','likes','comments'],
            'paginate' => 10,
        ];
        $where = [
            ['type',$id],
            ['is_visible','Y'],
        ];
        $data = $this->product->all($params,$where);
        $paramsTP = [
            'select' => 'title',
        ];
        $title = $this->productType->get($id,$paramsTP);
        return view('product',compact('data','title'));
    }
    public function ProductDetail($id){
        $params = [
            'select' => ['products.id','title','content','image_product','price','type','user_id','likes','comments','users.nick_name'],
        ];
        $data = $this->product->get($id,$params,'client');
        return view('product_detail',compact('data'));
    }

    public function GetUser(){
        $user = Auth::user();
        return view('profile',compact('user'));
    }
}
