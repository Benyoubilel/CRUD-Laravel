<?php

namespace App\Http\Controllers;

use App\Models\epreuve;
use App\Models\matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class epreuvesController extends Controller
{
    public function index()
    {
        // $epreuves = DB::select('select * from epreuves');
        $epreuves = epreuve::all();
        return view('affEpreuves', compact('epreuves'));
    }

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


    public function findbyid($id)
    {
        $epreuves = epreuve::find($id)->first();
        return view('epreuves.edit', compact('epreuves'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'date_ep' => 'required',
            'lieu_ep' => 'required|max:20',
            'matiere_id' => 'required|min:1',

        ]);

//------- Methode 1 --------------//

        //$epreuves = DB::table('epreuves')->where('code_ep', $id);
        // $epreuves = epreuve::find($id)->where('code_ep', $id);

        // $epreuves->update(
        //     array(
        //         'date_ep'      => $request->input('date_ep'),
        //         'lieu_ep'      => $request->input('lieu_ep'),
        //         'code_mat'     => $request->input('code_mat')

        //     )
        // );

    //---------Methode 2 ---------//
        $epreuves = new epreuve;
        $epreuves = epreuve::find($id)->first();
        $epreuves->date_ep = $request->get('date_ep');
        $epreuves->lieu_ep = $request->get('lieu_ep');
        $epreuves->matiere_id = $request->get('matiere_id');
        $epreuves->save();

        return redirect('/affEpreuves')->with('success', 'epreuve modifié');
    }
    public function destroy($id)
    {
        // DB::table('epreuves')->where('code_ep', $id)->delete();
        // $ep = DB::table('epreuves')->where('code_ep', $id)->first();

        $ep = epreuve::find($id)->first();
        $ep->delete();

        return redirect('/affEpreuves')->with('success', 'epreuve supprimé.');
    }
}
