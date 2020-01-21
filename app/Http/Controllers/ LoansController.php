<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Loan;
use App\Category;
use App\Department;
use App\Http\Requests\Loan\StoreRequest;
use App\Http\Requests\Loan\UpdateRequest;

class LoansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $loans = Loan::allowed()->get();

        return view('admin.loans.index', compact('loans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.loans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $this->authorize('create', new loan);

        $loan = Loan::create($request->all());

        return redirect()
            ->route('admin.loans.edit', $loan);
    }

    /**
     * Display the specified resource.
     *
     * @param Loan $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        return view('admin.loans.show', compact('loan'));
    }

    /**
     * Undocumented function
     *
     * @param Loan $loan
     * @return void
     */
    public function edit(Loan $loan)
    {
        $this->authorize('update', $loan);

        return view('admin.loans.edit', [
            'loan' => $loan,
            'tags' => Tag::all(),
            'categories' => Category::all(),
            'departments' => Department::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Loan $loan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Loan $loan)
    {
        $this->authorize('update', $loan);

        $loan->update($request->all());
        $loan->syncTags($request->get('tags'));
        $loan->departments()->detach();

        if($request->has('departments')){
            $loan->departments()->sync($request->get('departments'));
        }

        return redirect()
            ->route('admin.loans.edit', $loan)
            ->with('info', 'Prestamo actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Loan $loan
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Loan $loan)
    {
        $this->authorize('delete', $loan);

        $loan->delete();

        return back()
            ->with('info', 'Prestamo Eliminada con exito');
    }
}
