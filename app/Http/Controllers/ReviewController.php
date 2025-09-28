<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function review()
    {
        $reviews=Review::all();
        if($reviews==null)
        {
            return redirect('/addview');
        }
        else{  return view('review',compact('reviews'));}


    }
    public function addreview(Request $request)
    {

        $newreview=new Review();
        $newreview->name=$request->name;
        $newreview->email=$request->email;
        $newreview->phone=$request->phone;
        $newreview->message=$request->message;
        $newreview->subject=$request->subject;
        $newreview->save();
        return redirect('/review');
    }
}
