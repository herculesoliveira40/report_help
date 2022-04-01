<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function create() {
     
        return View('categories.create');
    }

    public function store(Request $request) {
        
        $category = new Category;
        $category->name_category = $request->name_category;
        // dd($category);
        $category->save();

        

    return redirect('/categories/dashboard')->with('mensagem', 'Categoria Cadastrada com Sucesso!'); //Invocar mensagemmmmmmmmmmmmmm
    }

    public function dashboard() {
        $categories = Category::all();

    return View('categories.dashboard', compact('categories')); 
    }

    public function edit($id) {
        $category = Category::findOrFail($id);
       

    return view('categories.edit', ['category' => $category]); 
    }


    public function update(Request $request) {

        $data = $request->all(); 

        Category::findOrFail($request->id)->update($data);
    return redirect('/categories/dashboard')->with('mensagem', 'Categoria editada com Sucesso!', ['data' => $data]);
    }


    public function destroy(Request $request, $id) {
        $id = $request['index_id'];
        Category::findOrFail($id)->delete();

    return redirect('/categories/dashboard')->with('mensagem', 'Categoria deletada com Sucesso!'); //Invocar mensagemmmmmmmmmmmmmm
    }
}
