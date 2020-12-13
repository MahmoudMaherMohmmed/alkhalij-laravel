<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Service;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = Service::all();
        return view('admin.services.index', compact('items'));
    }

    public function create()
    {
        return view('admin.services.edit');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'icon' => 'required',
            'status' => 'required | not_in:-1'
        ]);

        $item = new Service();
        $item->title = langSting($request->title_ar, $request->title_en);
        $item->description = langSting($request->description_ar, $request->description_en);
        $item->icon = $request->icon;
        $item->status = $request->status;

        if ($item->save()) {
            return Redirect::back()->with('msg', 'Your data added successfully.');
        }
    }

    public function edit($id)
    {
        $item = Service::findorfail($id);
        return view('admin.services.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title_ar' => 'required',
            'title_en' => 'required',
            'icon' => 'required',
            'status' => 'required | not_in:-1'
        ]);

        $item = Slider::findorfail($id);
        $item->title = langSting($request->title_ar, $request->title_en);
        $item->description = langSting($request->description_ar, $request->description_en);
        $item->icon = $request->icon;
        $item->status = $request->status;

        if ($item->save()) {
            return Redirect::back()->with('msg', 'Your data updated successfully.');
        }
    }

    public function destroy($id)
    {
        //get Item
        $item = Slider::findorfail($id);

        //delete item
        if ($item->delete()) {
            return Redirect::back()->with('msg', 'Your Data deleted successfully.');
        }
    }
}
