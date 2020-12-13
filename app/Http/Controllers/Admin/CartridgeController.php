<?php

namespace App\Http\Controllers\Admin;

use App\Cartridge;
use App\Category;
use App\Color;
use App\Printer;
use App\Manufacture;
use App\Http\Controllers\Controller;
use App\Type;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartridgeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Cartridge::all();
        return view('admin.cartridges.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $manufactures = Manufacture::where('status', 1)->get();
        $types = Type::where('status', 1)->get();
        $colors = Color::where('status', 1)->get();
        $printers = Printer::where('status', 1)->get();
        return view('admin.cartridges.edit', compact('categories', 'manufactures', 'types', 'colors', 'printers'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'cartridge_code' => 'required',
            'cartridge_id' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'category_id' => 'required | not_in:-1',
            'manufacture_id' => 'required | not_in:-1',
            'type_id' => 'required | not_in:-1',
            'color_id' => 'required | not_in:-1',
            'page_yield' => 'required',
            'quantity' => 'required',
            'admin_price' => 'required',
            'staff_price' => 'required',
            'customer_price' => 'required',
            'image' => 'required | mimes:jpeg,png,jpg,gif',
            'recommended' => 'required | not_in:-1',
            'status' => 'required | not_in:-1'
        ]);

        $item = new Cartridge();
        $item->code = Str::random(25);
        $item->slug = slug($request->title_en);
        $item->title = langSting($request->title_ar, $request->title_en);
        $item->cartridge_code = $request->cartridge_code;
        $item->cartridge_id = $request->cartridge_id;
        $item->description = langSting($request->description_ar, $request->description_en);
        $item->category_id = $request->category_id;
        $item->manufacture_id = $request->manufacture_id;
        $item->type_id = $request->type_id;
        $item->color_id = $request->color_id;
        $item->page_yield = $request->page_yield;
        $item->quantity = $request->quantity;
        $item->admin_price = $request->admin_price;
        $item->staff_price = $request->staff_price;
        $item->customer_price = $request->customer_price;
        $item->recommended = $request->recommended;
        $item->status = $request->status;

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                try {
                    $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                    $request->image->move('files/', $imageName);

                    $item->image = $imageName;

                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
                    return redirect()->back()->withErrors($e->getMessage());
                }
            } else {
                return redirect()->back()->withErrors('This file is invalid.');
            }
        }


        if ($item->save()) {
            $item->printers()->attach($request->hidden_compatible_printers);

            return Redirect::back()->with('msg', 'Your data added successfully.');
        }
    }

    public function edit($id)
    {
        $item = Cartridge::findorfail($id);
        $categories = Category::where('status', 1)->get();
        $manufactures = Manufacture::where('status', 1)->get();
        $types = Type::where('status', 1)->get();
        $colors = Color::where('status', 1)->get();
        $printers = Printer::where('status', 1)->get();
        return view('admin.cartridges.edit', compact('item', 'categories', 'manufactures', 'types', 'colors', 'printers'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'cartridge_code' => 'required',
            'cartridge_id' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'category_id' => 'required | not_in:-1',
            'manufacture_id' => 'required | not_in:-1',
            'type_id' => 'required | not_in:-1',
            'color_id' => 'required | not_in:-1',
            'page_yield' => 'required',
            'quantity' => 'required',
            'admin_price' => 'required',
            'staff_price' => 'required',
            'customer_price' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif',
            'recommended' => 'required | not_in:-1',
            'status' => 'required | not_in:-1'
        ]);


        $item = Cartridge::findorfail($id);
        $item->slug = slug($request->title_en);
        $item->title = langSting($request->title_ar, $request->title_en);
        $item->cartridge_code = $request->cartridge_code;
        $item->cartridge_id = $request->cartridge_id;
        $item->description = langSting($request->description_ar, $request->description_en);
        $item->category_id = $request->category_id;
        $item->manufacture_id = $request->manufacture_id;
        $item->type_id = $request->type_id;
        $item->color_id = $request->color_id;
        $item->page_yield = $request->page_yield;
        $item->quantity = $request->quantity;
        $item->admin_price = $request->admin_price;
        $item->staff_price = $request->staff_price;
        $item->customer_price = $request->customer_price;
        $item->recommended = $request->recommended;
        $item->status = $request->status;

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                try {
                    //delete image
                    deleteImage($item->image);

                    //save new image
                    $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                    $request->image->move('files/', $imageName);

                    $item->image = $imageName;

                } catch (Illuminate\Filesystem\FileNotFoundException $e) {
                    return redirect()->back()->withErrors($e->getMessage());
                }
            } else {
                return redirect()->back()->withErrors('This file is invalid.');
            }
        }

        if ($item->save()) {
            $item->printers()->sync($request->hidden_compatible_printers);

            return Redirect::back()->with('msg', 'Your data updated successfully.');
        }
    }

    public function destroy($id)
    {
        //get Item
        $item = Cartridge::findorfail($id);

        //delete image
        deleteImage($item->image);

        //delete item
        if ($item->delete()) {
            return Redirect::back()->with('msg', 'Your Data deleted successfully.');
        }
    }
}
