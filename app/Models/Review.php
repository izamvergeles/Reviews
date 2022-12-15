<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    
    protected $table = 'review';
    
    
    protected $fillable = [
        'name',
        'type',
        'iduser',
        'description',
        'thumbnail'
    ];
    
    
     public function user(){
        return $this->belongsTo('App\Models\User', 'iduser');
    }
    
    public function image(){
        return $this->hasMany('App\Models\Image', 'idreview');
    }
    

    
}
