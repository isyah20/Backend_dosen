<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\dosen;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class dosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = dosen::all();

        if($data){
            return ApiFormatter::createApi(200, 'success', $data);
        }else{
            return ApiFormatter::createApi(400, 'Failed');
        }
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
        try {
            $request->validate([
                'username' => 'required ',
                'address' => 'required '
            ]);

            $dosen = dosen::create([
                'username' => $request->username,
                'address' => $request->address
            ]);

            $data = dosen::where('id', '=', $dosen->id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'success', $data);
            }else{
                return ApiFormatter::createApi(400, 'Failed');
            }

        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = dosen::where('id', '=', $id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'success', $data);
            }else{
                return ApiFormatter::createApi(400, 'Failed');
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try {
            $request->validate([
                'username' => 'required ',
                'address' => 'required '
            ]);

            $dosen = dosen::findOrfail($id);

            $dosen->update([
                'username' => $request->username,
                'address' => $request->address
            ]);

            $data = dosen::where('id', '=', $dosen->id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'success', $data);
            }else{
                return ApiFormatter::createApi(400, 'Failed');
            }

        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $dosen = dosen::findOrfail($id);

            $data = $dosen->delete();

            if($data){
                return ApiFormatter::createApi(200, 'success delete data', $data);
            }else{
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
        
    }
}
