<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Demand;
use App\Models\Category;
use App\Models\User;

class DemandController extends Controller
{
    public function create() {

        $categories = Category::all();
     
    return View('demands.create', compact('categories'));
    }


    public function store(Request $request) {
        
        $demand = new Demand();
        $demand->title_demand = $request->title_demand;
        
        $demand->description = $request->description;
        $demand->status = $request->status;

        $demand->category_id = $request->category_id;
        
        $user = auth()->user();
        $demand->user_creator_id = $user->id;
        $demand->user_update_id = $user->id;
        $demand->save();

        
    return redirect('/demands/dashboard')->with('mensagem', 'Demanda Cadastrado com Sucesso!'); //Invocar mensagemmmmmmmmmmmmmm
    }


    public function dashboard() {
                    // Serch
        $search = request('search');

        if($search) 
        {

            $demands = Demand::where([
                ['title_demand', 'like', '%'.$search.'%']
            ])->get();

        } 
        else 
        {
             // Demands All
            $demands = DB::table('demands')
            ->orderByRaw('id ASC')   
            ->join('categories', 'demands.category_id', '=', 'categories.id')
            ->select('demands.id', 'demands.category_id', 'demands.title_demand',  
            'categories.name_category')
            ->get();
            // dd($demands);
        }
             
        
                    // Demands Pie Chart
        $results = DB::select(DB::raw("select count(demands.category_id) as quanty_category, 
        demands.category_id, categories.name_category 
                FROM categories 
                    LEFT JOIN demands ON demands.category_id = categories.id GROUP BY categories.id "));

        $data= "";

        foreach($results as $val) 
        {
                $data.= "['".$val->name_category."',  ".$val->quanty_category."],";
        }           
        // dd($results);
        $charData = $data;

    return View('demands.dashboard', compact('charData'), ['demands' => $demands, 'search' => $search]); 
    }


    public function show($id) {

        $demand = Demand::findOrFail($id);
       
    return view('demands.show', ['demand' => $demand]);    
    }


    public function edit($id) {

        $demand = Demand::findOrFail($id);
        $categories = Category::all();
        $users = User::all();

    return view('demands.edit', ['demand' => $demand], compact('categories', 'users')); 
    }


    public function update(Request $request) {

        $data = $request->all(); 
        
        
       
        $data['user_update_id'] =  auth()->user()->id;

        Demand::findOrFail($request->id)->update($data);
    return redirect('/demands/dashboard')->with('mensagem', 'Demanda editado com Sucesso!', ['data' => $data]);
    }


    public function destroy(Request $request, $id) {

        $id = $request['index_id'];
        Demand::findOrFail($id)->delete();
       
    return redirect('/demands/dashboard')->with('mensagem', 'Demanda deletado com Sucesso!'); //Invocar mensagemmmmmmmmmmmmmm
    }

}


