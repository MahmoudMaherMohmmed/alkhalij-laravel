<?php

namespace App\Http\Controllers\Front;

use App\Cartridge;
use App\Category;
use App\Color;
use App\Http\Controllers\Controller;
use App\Manufacture;
use App\Printer;
use App\Team;
use App\Slider;
use App\Service;
use App\Type;

class HomeController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $sliders = Slider::where('status', 1)->get();
        $services = Service::where('status', 1)->limit(3)->get();
        $new_arrivals = Cartridge::where('status', 1)->orderBy('id', 'DESC')->limit(10)->get();
        $best_sellers = Cartridge::where('status', 1)->orderBy('customer_price', 'DESC')->limit(10)->get();
        $brands = Manufacture::where('popular', 1)->where('status', 1)->limit(6)->get();
        $recommended_cartridges = Cartridge::where('recommended', 1)->where('status', 1)->limit(10)->get();
        return view('front.home', compact('sliders', 'services', 'new_arrivals', 'best_sellers', 'brands', 'recommended_cartridges'));
    }

    public function search()
    {
        $search_key = $_GET['search_key'];

        $cartridges = Cartridge::where('title', 'like', '%' . $search_key . '%')->orWhere('cartridge_code', 'like', '%' . $search_key . '%')->where('status', 1)->pluck('cartridge_code');

        return $cartridges;
    }

    public function products()
    {
        $categories = Category::where('status', 1)->get();
        $manufactures = Manufacture::where('status', 1)->get();
        $colors = Color::where('status', 1)->get();
        $types = Type::where('status', 1)->get();
        $cartridges = Cartridge::where('status', 1)->paginate(9);

        return view('front.products', compact('categories', 'manufactures', 'colors', 'types', 'cartridges'));
    }

    public function productDetails($cartridge_slug)
    {
        $cartridge = Cartridge::where('slug', $cartridge_slug)->where('status', 1)->first();

        return view('front.product_details', compact('cartridge'));
    }

    public function PrinterDetails($printer_slug)
    {
        $printer = Printer::where('slug', $printer_slug)->where('status', 1)->first();
        $cartridge = Cartridge::where('status', 1)->first();

        return view('front.printer', compact('printer', 'cartridge'));
    }

    public function about()
    {
        $members = Team::where('status', 1)->get();

        return view('front.about_us', compact('members'));
    }

    public function contact()
    {
        return view('front.contact_us');
    }
}
