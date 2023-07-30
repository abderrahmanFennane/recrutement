<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\contact;
use App\Models\organisation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use App\Http\Requests\Store_updateRequest;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 10;
        $sortBy = $request->input('sort_by', 'contact.nom');
        $sortOrder = $request->input('sort_order', 'asc');
    
        $validSortColumns = [
            'contact.nom','contact.prenom', 'organisation.nom', 'organisation.statut'
        ];
    
        if (!in_array($sortBy, $validSortColumns)) {
            $sortBy = 'contact.nom';
        }

        if ($request->input('prev_sort_by') === $sortBy) {
            $sortOrder = $sortOrder === 'asc' ? 'desc' : 'asc';
        }
    
        $alldata = Contact::with('soc')->select('*','contact.id as idC','contact.nom as nomC')
            ->leftJoin('organisation', 'contact.organisation_id', '=', 'organisation.id')
            ->orderBy($sortBy, $sortOrder)
            ->paginate($perPage);
    
        $statusOptions = Organisation::distinct('statut')->pluck('statut')->toArray();
        $organisationOptions = Organisation::all();
    
        return view("main", [
            "contact" => $alldata,
            "status" => $statusOptions,
            "org" => $organisationOptions,
            "sortBy" => $sortBy,
            "sortOrder" => $sortOrder,
        ]);

    }

    public function search(Request $request)
    {
            $query = $request->search;  
            if($query === ''){
                $perPage = 10; 
                $search = contact::with('soc')->paginate($perPage);
            }elseif ($query !== '') {
                $search = contact::with('soc')->select('*','contact.nom as nomC','contact.id as idC')->join('organisation', 'contact.organisation_id', '=', 'organisation.id')
                    ->where('contact.nom', 'like', '%' . $query . '%')
                    ->orWhere('contact.prenom', 'like', '%' . $query . '%')
                    ->orWhere('organisation.nom', 'like', '%' . $query . '%')->GET();
            }
            return response($search);
    }
    
    public function store(Store_updateRequest $request)
    {
        // Store_updateRequest is my validator request to validate the data
        // enregistrement des donnees
        $data = [
            'prenom' => ucfirst(strtolower($request->input('prenom'))),
            'nom' => ucfirst(strtolower($request->input('nom'))),
            'e_mail' => strtolower($request->input('e_mail')),
            'nomE' => strtoupper($request->input('nomE')),
            'adresse' => strtoupper($request->input('adresse')),
            'code_postal' => $request->input('code_postal'),
            'ville' => ucfirst(strtolower($request->input('ville'))),
            'statut' => strtoupper($request->input('statut')),
        ]; 
        $checkData = contact::where('nom', $data['nom'])
        ->where('prenom', $data['prenom'])
        ->count();
        if($checkData !== 0 ){
            return [];
        
        }
        // Entreprise
        $organization = organisation::create([
            'cle' => substr(Str::uuid()->toString(), 0, 31),
            'nom' => $data['nomE'],
            'adresse' => $data['adresse'],
            'code_postal' => $data['code_postal'],
            'ville' => $data['ville'],
            'statut' => $data['statut'],
        ]);
        //   contact
        $idorga = $organization->id;
        $contact = contact::create([
            'cle' => substr(Str::uuid()->toString(), 0, 31),
            'prenom' => $data['prenom'],
            'nom' => $data['nom'],
            'e_mail' => $data['e_mail'],
            'organisation_id'=>$idorga,
            'telephone_fixe' => '',
            'service' => '',
            'fonction' => '',
        ]);
        
        $contact->save();
        
    }

    public function show(Request $request)
    {
        
        $query = $request->id;
        $ShowData = contact::select('contact.id as idC','prenom', 'contact.nom as nomC', 'e_mail', 'organisation.nom as nomE', 'organisation.id as idE', 'adresse', 'code_postal', 'ville', 'statut')
        ->where('contact.id', $query)
        ->join('organisation', 'contact.organisation_id', '=', 'organisation.id')
        ->first();
    
        return response($ShowData);
    }

    public function edit()
    {
    }
    public function update(Store_updateRequest $request)
    {

        $dataUpdated1 = [
            'id' => $request->input('idC'),
            'prenom' => ucfirst(strtolower($request->input('prenom'))),
            'nom' => ucfirst(strtolower($request->input('nom'))),
            'e_mail' => strtolower($request->input('e_mail')),
        ];
        $dataUpdated2 = [
            'nom' => strtoupper($request->input('nomE')),
            'adresse' => strtoupper($request->input('adresse')),
            'code_postal' => $request->input('code_postal'),
            'ville' => ucfirst(strtolower($request->input('ville'))),
            'statut' => strtoupper($request->input('statut')),
        ];  
        
        $query = $dataUpdated1['id'];
        print_r($dataUpdated1);

        $contact = contact::where('id', $query)->firstOrFail();
        $contact->update($dataUpdated1);
        $orgaId = $contact->organisation_id;

        
        $organization = organisation::where('id', $orgaId)->firstOrFail(); 
        $organization->update($dataUpdated2);
        return redirect('/'); 


    }

   
    public function destroy($id)
    {
        $deleteContact= contact::select('*')->where('id',$id)->delete();
        var_dump($id);
        return redirect('/')->with('success', 'le Contact a ete supprimer !');
    }
}
