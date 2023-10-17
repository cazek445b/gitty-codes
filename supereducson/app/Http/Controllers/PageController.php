<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\domein;
use App\Models\kwalificatiedosier;
use App\Models\kwalificatiedosierfile;
use App\Models\niveau;
use App\Models\tag;
use App\Models\User;

class PageController extends Controller
{
    public function DossierQueryZoekOpdracht($tags,$niveaux,$domeinen)
    {
        $tags = $this->tagexploder($tags);

        // Start een nieuwe query
        $dossiersQuery = kwalificatiedosier::query();

        // Instructie geven om ook relaties meteen op te halen
        $dossiersQuery->with('domein', 'niveau');

        // Alleen query met tags, als ze ingevuld zijn
        if ($tags !== null) {
            $dossiersQuery->whereHas('tags', function ($query) use ($tags) {
                $query->whereIn('tagnaam', $tags);
            });
        }

        // Alleen query met niveaus, als ze ingevuld zijn
        if ($niveaux !== null) {
            $dossiersQuery->whereIn('niveau_id',$niveaux);
        }

        return $dossiersQuery;
    }



    function tagexploder($tags)
    {
        #$tags = str_replace('#','',$tags)

        $tags = explode('#',$tags);

        $tags = array_filter($tags);

        $tags = array_map('trim',$tags);

        return $tags;
    }


    public function home()
    {
        return 'Homepage';
    }
    public function opzoeken(Request $request)
    {
        $domeinenchecklist = domein::orderBy('created_at', 'asc')->get();

        $niveauxchecklist = niveau::orderBy('created_at', 'asc')->get();

        $submit = $request->query('submit');

        $tags = $request->query('tagchain');
    
        $niveaux = $request->query('niveau');

        $domeinen = $request->query('domein');

        if ($submit != null) {

            $dossiersQuery = $this->DossierQueryZoekOpdracht($tags,$niveaux,$domeinen);
            // Resultaat ophalen
            $dossiers = $dossiersQuery->get(); #dossiers = kwalificatiedosiers

            $tagcount = $dossiersQuery->count(); #For counting the tags and allocating a value for each dossier based on the count

        } else {
            $dossiers = kwalificatiedosier::orderBy('created_at', 'asc')->get();
        }
        return view('opzoeken', [
            'domeinen' => $domeinenchecklist,
            'niveaux' => $niveauxchecklist,
            'kwalificatiedosiers' => $dossiers 
        ]);
    }

    public function kwalificatiedosiers(Request $request, $id)
    {

        $dossier = kwalificatiedosier::find($id);

        $dossierfiles = $dossier->kwalificatiedosierfiles;

        




        return view('dossier', [
            'kwalificatiedosier' => $dossier,
            'dossierfiles' => $dossierfiles
        ]);
    }
}
