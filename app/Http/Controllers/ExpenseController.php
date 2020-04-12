<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $matches = ['user_id' => auth()->user()->id];
        $expense = Expense::where($matches)->with('currency')->with('category')->get();
        return json_encode($expense);
    }

    public function show($id)
    {
        $expense = Expense::findOrFail($id);
        return json_encode($expense);
    }

    public function store(Request $request)
    {
        $expense = new Expense();
        $expense->title = request('title');
        $expense->amount = request('amount');
        $expense->start_date = request('start_date');
        $expense->end_date = request('end_date');
        $expense->user_id = request('user_id');
        $expense->currency_id = request('currency_id');

        $expense->save();
    }

    public function destroy($id)
    {
        $matches = ['id' => $id, 'user_id' => auth()->user()->id];
        $expense = Expense::where($matches)->delete();
        if(!$expense){
            return response()->json([
                'status' => 'failed',
                'message' => 'No expense found'
            ], 500);
        }
       else
       {
            return response()->json([
                'status' => 'success',
            ], 200);
        };
    }
    
    public function update(Request $request, $id)
    {
        $expense = Expense::findOrFail($id);
        $inputs = $request->all();
        $expense->fill($inputs);
        $expense->update();
    }
}
