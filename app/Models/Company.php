<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' , 'owner_name' , 'phone' , 'commercial_number','message'
    ];
    public function meetings(){
        return $this->belongsToMany(meeting::class,'meeting_companies');
    }
}
