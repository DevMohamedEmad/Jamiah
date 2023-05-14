<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class meeting extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'time' , 'date','file','link','count_votes'];

    public function attachments(){
        return $this->hasMany(attachment::class,);
    }
    public function votes(){
        return $this->hasMany(vote::class,);
    }
    public function companies(){
        return $this->belongsToMany(Company::class,'meeting_companies');
    }
}
