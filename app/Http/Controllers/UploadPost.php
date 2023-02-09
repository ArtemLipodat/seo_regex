<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class UploadPost extends Controller {

    private int $approved = 1;
    private int $no_approved = 2;

    protected $redirectTo = RouteServiceProvider::UPLOAD;


    function add(Request $request){
        $request->validate([
            'title' => ['required', 'string','max:255'],
            'description' => ['required', 'string', 'min:1'],
        ]);

        $data = $request->all();

        $filename = $data['image']->getClientOriginalName();
        $data['image']->move(Storage::path('/public/image/post/').'origin/', $filename);

        $thumbnail = Image::make(Storage::path('/public/image/post/').'origin/'.$filename);
//        $thumbnail->fit(290, 360);

        $height = $thumbnail->height();
        $width = $thumbnail->width();

        if($height >= 601) {
            $thumbnail->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        if($width >= 601) {
            $thumbnail->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        $thumbnail->save(Storage::path('/public/image/post/').'thumbnail/'.$filename);

        if (Auth::check()) {
            $data['status'] = $this->approved;
            $data['author'] = Auth::id();
        } else {
            $data['status'] = $this->no_approved;
        }
        $data['image_path'] = $filename;
        Posts::create($data);

        return redirect()->route('upload')->with('success', 'Uploaded');
    }

}
