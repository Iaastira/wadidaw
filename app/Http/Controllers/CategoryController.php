<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Spatie\Activitylog\Models\Activity;
use DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.category.index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'nama'  => 'required|unique:categories'
        ]);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $newCat = new Category;
        $newCat->nama = $request->nama;
        $newCat->slug = str_slug($request->nama);
        $newCat->save();
        $response = [
            'errors'    => false,
            'message'   => 'Data saved successfully!'
        ];
        return response()->json($response, 200);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catId = Category::findOrFail($id);
        $response = [
            'data'      => $catId,
            'message'   => 'Data kategori dengan nama '.$catId->nama.'!'
        ];
        return response()->json($response, 200);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $catId = Category::findOrFail($id);
        $validator = \Validator::make($request->all(), [
            'nama'  => 'required|unique:categories,nama,'.$catId->id
        ]);
        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $catId->nama = $request->nama;
        $catId->slug = str_slug($request->nama);
        $catId->save();
        $response = [
            'data'      => $catId,
            'message'   => 'Category data successfully changed to '.$catId->nama.'!'
        ];
        return response()->json($response, 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::withCount('Article')->get();
        foreach($category as $row){
            if(($row->id == $id) && $row->article_count > 0){
                $response = [
                    'success' => 'error',
                    'type' => 'error',
                    'message' => 'Category cannot be deleted<br>because it still has active articles'
                ];
                return response()->json($response, 200);
            }
        }
        \DB::table('categories')->delete($id);
        $response = [
            'success' => 'success',
            'type' => 'success',
            'title' => 'success',
            'message' => 'Category successfully deleted'
        ];
        return response()->json($response, 200);
    }
}