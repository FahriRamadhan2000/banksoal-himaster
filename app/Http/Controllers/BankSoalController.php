<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Matakuliah;

class BankSoalController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin']);
    }
    
    public function index()
    {
        $RecordSoal = DB::table('bank')->get();
        return view('admin/TabelBankSoal', ['RecordSoal' => $RecordSoal]);
    }

    public function create(Request $request)
    {
        // dd($request->all());

        //old input
        $request->flash();

        //pesan jika error
        $message = [
            'required' => ':attribute perlu diisi',
            'matakuliah.unique' => ':attribute tersebut telah tersedia',
            'digits' => ':attribute tersebut harus :digits digit',
            'in' => 'harus diisi sesuai pilihan'
        ];

        //aturan
        $rules = [
            'matakuliah' => 'required|unique:bank',
            'semester' => 'required|digits:1',
            'type' => 'required|in:uts,uas',
            'url' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return back()->withErrors($validator)->with('create-error', True);
        }


        Matakuliah::create([
            'matakuliah' => $request->matakuliah,
            'semester' => $request->semester,
            'type' => $request->type,
            'url' => $request->url,
        ]);
        return back()->with('success', 'Data Berhasil Dibuat!');
    }

    public function update (Request $request)
    {
        // dd($request->all());
        
        //old input
        $request->flash();

        //pesan jika tidak valid
        $message = [
            'required' => ':attribute perlu diisi',
            'digits' => ':attribute tersebut harus :digits digit',
            'in' => 'harus diisi sesuai pilihan'
        ];

        //filter
        $rules = [
            'edit_semester' => 'required|digits:1',
            'edit_type' => 'required|in:uts,uas',
            'edit_url' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()) {
            return back()->withErrors($validator)->with('edit-error', 'errorcuy');
        }

        Matakuliah::where('matakuliah', $request->edit_matakuliah)->update([
            'semester' => $request->edit_semester,
            'type' => $request->edit_type,
            'url' => $request->edit_url,
        ]);
        return back()->with('success', 'Data Berhasil Diupdate!');
    }

    public function delete (Request $request)
    {
        // dd($request->all());
        Matakuliah::where('matakuliah', $request->matakuliah)->delete();
        return back()->with('success', 'Data Berhasil Dihapus!');
    }

    public function search ($request="") 
    {
        $soal = Matakuliah::where('matakuliah', 'like', '%'.$request.'%')->get();
        $html = 
        '<table cellpadding="10" width="100%">
            <tr class="bg-info text-white">
                <th>Matakuliah</th>
                <th>Semester</th>
                <th>Type</th>
                <th>Url</th>
                <th>Action</th>
            </tr>';
        

        if (count ($soal) == 0) {
            $html .= '</table><h5 class="text-secondary text-center mt-4">Data Tidak Ditemukan</h5>';
            return $html;
        }
        

        foreach ($soal as $eachsoal) {
        $html.='
        <tr class="baris">
            <td class="matakuliah">'.$eachsoal->matakuliah.'</td>
            <td class="semester">'.$eachsoal->semester.'</td>
            <td class="type">'.$eachsoal->type.'</td>
            <td class="url">'.$eachsoal->url.'</td>
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
