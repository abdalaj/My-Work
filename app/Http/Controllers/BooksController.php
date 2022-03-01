<?php

namespace App\Http\Controllers;

use App\books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class booksController extends Controller
{
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=books::orderByDesc('id')->paginate(250);

        return view('books.index',compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\books  $books
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = books::where('id',$id)->get();
        return view('books.item',compact('data'));
    }


}
