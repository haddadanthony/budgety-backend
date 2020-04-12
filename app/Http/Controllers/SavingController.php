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

    public function store()
    {
        $saving = new Saving(request()->all());
        $saving->save();
    }

    public function destroy($id)
    {
        $saving = Saving::findOrFail($id);
        $saving->delete();
    }

    public function update(Request $request, $id)
    {
        $saving = Saving::findOrFail($id);
        $inputs = $request->all();
        $saving->fill($inputs);
        $saving->update();
    }

}
