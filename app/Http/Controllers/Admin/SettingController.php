<?php

namespace Unic\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Unic\Http\Controllers\Controller;
use Unic\Settings;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.index');
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
        //
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
        $setting = Settings::where('id', $id)->first();

        return view('admin.settings.edit', [
            'setting' => $setting
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
        $setting = Settings::where('id', $id)->first();
        $setting->fill($request->all());
        $setting->save();

        // Upload de Logo
        if (!empty($request->file('logo'))) {
            $setting->logo = $request->file('logo')->store('setting');
        }

        // Upload de Favico
        if (!empty($request->file('favico'))) {
            $setting->favico = $request->file('favico')->store('setting');
        }

        // Upload de Logo Admin
        if (!empty($request->file('logoadmin'))) {
            $setting->logo_admin = $request->file('logoadmin')->store('setting');
        }

        if (!$setting->save()) {
            return redirect()->back()->withInput()->withErrors();
        }

        return redirect()->route('admin.settings.edit', [
            'setting' => $setting->id
        ])->with(['color' => 'green', 'message' => 'Configuração do Site atualizada com sucesso!']);
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
