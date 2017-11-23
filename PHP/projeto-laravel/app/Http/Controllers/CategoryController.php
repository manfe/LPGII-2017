<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $categories = Category::all();

        return view('categories/index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('categories/create');
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->nome = $request->input('nome');

        if($category->save()) {
            return redirect()->route('categories.index')->with('success_message', 'Categoria cadastrada com sucesso.');
        } else {
            return redirect()->route('categories.create')->with('error_message', 'Houve um erro ao cadastrar a categoria.');
        }
    }

    public function edit(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        return view('categories/edit')->with('category', $category);
    }
 
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->nome = $request->input('nome');

        if($category->save()) {
            return redirect()->route('categories.index')->with('success_message', 'Categoria alterada com sucesso.');
        } else {
            return redirect()->route('categories.edit', $id)->with('error_message', 'Houve um erro ao alterar a categoria.');
        }
    }

    public function destroy($id)
    {
        if (Category::destroy($id)) {
            return redirect()->route('categories.index')->with('success_message', 'Categoria deleta com sucesso.');
        } else {
            return redirect()->route('categories.create')->with('error_message', 'Houve um erro ao deletar a categoria.');
        }
    }
}
