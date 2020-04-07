<?php

namespace Unic\Http\Controllers\Admin;

use Unic\Http\Requests\Admin\Course as CourseRequest;
use Illuminate\Http\Request;
use Unic\Course;
use Unic\Http\Controllers\Controller;
use Unic\CourseCategory;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $courses = Course::all();
        return view('admin.courses.index', [
            'courses' => $courses
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CourseCategory::all();

        return view('admin.courses.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $courseCreate = Course::create($request->all());

        return redirect()->route('admin.courses.edit', [
            'course' => $courseCreate->id
        ])->with(['color' => 'green', 'message' => 'Curso cadastrado com sucesso!']);
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
        $course = Course::where('id', $id)->first();
        $categories = CourseCategory::all();

        return view('admin.courses.edit', [
            'course' => $course,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, $id)
    {
        $courseUpdate = Course::where('id', $id)->first();
        $courseUpdate->fill($request->all());
        $courseUpdate->save();

        // Upload de Imagem
        if (!empty($request->file('cover'))) {
            $courseUpdate->cover = $request->file('cover')->store('course');
        }

        if (!$courseUpdate->save()) {
            return redirect()->back()->withInput()->withErrors();
        }

            return redirect()->route('admin.courses.edit', [
            'course' => $courseUpdate->id
        ])->with(['color' => 'green', 'message' => 'Curso atualizado com sucesso!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $courseDestroy = Course::destroy($course->id);

        return redirect()->route('admin.courses.index', [
            'course' => $course->id
        ])->with(['color' => 'green', 'message' => 'Curso excluído com sucesso!']);
    }
}