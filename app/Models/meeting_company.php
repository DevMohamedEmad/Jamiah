<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class meeting_company extends Model
{
    use HasFactory;
    protected $fillable= ['meeting_id' , 'company_id','attendance'];

    public function meeting(){
        return $this->belongsTo(meeting::class,);
    }
    public function company(){
        return $this->belongsTo(Company::class,);
    }
}
