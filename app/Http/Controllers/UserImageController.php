<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Models\UserImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserImageController extends Controller
{
    public function create()
    {
        return view('user_images._create');

    }// end of create

    public function store(Request $request)
    {
        $request->file('file')->store('/public/uploads');

        $image = auth()->user()->images()->create([
            'image' => $request->file->hashName()
        ]);

        return $image;

    }// end of store

    public function destroy(UserImage $userImage)
    {
        Storage::disk('local')->delete('public/uploads/' . $userImage->image);
        $userImage->delete();

    }// end of delete
}//end of controller
