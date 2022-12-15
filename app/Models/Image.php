<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    
    protected $table = 'image';
    
    
     protected $fillable = [
        'name',
        'originalname',
        'idreview'
    ];
    
    
    public function review(){
        return $this->belongsTo('App\Models\Review', 'idreview');
    }
    
    public function storeimg($arrayimg, $reviewID){
        foreach($arrayimg as $image){
            $nombre =  "Image_" . $image->getClientOriginalName(); //nombre con el que se guarda el archivo en el storage
            $image->storeAs('public/images', $nombre);
            try{
                $picture = new Image();
                $picture->name = $nombre;
                $picture->originalname = $image->getClientOriginalName();
                $picture->idreview = $reviewID;
                $picture->save();
            }catch(\Exception $e) {
             return back()
                        ->withInput()
                        ->withErrors(['message' => 'An unexpected error occurred while updating.']);
            }
        }
    }
    
    public function deleteimg($arrayimg, $images){
        try{
            foreach($images as $image){
                foreach($arrayimg as $delimage){
                    if($delimage == $image->name){
                        $image->delete();
                        Storage::disk('local')->delete('public/images/'. $delimage);
                    }
                }
            }
        }catch(\Exception $e) {
            return back()
            ->withInput()
            ->withErrors(['message' => 'An unexpected error occurred while updating.']);
        }
    }
    
    public function deleteimgreview($images){
        // try{
            foreach($images as $image){
                $image->delete();
                Storage::disk('local')->delete('public/images/'. $image->name);
            }
        // }catch(\Exception $e) {
            return back()
            ->withInput()
            ->withErrors(['message' => 'An unexpected error occurred while updating.']);
        // }
    }
    
    
    
    
    
}
