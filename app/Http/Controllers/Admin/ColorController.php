<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Color;

class ColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Color::all();
        return view('admin.colors.index', compact('items'));
    }

    public function create()
    {
        return view('admin.colors.edit');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'color' => 'required',
            'status' => 'required | not_in:-1'
        ]);

        $item = new Color();
        $item->code = Str::random(25);
        $item->slug = slug($request->title_en);
        $item->color = $request->color;
        $item->title = langSting($request->title_ar, $request->title_en);
        $item->description = langSting($request->description_ar, $request->description_en);
        $item->status = $request->status;

        if ($item->save()) {
            return Redirect::back()->with('msg', 'Your data added successfully.');
        }
    }

    public function edit($id)
    {
        $item = Color::findorfail($id);
        return view('admin.colors.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'color' => 'required',
            'status' => 'required | not_in:-1'
        ]);


        $item = Color::findorfail($id);
        $item->slug = slug($request->title_en);
        $item->title = langSting($request->title_ar, $request->title_en);
        $item->color = $request->color;
        $item->description = langSting($request->description_ar, $request->description_en);
        $item->status = $request->status;

        if ($item->save()) {
            return Redirect::back()->with('msg', 'Your data updated successfully.');
        }
    }

    public function destroy($id)
    {
        //get Item
        $item = Color::findorfail($id);

        //delete item
        if ($item->delete()) {
            return Redirect::back()->with('msg', 'Your Data deleted successfully.');
        }
    }
}
