<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MateraiModel;
use App\Http\Requests\StoreMateraiModelRequest;
use App\Http\Requests\UpdateMateraiModelRequest;
use App\Models\Admin\AksesModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class MateraiModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data["title"] = "Materai";
        $data["hakTambah"] = AksesModel::leftJoin('tbl_menu', 'tbl_menu.menu_id', '=', 'tbl_akses.menu_id')
        ->where(array('tbl_akses.role_id' => Session::get('user')->role_id, 'tbl_menu.menu_judul' => 'Request', 
        'tbl_akses.akses_type' => 'create'))->count();
        
        return view ('Admin.Materai.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMateraiModelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MateraiModel $materaiModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MateraiModel $materaiModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMateraiModelRequest $request, MateraiModel $materaiModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MateraiModel $materaiModel)
    {
        //
    }
}
