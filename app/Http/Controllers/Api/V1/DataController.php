<?php

namespace App\Http\Controllers\Api\V1;

use Exception;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Migration\RegularJson;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{

    /**
     * This store the JSON data into the database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! $request->hasFile('json')) {
            return response()->json([
                'error' => [
                    'message' => 'Please provide a valid JSON file.'
                ]
           ], 400);
        }

        //save file
        Storage::put('data.json', file_get_contents($request->file('json')->getRealPath()));

        //save the json into variable
        $data = json_decode(Storage::disk('local')->get('data.json'), true);

        //execute the implementation
        try {
            //if you want to change the migration to another one
            //just implements a new migration method extending the main class
            $migration = (new RegularJson)->execute($data);
        } catch (Exception $e) {
            return response()->json([
                'error' => [
                    'message' => 'Something went wrong. Database rollback.'
                ]
            ], 500);
        }
       
        
        return response()->json([
            'success' => [
                'message' => 'Data imported from JSON File'
            ]
        ], 200);
    }
}
