<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategoryFormRequest;

class CategoryController extends Controller
{
    //queryBuilder

    public function index()
    {
        $categories = DB::table('categories')
            ->orderBy('id', 'desc')
            ->paginate();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(StoreUpdateCategoryFormRequest $request)
    {

        DB::table('categories')->insert([
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description
        ]);


        return redirect()->route('categories.index')->withSuccess('Categoria Cadastrada com sucesso!');
    }


    public function show($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();

        if (!$category) {
            return redirect()->back();
        }

        return view('admin.categories.show', compact('category'));
    }


    public function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();

        if (!$category) {
            return redirect()->back();
        }


        return view('admin.categories.edit', compact('category'))->withSuccess('Categoria Editada com sucesso!');
    }


    public function update(StoreUpdateCategoryFormRequest $request, $id)
    {

        DB::table('categories')->where('id', $id)->update([
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description
        ]);

        return redirect()->route('categories.index');
    }


    public function destroy($id)
    {
        $category = DB::table('categories')->where('id', $id)->delete();

        if (!$category) {
            return redirect()->back()->withErrors('Error ao excluir categoria!');
        }


        return redirect()->route('categories.index')->withSuccess('Categoria Excluida com sucesso!');
    }


    public function search(Request $request)
    {

        $data = $request->except('_token');
        $search = $request->get('search');
        //dd($search);
        //    $categories = DB::table('categories')
        //                            ->where('title',$search)
        //                            ->orWhere('url', $search)
        //                            ->orWhere('description', 'LIKE', "%{$search}%")
        //                            ->get();
        $categories = DB::table('categories')
            ->where(function ($query) use ($data) {
                if (isset($data['title'])) {
                    $query->where('title', $data['title']);
                }

                if (isset($data['url'])) {
                    $query->orWhere('url', $data['url']);
                }
                if (isset($data['description'])) {
                    $desc = $data['description'];
                    $query->where('description', 'LIKE', "%{$desc}%");
                }
            })
            ->orderBy('id', 'desc')
            ->paginate();

        return view('admin.categories.index', compact('categories', 'search', 'data'));
    }
}
