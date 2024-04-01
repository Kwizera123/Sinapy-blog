<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeService;
use Illuminate\Support\Carbon;
use Image;

class ServiceController extends Controller
{
    public function HomeService()
    {
        $homeservice = HomeService::latest()->get();
        return view('admin.service.index', compact('homeservice'));
    }
    public function AddService()
    {
        return view('admin.service.create');
    }
    public function StoreService(Request $request)
    {
        $image = $request->file('image');

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(50, 50)->save('image/service/' . $name_gen);

        $last_img = 'image/service/' . $name_gen;

        HomeService::insert([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'image' => $last_img,
            'item' => $request->item,
            'item_dis' => $request->item_dis,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('home.service')->with('success', 'Service Inserted Successfully');
    }
    public function Edit($id)
    {
        $homeservices = HomeService::find($id);
        return view('admin.service.edit', compact('homeservices'));
    }
    public function Update(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required|min:4',
            ],
            [
                'title.required' => 'Please Enter Brand Name !',
                'short_dis.required' => 'Please Enter Brand Name !',
                'brand_image.min' => 'Brand must be above 4 characters!',
                'item.required' => 'Please Enter Brand Name !',
                'item_dis.required' => 'Please Enter Brand Name !',
            ]
        );
        $old_image = $request->old_image;

        $image = $request->file('image');
        if ($image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_locations = 'image/service/';
            $last_img = $up_locations . $img_name;
            $image->move($up_locations, $img_name);

            unlink($old_image);
            HomeService::find($id)->update([
                'title' => $request->title,
                'short_dis' => $request->short_dis,
                'image' => $last_img,
                'item' => $request->item,
                'item_dis' => $request->item_dis,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->route('home.service')->with('success', 'Service with Image Updated Successfully');
        } else {
            HomeService::find($id)->update([
                'title' => $request->title,
                'short_dis' => $request->short_dis,
                'item' => $request->item,
                'item_dis' => $request->item_dis,
                'created_at' => Carbon::now()
            ]);

            return Redirect()->route('home.service')->with('success', 'Service Updated Successfully');
        }
    }
    public function Delete($id)
    {
        $image = HomeService::find($id);
        $old_image = $image->image;
        unlink($old_image);

        HomeService::find($id)->delete();
        return Redirect()->route('home.service')->with('success', 'Services Delete Successfully');
    }
}
