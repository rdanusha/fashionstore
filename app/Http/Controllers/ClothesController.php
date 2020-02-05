<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClothesStoreRequest;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ClothesController extends Controller
{

    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clothes = $this->productRepository->all();
        return view('clothes.index', compact('clothes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = $this->productRepository->getAllBrands();
        return view('clothes.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClothesStoreRequest $request)
    {
        $this->productRepository->store($request);
        return back()->with('success','Item created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = $this->productRepository->getAllBrands();
        $cloth = $this->productRepository->get($id);
        return view('clothes.edit', compact('brands','cloth'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClothesStoreRequest $request, $id)
    {
        $this->productRepository->update($id,$request);
        return back()->with('success','Item updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productRepository->delete($id);
        $clothes = $this->productRepository->all();
        return response()
        ->view('clothes.content', $clothes, 200)
        ->header('Content-Type', 'application/json');
    }


}
