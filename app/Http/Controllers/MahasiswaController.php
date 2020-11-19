<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }
    
    public function index()
    {
        $RecordMahasiswa = DB::table('mahasiswa')->get();
        return view('admin/TabelMahasiswa', ['RecordMahasiswa' => $RecordMahasiswa]);
    }

    public function create(Request $request)
    {
        // dd($request->all());

        //old input
        $request->flash();

        //pesan jika error
        $message = [
            'required' => ':attribute perlu diisi',
            'nim.unique' => ':attribute tersebut telah tersedia',
            'between' => ':attribute tersebut harus antara :min - :max digit',
            'digits' => ':attribute tersebut harus :digits digit'
        ];

        //aturan
        $rules = [
            'nama' => 'required|between:4,64',
            'nim' => 'required|between:11,12|unique:mahasiswa',
            'angkatan' => 'required|digits:4',
            'password' => 'required|between:2,6'
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return back()->withErrors($validator)->with('create-error', True);
        }

        Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'angkatan' => $request->angkatan,
            'password' => $request->password,
        ]);
        return back()->with('success', 'Data Berhasil Dibuat!');
    }

    public function update (Request $request)
    {
        // dd($request->all());

        //old input
        $request->flash();

        //pesan jika error
        $message = [
            'required' => ':attribute perlu diisi',
            'between' => ':attribute tersebut harus antara :min - :max digit',
            'digits' => ':attribute tersebut harus :digits digit'
        ];

        //aturan
        $rules = [
            'edit_nama' => 'required|between:4,64',
            'edit_angkatan' => 'required|digits:4',
            'edit_password' => 'required|between:2,6'
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return back()->withErrors($validator)->with('edit-error', True);
        }

        Mahasiswa::where('nim', $request->edit_nim)->update([
            'nama' => $request->edit_nama,
            'angkatan' => $request->edit_angkatan,
            'password' => $request->edit_password,
        ]);
        return back()->with('success', 'Data Berhasil Diupdate!');
    }

    public function delete (Request $request)
    {
        // dd($request->all());
        Mahasiswa::where('nim', $request->nim)->delete();
        return back()->with('success', 'Data Berhasil Dihapus!');
    }

    public function search ($request="") {
        $mahasiswa = Mahasiswa::where('nama', 'like', '%'.$request.'%')->get();
        $html = 
        '<table cellpadding="10" width="100%">
            <tr class="bg-info text-white">
                <th>Nama</th>
                <th>NIM</th>
                <th>Angkatan</th>
                <th>Password</th>
                <th>Action</th>
            </tr>';
        
        if (count ($mahasiswa) == 0) {
            $html .= '</table><h5 class="text-secondary text-center mt-4">Data Tidak Ditemukan</h5>';
            return $html;
        }
        
        foreach ($mahasiswa as $eachmahasiswa) {
        $html.='
        <tr class="baris">
            <td class="nama">'.$eachmahasiswa->nama.'</td>
            <td class="nim">'.$eachmahasiswa->nim.'</td>
            <td class="angkatan">'.$eachmahasiswa->angkatan.'</td>
            <td class="password">'.$eachmahasiswa->password.'</td>
            <td>
                <div class="action d-flex">
                    <button type="button" class="edit-button btn btn-warning text-white mr-2" data-toggle="modal" data-target="#edit-form">
                        Edit
                    </button>
                    <button type="button" class="delete-button btn btn-danger text-white" data-toggle="modal" data-target="#delete-form">
                        Delete
                    </button>
                </div>
            </td>
        </tr>';
        }
        $html .= '</table>';
        return $html;
    }
}
