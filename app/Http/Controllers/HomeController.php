<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index() {
      $data = User::get();

      return view('index', compact('data'));
    }

    public function create() {
      return view('create');
    }

    public function store(Request $request) {
        $rules = [
          'nama' => 'required|string|max:25',
          'nama_belakang' => 'required|string|max:50',
          'email' => 'required|email|max:50',
          'password' => 'required|string|max:50',
          'telepon' => 'required|string|max:15',
          'alamat' => 'required|string',
          'avatar' => 'nullable|string|max:55',
      ];

      $data = $request->except('_token');
      $validator = Validator::make($data, $rules);
      if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
      $data['password'] = Hash::make($request->password);
      User::create($data);

      return redirect()->route('user.index');
    }

    public function edit(Request $request, $id) {
      $data = User::find($id);

      return view('edit', compact(['data']));
      
    }

    public function update(Request $request, $id) {
      // dd($request->all());
      $rules = [
        'nama' => 'nullable|string|max:25',
        'nama_belakang' => 'nullable|string|max:50',
        'email' => 'nullable|email|max:50',
        'password' => 'max:50',
        'telepon' => 'nullable|string|max:15',
        'alamat' => 'nullable|string',
        'avatar' => 'nullable|string|max:55',
      ];

      $data = $request->except('_token', '_method');
      $validator = Validator::make($data, $rules);
      if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);


      if ($request->password) {
        $data['password'] = Hash::make($request->password);
      }

      User::whereId($id)->update($data);

      return redirect()->route('user.index');
      
    }

    public function delete(Request $request, $id) {
      $data = User::find($id);

      if ($data) {
        $data->delete();
      }

      return redirect()->route('user.index');
    }
}
