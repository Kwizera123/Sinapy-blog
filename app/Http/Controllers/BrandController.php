<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Image;


class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function AllBrand()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }
    public function StoreBrand(Request $request)
    {
        $validatedData = $request->validate(
            [
                'brand_name' => 'required|unique:brands|min:4',
                'brand_image' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'brand_name.required' => 'Please Enter Brand Name !',
                'brand_image.min' => 'Brand must be above 4 characters!',
            ]
        );
        $brand_image = $request->file('brand_image');

        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($brand_image->getClientOriginalExtension());
        // $img_name = $name_gen . '.' . $img_ext;
        // $up_locations = 'image/brand/';
        // $last_img = $up_locations . $img_name;
        // $brand_image->move($up_locations, $img_name);

        $name_gen = hexdec(uniqid()) . '.' . $brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300, 200)->save('image/brand/' . $name_gen);

        $last_img = 'image/brand/' . $name_gen;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now()
        ]);

        $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function Edit($id)
    {
        $brands = Brand::find($id);
        return view('admin.brand.edit', compact('brands'));
    }
    public function Update(Request $request, $id)
    {
        $validatedData = $request->validate(
            [
                'brand_name' => 'required|min:4',
            ],
            [
                'brand_name.required' => 'Please Enter Brand Name !',
                'brand_image.min' => 'Brand must be above 4 characters!',
            ]
        );
        $old_image = $request->old_image;

        $brand_image = $request->file('brand_image');
        if ($brand_image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_locations = 'image/brand/';
            $last_img = $up_locations . $img_name;
            $brand_image->move($up_locations, $img_name);

            unlink($old_image);
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'created_at' => Carbon::now()
            ]);

            $notification_edit = array(
                'message' => 'Brand Edited Successfully',
                'alert-type' => 'info'
            );

            return Redirect()->back()->with($notification_edit);
        } else {
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'created_at' => Carbon::now()
            ]);

            $notification_edit = array(
                'message' => 'Brand Edited Successfully',
                'alert-type' => 'info'
            );

            return Redirect()->back()->with($notification_edit);
        }
    }
    public function Delete($id)
    {
        $image = Brand::find($id);
        $old_image = $image->brand_image;
        unlink($old_image);

        Brand::find($id)->delete();

        $notification_delete = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'error'
        );
        return Redirect()->back()->with($notification_delete);
    }
    //THIS IS FOR MULTI IMAGE all methos
    public function Multipic()
    {
        $images = Multipic::all();
        return view('admin.multipic.index', compact('images'));
    }
    //Store multple images
    public function StoreImg(Request $request)
    {
        $image = $request->file('image');

        foreach ($image as $multi_img) {

            $name_gen = hexdec(uniqid()) . '.' . $multi_img->getClientOriginalExtension();
            Image::make($multi_img)->resize(300, 300)->save('image/multi/' . $name_gen);

            $last_img = 'image/multi/' . $name_gen;

            Multipic::insert([

                'image' => $last_img,
                'created_at' => Carbon::now()
            ]);
        } //End for the foreach
        return Redirect()->back()->with('success', 'Image(s) Inserted Successfully');
    }
    public function Logout()
    {
        Auth::logout();
        return Redirect()->route('login')->with('success', 'User Logged Out');
    }
}
