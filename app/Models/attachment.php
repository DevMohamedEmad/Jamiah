<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attachment extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'file' , 'meeting_id'];

    public function meeting(){
        return $this->belongsTo(attachment::class,);
    }

    public function votes(){
        return $this->hasMany(vote::class,);
    }
}
