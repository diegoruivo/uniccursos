<?php

namespace Unic\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Unic\CourseCategory;
use Unic\Http\Controllers\Controller;

class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CourseCategory::orderBy('position', 'ASC')->get();

        return view('admin.course_category.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.course_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoryCreate = CourseCategory::create($request->all());

        return redirect()->route('admin.course_category.edit', [
            'category' => $categoryCreate->id
        ])->with(['color' => 'green', 'message' => 'Categoria de Cursos cadastrada com sucesso!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = CourseCategory::where('id', $id)->first();

        return view('admin.course_category.edit', [
            'category' => $category
        ]);
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
        $categoryUpdate = CourseCategory::where('id', $id)->first();
        $categoryUpdate->fill($request->all());
        $categoryUpdate->save();

        // Upload de Imagem
        if (!empty($request->file('cover'))) {
            $categoryUpdate->cover = $request->file('cover')->store('course');
        }

        if (!$categoryUpdate->save()) {
            return redirect()->back()->withInput()->withErrors();
        }

        return redirect()->route('admin.course_category.edit', [
            'category' => $categoryUpdate->id
        ])->with(['color' => 'green', 'message' => 'Categoria de Cursos atualizada com sucesso!']);
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
}
