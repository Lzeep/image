<?php

namespace App\Http\Controllers;

use App\Image;
use App\Services\ImageUploader;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome', ['images' => Image::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $image = Image::create($request->all());
        $image->image = ImageUploader::upload(request('image'), 'image', 'image', 50);
        $image->save();
        return redirect()->back();
    }

    public function ajaxstore(Request $request)
    {
        if($request->image)
        {
            $image = Image::create($request->all());
            $image->image = ImageUploader::upload($request->image,'image', 'image', 50);
            $image->save();
            return response()->json([
                'message'   => 'Image Upload Successfully',
                'addition_html' => ' <div class="col-3 mt-2">
                <img
                    src="http://testerkin/storage/large/'. $image->image .'" class=\'img-fluid \' alt="Tonel">
            </div>'
            ]);
        }
        else
        {
            return response()->json([
                'message'   => 'Error image upload',
                'uploaded_image' => '',
                'class_name'  => 'alert-danger'
            ]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
