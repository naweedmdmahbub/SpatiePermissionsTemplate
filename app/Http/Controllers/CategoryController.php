<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\DB;
use Toastr;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('categories.view')) {
            abort(403, 'Unauthorized action.');
        }

        $categories = Category::all();
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()->can('categories.create')) {
            abort(403, 'Unauthorized action.');
        }

        $category = new Category();
        return view('categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('categories.create')) {
            abort(403, 'Unauthorized action.');
        }

        try{
            $input = $request->only('name', 'note', 'code');
            DB::beginTransaction();
            Category::create($input);
            Toastr::success('Category created successfully','Success');
            DB::commit();
            return redirect()->route('categories.index');
        }catch (Exception $ex){
            DB::rollBack();
            Toastr::warning('Category Create Failed');
            return redirect()->back()->withErrors(new \Illuminate\Support\MessageBag(['catch_exception'=>$ex->getMessage()]));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!auth()->user()->can('categories.view')) {
            abort(403, 'Unauthorized action.');
        }

        $category = Category::find($id);
        return view('categories.view', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->can('categories.edit')) {
            abort(403, 'Unauthorized action.');
        }

        $category = Category::find($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->can('categories.edit')) {
            abort(403, 'Unauthorized action.');
        }

        try{
            $input = $request->only('name', 'note', 'code');
            DB::beginTransaction();
            $category = Category::find($id);
            $category->fill($input)->update();
            Toastr::success('Category updated successfully','Success');
            DB::commit();
            return redirect()->route('categories.index');
        }catch (Exception $ex){
            DB::rollBack();
            Toastr::warning('Category Update Failed');
            return redirect()->back()->withErrors(new \Illuminate\Support\MessageBag(['catch_exception'=>$ex->getMessage()]));
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function delete($id)
    {
        if (!auth()->user()->can('categories.delete')) {
            abort(403, 'Unauthorized action.');
        }

        $category = Category::find($id);
        $category->delete();
        Toastr::success('Category deleted successfully','Success');
        return [
            'msg' => 'success'
        ];
    }
}
