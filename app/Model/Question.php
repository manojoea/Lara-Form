<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reply(){
        return $this->hasMany(Reply::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    protected function getPathAttribute(){
        return asset("api/question/$this->slug");
    }

}
