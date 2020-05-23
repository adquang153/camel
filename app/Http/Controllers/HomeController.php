<?php

namespace App\Http\Controllers;
use App\Repositories\Banner\BannerRepositoryInterface;
use App\Repositories\ProductType\ProductTypeRepositoryInterface;
use App\Repositories\Products\ProductsRepositoryInterface;
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

    public function __construct(BannerRepositoryInterface $banner, ProductTypeRepositoryInterface $productType, ProductsRepositoryInterface $product)
    {
        // $this->middleware('auth');
        $this->banner = $banner;
        $this->productType = $productType;
        $this->product = $product;
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

    public function ProductType($id){
        $params = [
            'select' => ['id','title','content','image_product','price','user_id','likes','comments'],
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

    
}
