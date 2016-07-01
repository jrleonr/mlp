<?php

namespace App\Migration;

use DB;

/**
 * Concrete implementation of Regular Json
 */
class RegularJson extends Migrate
{
    public function migrate($data = '')
    {
        if (! $data) {
            return "Not data provided";
        }

        foreach ($data['providers'][0]['blocks'] as $data) {
            //start transaction
            DB::beginTransaction();

            try {
                foreach ($data['slots'] as $slot) {
                    DB::table('providers')->insert([
                        "provider_id" => $slot["id"],
                        "sport" => $slot["sport"],
                        "format" => $slot["format"],
                        "venue" => $slot["venue"],
                        "pitch" => $slot["pitch"],
                        "start" => $slot["start"],
                        "end" => $slot["end"],
                        "availability" => $slot["availability"],
                        "price" => $slot["price"]
                    ]);
                }
                //save data if everything went well   
                DB::commit();
            } catch (Exception $e) {
                //if any exception was sent, just rollback
                DB::rollback();
                throw $e;
            }
        }
    }
}
