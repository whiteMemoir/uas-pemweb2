<?php

namespace App\Http\Controllers;

use App\Models\DataNasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class NasabahController extends Controller
{
    public function index() {
        $data = DataNasabah::get();

        return view('nasabah.index', compact(['data']));
    }

    public function create() {
      return view('nasabah.create');
    }

    public function store(Request $request) {
      dd($request->all());
      $rules = [
          'nama' => 'required|string|max:25',
          'nama_belakang' => 'required|string|max:50',
          'email' => 'required|email|max:50',
          'telepon' => 'required|string|max:15',
          'alamat' => 'required|string',
          'avatar' => 'nullable|string|max:55',
      ];
      $data = $request->except('_token');
      $validator = Validator::make($data, $rules);
      if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
      DataNasabah::create($data);

      return redirect()->route('client.index');
    }

    public function edit(Request $request, $id) {
      $data = DataNasabah::find($id);

      return view('nasabah.edit', compact('data'));
      
    }

    public function update(Request $request,$id) {
      $rules = [
          'nama' => 'required|string|max:25',
          'nama_belakang' => 'required|string|max:50',
          'email' => 'required|email|max:50',
          'telepon' => 'required|string|max:15',
          'alamat' => 'required|string',
          'avatar' => 'nullable|string|max:55',
      ];

      $data = $request->except('_token');
      $validator = Validator::make($data, $rules);
      if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
      DataNasabah::whereId($id)->update($data);

      return redirect()->route('client.index');
    }

    public function delete(Request $request, $id) {
      $data = DataNasabah::find($id);

      if ($data) {
        $data->delete();
      }

      return redirect()->route('client.index');
    }

}
