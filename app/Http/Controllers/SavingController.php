<?php

namespace App\Http\Controllers;

use App\Saving;
use Illuminate\Http\Request;

class SavingController extends Controller
{
    public function index()
    {
        $saving = Saving::all();
        return json_encode($saving);
    }

    public function show($id)
    {
        $persons = [1 => "anthony", 2 => "samar"];
        $saving = Saving::findOrFail($id);
        return json_encode(["status" => "success", "persons" => $persons, "saving" => $saving]);
    }

}
