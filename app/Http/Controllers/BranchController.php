<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    //
    public function index(Request $request)
    {
        $branches = Branch::all();
        return view('admin.branch.index')
            ->with('branches', $branches);
    }

    public function create(Request $request)
    {
        return view('admin.branch.create');
    }

    public function postCreate(Request $request)
    {
        $form = $request->get('branch');
        $branchNew = new Branch();
        $branchNew->fill($form);
        $branchNew->save();
        return redirect('/admin/branch');
    }

    public function edit(Request $request, $id)
    {
        $branch = Branch::where('id', $id)->first();
        return view('admin.branch.edit')
            ->with('branch', $branch);
    }

    public function postEdit(Request $request, $id)
    {
        $form = $request->get('branch');
        $branchEdit = Branch::where('id', $id)->first();
        $branchEdit->fill($form);
        $branchEdit->save();
        return redirect('/admin/branch');
    }

    public function postDelete(Request $request, $id)
    {
        $branchDelete = Branch::where('id', $id)->first();
        $branchDelete->delete();
        return redirect('/admin/branch');
    }
}
