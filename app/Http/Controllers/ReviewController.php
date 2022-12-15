<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Review;
// use App\Models\Image;
use Illuminate\Support\Facades\Auth;



class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $review = new Review ($request->all());
            $review->iduser = Auth::user()->id;
             if($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
                $archivo = $request->file('thumbnail');
                $path = $archivo->getRealPath();
                $imagen = file_get_contents($path);
                $review->thumbnail = base64_encode($imagen);
             }
             
            $review->save();
            $type = $request->type;
            
            $imagedata = new Image();
            $imgarray = $request->images;
            $imagedata->storeimg($imgarray, $review->id);
            
            return redirect('post/' . $type);
         } catch(\Exception $e) {
             return back()
                        ->withInput()
                        ->withErrors(['message' => 'An unexpected error occurred while updating.']);
         }

        
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        $images = Image::where('idreview', $review->id)->get();
        return view('reviews.show', ['review' => $review,
                                     'images' => $images]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        $images = Image::where('idreview', $review->id)->get();
        return view('reviews.edit', ['review' => $review,
                                     'images' => $images]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
         try {
             if($review->iduser == Auth::user()->id){
                $deletedArray = $request->delimages;
                $deleteImage = (explode(',',$deletedArray[0]));
                $images = Image::where('idreview', $review->id)->get();
                $imagedata = new Image();
                $imagedata->deleteimg($deleteImage, $images);
                $review->update($request->all());
            if($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
                $archivo = $request->file('thumbnail');
                $path = $archivo->getRealPath();
                $imagen = file_get_contents($path);
                $review->thumbnail = base64_encode($imagen);
             }
            if($request->images){
                $imagedata = new Image();
                $imgarray = $request->images;
                $imagedata->storeimg($imgarray, $review->id);
            }
            $review->save();
             }else{
                 return redirect('/');
             }

            return redirect('review/' . $review->id);
        } catch(Exception $e) {
            return back()
                    ->withInput()
                    ->withErrors(['update' => 'An unexpected error occurred while updating.']);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        
        try {
            if($review->iduser == Auth::user()->id){
                $images = Image::where('idreview', $review->id)->get();
                $imagedata = new Image();
                $imagedata->deleteimgreview($images);
                $review->delete();
                $message = 'The review ' . $review->name . ' has been removed.';
            }
            else{
                return redirect('/');
            }
            
        } catch(\Exception $e) {
            $message = 'The review ' .  $review->name . ' has not been removed.';
        }
        return redirect('post')->with('message', $message);
    }
}
