<?php

namespace App\Http\Controllers;

use App\Models\matiere;
use Illuminate\Http\Request;

class Matiere2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matieres = matiere::all();
        return view('affMatieres', compact('matieres'));
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
            'code_mat' => 'required|unique:matieres|max:6',
            'libelle_mat' => 'required|max:255',
            'coefficient_mat' => 'required|max:10',
        ]);
        $mat = new matiere();
        $mat->code_mat = $request->input('code_mat');
        $mat->libelle_mat = $request->input('libelle_mat');
        $mat->coefficient_mat = $request->input('coefficient_mat');
        $mat->save();
        //$matieres =Matiere::all();
        // $matieres = matiere::paginate(2);

        return redirect('/affMatieres')->with('success', 'matiere ajouté');
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
            'code_mat' => 'required|max:5',
            'libelle_mat' => 'required',
            'coefficient_mat' => 'required',
        ]);

       // $mat= new matiere;
        $matieres = matiere::find($id);
        $matieres->code_mat = $request->get('code_mat');
        $matieres->libelle_mat = $request->get('libelle_mat');
        $matieres->coefficient_mat = $request->get('coefficient_mat');
        $matieres->save();

        return redirect('/affMatieres')->with('success', 'matiere modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            //DB::table('matieres')->where('code_mat', $id)->delete();
            $mat = matiere::find($id)->first();
            $mat->delete(); // Easy right?
    
            return redirect('/affMatieres')->with('success', 'matiere supprimé.');
    }
}
