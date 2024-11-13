<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        try{
            $data = Barang::all();
            return response()->json([
                "status" => true,
                "message" => "Get successful",
                "data" => $data
            ], 200); //status code 200 = success
        }

        catch(Exception $e){
            return response()->json([
                "status" => false,
                "message" => "Something went wrong",
                "data" => $e->getMessage()
            ], 400); //status code 400 = bad request
        }
    }

    /**
     * Store a newly created resource in storage.
     */

    public function show($id){
        try{
            $data = Barang::find($id);
            if(!$data){
                return response()->json([
                    "status" => false,
                    "message" => "Data Not Found",
                    "data" => null
                ], 404);
            }
            return response()->json([
                "status" => true,
                "message" => "Get successful",
                "data" => $data
            ], 200); //status code 200 = success
        }

        catch(Exception $e){
            return response()->json([
                "status" => false,
                "message" => "Something went wrong",
                "data" => $e->getMessage()
            ], 400); //status code 400 = bad request
        }
    }

    public function store(Request $request)
    {
        try{
            $data = Barang::create($request->all());
            return response()->json([
                "status" => true,
                "message" => "Create successful",
                "data" => $data
            ], 200);
        }catch(Exception $e){
            return response()->json([
                "status" => false,
                "message" => "Something went wrong",
                "data" => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $barang)
    {
        try{
            $data = Barang::find($barang);
            $data->update($request->all());
            return response()->json([
                "status" => true,
                "message" => "Update successful",
                "data" => $data
            ], 200);
        }catch(Exception $e){
            return response()->json([
                "status" => false,
                "message" => "Something went wrong",
                "data" => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($barang)
    {
        try{
            $data = Barang::find($barang);
            $data->delete();
            return response()->json([
                "status" => true,
                "message" => "Delete successful",
                "data" => $data
            ], 200);
        }catch(Exception $e){
            return response()->json([
                "status" => false,
                "message" => "Something went wrong",
                "data" => $e->getMessage()
            ], 400);
        }
    }
}
