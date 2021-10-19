<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $guarded = [];    //Disable mass assignment

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/ODSJZ8GaLLbU14O8oPxDw756T5D5jbl9EfYOtBVZ.jpg';
        return '/storage/' . $imagePath;
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
