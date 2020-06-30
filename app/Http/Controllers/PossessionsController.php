<?php

namespace App\Http\Controllers;

use App\owner;
use App\Possession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PossessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('possessions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('possessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
            'zipCode' => 'required|integer',
            'town' => 'required',
            'portfolio' => 'required',
        ]);
            if(Auth::user()->portfolios->find($request['portfolio'])){
                $possession = New Possession();
                $possession->title = $request->input('title');
                $possession->description = $request->input('description');
                $possession->address = $request->input('address');
                $possession->zipCode = $request->input('zipCode');
                $possession->town = $request->input('town');
                $possession->portfolio_id = $request->input('portfolio');
                $possession->save();

        return redirect('/possessions');
            }
            return $request['portfolio'] . ' no';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $possession = Possession::find($id);
            $panddingItem = $possession->owners;
            $completeItem = owner::with('possessions')->whereDoesntHave('possessions', function($query) use ($id) {
                $query->where('possessions.id', $id);
            })->get();
            
            return view('possessions.show3',compact('panddingItem','possession','completeItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $possession = Possession::find($id);
        $portfolios = Auth::user()->portfolios->pluck('name', 'id');
        return view('possessions.edit',compact('possession','portfolios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'address' => 'required',
            'zipCode' => 'required',
            'town' => 'required',
            'portfolio_id' => 'required|integer',
        ]);
        $possession = Possession::find($id);
        $possession->title = $request->input('title');
        $possession->description = $request->input('description');
        $possession->address = $request->input('address');
        $possession->zipCode = $request->input('zipCode');
        $possession->town = $request->input('town');
        $possession->portfolio_id = $request->input('portfolio_id');
        $possession->save();

        return redirect('/possessions');
    }


    public function updateOwnerPossession(Request $request)
    {
        $input = $request->all();
        $possession = $input['possession'];
        $possession->id;
    	return $input['possession'];
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $possession = Possession::find($id);
        $possession->delete();
        return redirect('/possessions');
    }
}
