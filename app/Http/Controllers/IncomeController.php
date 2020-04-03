<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Income;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::all();
        return json_encode($incomes);
    }

    public function show($id)
    {
        $income = Income::findOrFail($id);
        return json_encode($income);
    }

    public function store(Request $request)
    {
        $income = new Income();
        $income->title = request('title');
        $income->amount = request('amount');
        $income->start_date = request('start_date');
        $income->end_date = request('end_date');
        $income->user_id = request('user_id');
        $income->currency_id = request('currency_id');

        error_log($request);
        $income->save();
    }

    public function destroy($id)
    {
        $income = Income::findOrFail($id);
        $income->delete();
    }

}
