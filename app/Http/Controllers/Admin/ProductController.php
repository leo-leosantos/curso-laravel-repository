<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProductFormRequest;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductController extends Controller
{
    //Eloquent ORM

    protected $repository;

    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $products =  $this->repository->relationships('category')
            ->paginate();

            //dd($products);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = Category::pluck('title', 'id');
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductFormRequest $request)
    {
        //uma maneira  de cadastrar
        // $category =  Category::find($request->category_id);
        // $product = $category->products()->create($request->all());

        //outra maneira de cadastrar atraves do relacionamento
        $product = $this->repository->store($request->all());


        return redirect()->route('products.index')->withSuccess('Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$product = $this->repository->where('id', $id)->first();
        $product = $this->repository->findWhereFirst('id', $id);

        //$categories = Category::pluck('title','id');
        if (!$product) {
            return redirect()->back();
        }

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->repository->findById($id);
        //$categories = Category::pluck('title', 'id');

        if (!$product) {
            return redirect()->back();
        }

        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductFormRequest $request, $id)
    {
        // $product = $this->repository->find($id);

        // if (!$product) {
        //     return redirect()->back();
        // }

        // $product->update($request->all());

        $this->repository->update($id, $request->all());
        return redirect()->route('products.index')->withSuccess('Produto editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $product = $this->repository->find($id);

        // if (!$product) {
        //     return redirect()->back();
        // }

        // $product->delete();

        $this->repository->delete($id);

        return redirect()->route('products.index')->withSuccess('Produto Excluido com sucesso!');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');


        // $data = $request->all();

        $products = $this->repository->search($request);

        return view('admin.products.index', compact('products', 'filters'));
    }
}
