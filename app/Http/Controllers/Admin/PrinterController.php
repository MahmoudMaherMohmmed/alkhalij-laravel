<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Manufacture;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Printer;

class PrinterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Printer::all();
        return view('admin.printers.index', compact('items'));
    }

    public function create()
    {
        $categories = Category::where('status', 1)->get();
        $manufactures = Manufacture::where('status', 1)->get();
        return view('admin.printers.edit', compact('categories', 'manufactures'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'category_id' => 'required | not_in:-1',
            'manufacture_id' => 'required | not_in:-1',
            'image' => 'mimes:jpeg,png,jpg,gif',
            'status' => 'required | not_in:-1'
        ]);

        $item = new Printer();
        $item->code = Str::random(25);
        $item->slug = slug($request->title_en);
        $item->title = langSting($request->title_ar, $request->title_en);
        $item->description = langSting($request->description_ar, $request->description_en);
        $item->category_id = $request->category_id;
        $item->manufacture_id = $request->manufacture_id;
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
            return Redirect::back()->with('msg', 'Your data added successfully.');
        }
    }

    public function edit($id)
    {
        $item = Printer::findorfail($id);
        $categories = Category::where('status', 1)->get();
        $manufactures = Manufacture::where('status', 1)->get();
        return view('admin.printers.edit', compact('item', 'categories', 'manufactures'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'category_id' => 'required | not_in:-1',
            'manufacture_id' => 'required | not_in:-1',
            'image' => 'mimes:jpeg,png,jpg,gif',
            'status' => 'required | not_in:-1'
        ]);


        $item = Printer::findorfail($id);
        $item->slug = slug($request->title_en);
        $item->title = langSting($request->title_ar, $request->title_en);
        $item->description = langSting($request->description_ar, $request->description_en);
        $item->category_id = $request->category_id;
        $item->manufacture_id = $request->manufacture_id;
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
            return Redirect::back()->with('msg', 'Your data updated successfully.');
        }
    }

    public function destroy($id)
    {
        //get Item
        $item = Printer::findorfail($id);

        //delete image
        deleteImage($item->image);

        //delete item
        if ($item->delete()) {
            return Redirect::back()->with('msg', 'Your Data deleted successfully.');
        }
    }
}
