<?php

namespace Unic\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Unic\Http\Controllers\Controller;
use Unic\Page;
use Unic\PageImage;
use Unic\Support\Cropper;
use Unic\Http\Requests\Admin\Page as PageRequest;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderBy('position', 'ASC')->get();

        return view('admin.pages.index', [
            'pages' => $pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $pageCreate = Page::create($request->all());

        if ($request->allFiles()) {
            foreach ($request->allFiles()['files'] as $image) {
                $pageImage = new PageImage();
                $pageImage->page = $pageCreate->id;
                $pageImage->path = $image->store('pages/' . $pageCreate->id);
                $pageImage->save();
                unset($pageImage);
            }
        }

        return redirect()->route('admin.pages.edit', [
            'page' => $pageCreate->id
        ])->with(['color' => 'green', 'message' => 'Página cadastrada com sucesso!']);
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
        $page = Page::where('id', $id)->first();

        return view('admin.pages.edit', [
            'page' => $page
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $id)
    {
        $pageUpdate = Page::where('id', $id)->first();
        $pageUpdate->fill($request->all());
        $pageUpdate->save();

        if ($request->allFiles()) {
            foreach ($request->allFiles()['files'] as $image) {
                $pageImage = new PageImage();
                $pageImage->page = $pageUpdate->id;
                $pageImage->path = $image->store('pages/' . $pageUpdate->id);
                $pageImage->save();
                unset($pageImage);
            }
        }


        return redirect()->route('admin.pages.edit', [
            'page' => $pageUpdate->id
        ])->with(['color' => 'green', 'message' => 'Página atualizada com sucesso!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $pageDestroy = Page::destroy($page->id);

        return redirect()->route('admin.pages.index', [
            'page' => $page->id
        ])->with(['color' => 'green', 'message' => 'Página excluída com sucesso!']);
    }



    public function imageSetCover(Request $request)
    {
        $imageSetCover = PageImage::where('id', $request->image)->first();
        $allImage = PageImage::where('page', $imageSetCover->page)->get();

        foreach ($allImage as $image) {
            $image->cover = null;
            $image->save();
        }

        $imageSetCover->cover = true;
        $imageSetCover->save();

        $json = [
            'success' => true
        ];

        return response()->json($json);
    }

    public function imageRemove(Request $request)
    {
        $imageDelete= PageImage::where('id', $request->image)->first();

        Storage::delete($imageDelete->path);
        Cropper::flush($imageDelete->path);
        $imageDelete->delete();

        $json = [
            'success' => true
        ];

        return response()->json($json);
    }


}
