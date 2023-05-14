<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    use HasFactory;
    protected $fillable = ['company_id' , 'attachment_id' , 'vote'];
    public function attachment(){
        return $this->belongsTo(attachment::class,);
    }
    function company(){
        return $this->belongsTo(Company::class,);
    }
}
