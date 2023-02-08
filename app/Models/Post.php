<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

//    public function getTitleAttribute($value)
//    {
//        return strtoupper($value);
//    }

    public function getTimeAttribute()
    {
        return "<p class='small text-black-50 mb-0 text-nowrap'>
                                    <i class='bi bi-calendar'></i>
                                    {$this->created_at->format('d M Y')}
                                </p>
                                <p class='small text-black-50 mb-0 text-nowrap'>
                                    <i class='bi bi-clock'></i>
                                    {$this->created_at->format('H : i A') }
                                </p>";
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtoupper($value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function scopeSearch($query){
        return $query->when(request('keyword'), function ($q){
            $keyword = request('keyword');
            $q->orWhere("title","like","%$keyword%")
                ->orWhere("description","like","%$keyword%");
        });
    }
}
