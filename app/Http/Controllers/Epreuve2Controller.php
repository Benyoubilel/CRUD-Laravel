<?php

namespace App\Http\Controllers;

use App\Models\epreuve;
use App\Models\matiere;
use Illuminate\Http\Request;

class Epreuve2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $epreuves = epreuve::all();
        $mat = matiere::all();
        return view('affEpreuves', compact('epreuves'), compact('mat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'date_ep' => 'required',
            'lieu_ep' => 'required|max:20',
            'matiere_id' => 'required'
        ]);
        $ep = new epreuve();
        $ep->date_ep = $request->input('date_ep');
        $ep->lieu_ep = $request->input('lieu_ep');
        $ep->matiere_id = $request->input('matiere_id');

        $ep->save();
        //$epieres = epreuve::paginate(2);

        return redirect('/affEpreuves')->with('success', 'epreuve ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $request->validate([
            'date_ep' => 'required',
            'lieu_ep' => 'required|max:20',
            'matiere_id' => 'required|min:1',

        ]);
        $epreuves = new epreuve;
        $epreuves = epreuve::find($id);
        $epreuves->date_ep = $request->get('date_ep');
        $epreuves->lieu_ep = $request->get('lieu_ep');
        $epreuves->matiere_id = $request->get('matiere_id');
        $epreuves->save();

        return redirect('/affEpreuves')->with('success', 'epreuve modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ep = epreuve::find($id)->first();
        $ep->delete();

        return redirect('/affEpreuves')->with('success', 'epreuve supprimé.');
    }
}
