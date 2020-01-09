<?php

namespace App\Http\Controllers;

use App\Category;
use App\Icon;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * parent categories
     */
    public function index()
    {
        $title = trans('app.categories');
        $categories = Category::where('category_id', 0)->orderBy('category_name', 'asc')->get();
        $icons = Icon::all();

        return view('admin.categories', compact('title', 'categories','icons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'category_name' => 'required',
            'category_type' => 'required',
            'category_icon' => 'required',
        ];
        $this->validate($request, $rules);

        $parent_category_id = 0;
        if ($request->parent_category){
            $parent_category_id = $request->parent_category;
        }

        $slug = str_slug($request->category_name);
        $duplicate = Category::where('category_slug', $slug)->whereCategoryId($parent_category_id)->count();
        if ($duplicate > 0){
            return back()->with('error', trans('app.category_exists_in_db'));
        }

        $data = [
            'category_name' => $request->category_name,
            'category_slug' => $slug,
            'category_id'   => $parent_category_id,
            'description'   => $request->description,
            'category_type' => $request->category_type,
            'category_icon' => $request->category_icon,
        ];

        Category::create($data);
        return back()->with('success', trans('app.category_created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = null)
    {
        $title = trans('app.categories');
        $is_category_single = false;
        $category = false;
        if ($id){
            $category = Category::find($id);
            if ($category){
                $title = $category->category_name;
                $is_category_single = true;
            }
        }

        $top_categories = Category::whereCategoryId(0)->orderBy('category_name', 'asc')->get();
        return view('page_categories', compact('top_categories', 'title','category','id', 'is_category_single'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = trans('app.edit_category');
        $edit_category = Category::find($id);

        $categories = Category::where('category_id', 0)->get();
        $icons      = Icon::all();

        if ( ! $edit_category)
            return redirect(route('parent_categories'))->with('error', trans('app.request_url_not_found'));

        return view('admin.edit-category', compact('title', 'categories','icons', 'edit_category'));

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
        $rules = [
            'category_name' => 'required',
            'category_icon' => 'required',
        ];

        $this->validate($request, $rules);

        $slug = str_slug($request->category_name);

        $duplicate = Category::where('category_slug', $slug)->where('id', '!=', $id)->count();

        if ($duplicate > 0){
            return back()->with('error', trans('app.category_exists_in_db'));
        }

        $data = [
            'category_name' => $request->category_name,
            'category_slug' => $slug,
            'category_id'   => $request->parent_category,
            'description'   => $request->description,
            'category_icon' => $request->category_icon,
        ];

        Category::where('id', $id)->update($data);

        return back()->with('success', trans('app.category_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Request $request)
    {
        $id = $request->data_id;
        
        $delete = Category::where('id', $id)->delete();
        if ($delete){
            return ['success' => 1, 'msg' => trans('app.category_deleted_success')];
        }
        return ['success' => 0, 'msg' => trans('app.error_msg')];
    }
}
