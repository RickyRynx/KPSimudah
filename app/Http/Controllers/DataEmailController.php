<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataEmail;

class DataEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = DataEmail::all();
        return view('adminSimudah.dataEmail.show', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emails = new DataEmail();
        return view('adminSimudah.dataEmail.tambah', compact('emails'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|unique:data_emails,nama',
            'email' => 'required|unique:data_emails,email',
        ]);

        DataEmail::create($validateData);
        return redirect()->route('email.index')->with('success', 'Data Email berhasil ditambahkan.');
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
        $email = DataEmail::findOrFail($id);
        return view('adminSimudah.dataEmail.edit', compact('email'));
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
        $validateData = $request->validate([
            'nama' => 'required',
            'email' => 'required',
        ]);

        $email = DataEmail::findOrFail($id);
        $email->update($validateData);

        return redirect()->route('email.index')->with('success', 'Data Email berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $email = DataEmail::findOrFail($id);
        $email->delete();
    
        return redirect()->route('email.index')->with('success', 'Data Email berhasil dihapus.');
    }
}
