<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Portfolio;

class PortfoliosController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portfolio.create');
    }

    public function store(request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
                $portfolio = New portfolio();
                $portfolio->name = $request->input('name');
                $portfolio->save();
                
                $portfolio->users()->attach(Auth::user()->id) ;

        return redirect('/possessions');
    }
}
