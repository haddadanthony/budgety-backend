<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\User;

class IncomeController extends Controller
{
    public function index()
    {
        $matches = ['user_id' => auth()->user()->id];
        $incomes = Income::where($matches)->with('currency')->with('category')->get();
        return json_encode($incomes);
    }

    public function show($id)
    {
        $income = Income::findOrFail($id);
        return json_encode($income);
    }

    public function store(Request $request)
    {
        $income = new Income(request()->all());
        $income->save();
    }

    public function destroy($id)
    {
        $matches = ['id' => $id, 'user_id' => auth()->user()->id];
        $income = Income::where($matches)->delete();
        if(!$income){
            return response()->json([
                'status' => 'failed',
                'message' => 'No income found'
            ], 500);
        }
       else
       {
            return response()->json([
                'status' => 'success',
            ], 200);
        }
    }

    public function update(Request $request, $id)
    {
        $income = Income::findOrFail($id);
        $inputs = $request->all();
        $income->fill($inputs);
        $income->update();
    }

}
