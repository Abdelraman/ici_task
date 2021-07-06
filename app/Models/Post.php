<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id', 'user_id', 'image_id', 'image', 'text'];
    protected $appends = ['has_image', 'image_path'];

    //attr
    public function getHasImageAttribute()
    {
        return $this->image != null || $this->image_id != null;

    }// end of hasImage

    public function getImagePathAttribute()
    {
        if ($this->image_id) {

        }

        return Storage::url('uploads/' . $this->image);

    }// end of getImagePathAttribute

    //scope

    //rel
    public function replies()
    {
        return $this->hasMany(Post::class, 'parent_id');

    }// end of replies

    public function user()
    {
        return $this->belongsTo(User::class);

    }// end of user

    //fun
    public function hasReplies()
    {
        return $this->replies->count() > 0;

    }// end of hasReplies

}//end of model
