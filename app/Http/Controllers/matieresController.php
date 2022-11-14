<?php

namespace App\Http\Controllers;

use App\Models\matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class matieresController extends Controller
{
    public function index()
    {
        // $matieres = DB::table('matiere')->get();
        //  $matieres = DB::select('select * from matieres');
        $matieres = matiere::all();
        return view('affMatieres', compact('matieres'));
    }

    public function store(Request $request)
    {
        // DB::insert('insert into matieres(code_mat,libelle_mat,coefficient_mat) values("algo","algorithme","2")');

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

    public function findbyid($id)
    {
       // $mat =    DB::table('matieres')->where('code_mat', $id);
        $matieres = matiere::find($id)->first();
        return view('matieres.edit', compact('matieres'));
    }


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

    public function destroy($id)
    {
        //DB::table('matieres')->where('code_mat', $id)->delete();
        $mat = matiere::find($id)->first();
        $mat->delete(); // Easy right?

        return redirect('/affMatieres')->with('success', 'matiere supprimé.');
    }
}
