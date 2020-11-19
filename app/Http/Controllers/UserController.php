<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    //display all bank soal menu
    public function index()
    {
        $banks = DB::table('bank')->get();
        return view('users/index', ['banks' => $banks]);
    }

    //search specifiied matakuliah
    public function show($request = "")
    {
        $banks = DB::table('bank')
                ->where('matakuliah', 'like', "%$request%")
                ->get();
        $html = "";
        foreach ($banks as $bank) :
            $html.='
            <!-- Button BankSoal trigger modal -->
            <button type="button" class="btn btn-primary text-white mb-3" data-toggle="modal" data-target="#show-'.$bank->id.'">
                '.$bank->matakuliah.' ( '.$bank->type.')
            </button>

            <!-- Modal to Banksoal -->
            <div class="modal fade" id="show-'.$bank->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-secondary" id="exampleModalLongTitle">'.$bank->matakuliah.' ( '.$bank->type.') </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-secondary">
                            Apakah anda yakin ingin download soal ini?
                        </div>
                        <div class="modal-footer d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="download/'.$bank->matakuliah.'/'.Auth::user()->nim.'" target="_blank">Download</a>
                        </div>
                    </div>
                    <!-- modal-content End -->
                </div>
                <!-- modal-dialog-end  -->
            </div>
            <!-- modal-end --> ';
        endforeach;
        return $html;
    }
}
