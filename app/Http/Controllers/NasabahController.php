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

    public function store(Request $request) {
        dd($request->all());
        // Define your validation rules
        $rules = [
            'nama' => 'required|string|max:25',
            'nama_belakang' => 'required|string|max:50',
            'email' => 'required|email|max:50',
            'password' => 'required|string|max:50',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
        ];
    
        // Exclude the _token field from the request data
        $data = $request->except('_token');
    
        // Create a validator instance
        $validator = Validator::make($data, $rules);
  
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
  
        // $data['email'] = $request->email;
        // $data['name'] = $request->name;
        // $data['password'] = Hash::make($request->password);
  
        // DataNasabah::create($data);
  
        // return redirect()->route('user.index');
      }

    public function create() {
        return view('nasabah.create');
      }

    public function edit() {
        return view('nasabah.edit');
      }

}
