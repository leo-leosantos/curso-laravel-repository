<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategoryFormRequest;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = DB::table('categories')->paginate(10);

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


        return redirect()->route('categories.index');
    }


    public function show($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();

        if(!$category){
            return redirect()->back();
        }

        return view ('admin.categories.show', compact('category'));

    }


    public function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();

        if(!$category){
            return redirect()->back();
        }


        return view ('admin.categories.edit', compact('category'));

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

        if(!$category){
            return redirect()->back();
        }


        return redirect()->route('categories.index');

    }


    public function search(Request $request)
    {

        $data = $request->all();
         $search = $request->get('search');
        //dd($search);
    //    $categories = DB::table('categories')
    //                            ->where('title',$search)
    //                            ->orWhere('url', $search)
    //                            ->orWhere('description', 'LIKE', "%{$search}%")
    //                            ->get();
        $categories = DB::table('categories')
                               ->where(function($query) use ($data){
                                        if(isset($data['title'])){
                                            $query->where('title',$data['title']);
                                        }

                                        if(isset($data['url'])){
                                            $query->orWhere('url',$data['url']);
                                        }
                                        if(isset($data['description'])){
                                            $desc = $data['description'];
                                            $query->where('description', 'LIKE' , "%{$desc}%");
                                        }
                                    })
                               ->get();

        return view('admin.categories.index', compact('categories','search','data'));

    }
}
