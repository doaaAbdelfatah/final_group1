<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable =["contact" ,"contact_type_id" ,"account_id" ,"account_type"];

    function contact_type(){
        return $this->belongsTo(ContactType::class ,"contact_type_id" ,"id");
    }
    public function account()
    {
        return $this->morphTo();
    }
}

