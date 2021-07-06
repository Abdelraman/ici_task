<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UserImage extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'image'];
    protected $appends = ['image_path'];

    //attr
    public function getImagePathAttribute()
    {
        return Storage::url('uploads/' . $this->image);

    }// end of getImagePathAttribute

    //scope

    //rel
    public function user()
    {
        return $this->belongsTo(User::class);

    }// end of user

}//end of model
