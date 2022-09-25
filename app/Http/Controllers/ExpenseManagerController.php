<?php

namespace App\Http\Controllers;

use App\Models\ExpenseManager;
use Illuminate\Http\Request;
use Faker\Generator as Faker;
use Str;

class ExpenseManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $expense = new ExpenseManager;

        return $expense
        ->whereBetween('date_applied', [$request->from ?? null, $request->to ?? null])
        ->orWhere('status', $request->new ?? null)
        ->orWhere('status', $request->reinburse ?? null)
        ->when($request->has('min'), function($query) use ($request) {
            if($request->min) {
                $query->orWhere('total', ">", $request->min);
            }
        })
        ->orWhere('total', "<", $request->max ?? 0)
        ->orWhere('marchant', $request->taxi ?? null)
        ->orWhere('marchant', $request->rental_car ?? null)
        ->orWhere('marchant', $request->shuttle ?? null)
        ->orWhere('marchant', $request->hotel ?? null)
        ->orderBy('created_at', 'DESC')->get();

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
    public function store(Request $request, Faker $faker)
    {
        //
        $expense = new ExpenseManager;

        // $expense->comment = Str::random(7);
        // $expense->marchant = $faker->randomElement(['taxi', 'rental_car', 'shuttle', 'hotel']);
        // $expense->status = $faker->randomElement(['new', 'in_progress', 'reinburse']);
        // $expense->total = rand(1,5);
        // $expense->date_applied = $faker->date('Y-m-d H:i:s');

        $expense->comment = $request->comment;
        $expense->marchant = $request->marchant;
        $expense->status = $request->status;
        $expense->total = $request->total;
        $expense->date_applied = $request->date_applied;

        $expense->save();

        return $expense;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpenseManager  $expenseManager
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseManager $expenseManager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpenseManager  $expenseManager
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseManager $expenseManager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpenseManager  $expenseManager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpenseManager $expenseManager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseManager  $expenseManager
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseManager $expenseManager)
    {
        //
    }
}
