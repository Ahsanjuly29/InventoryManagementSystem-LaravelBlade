<?php

namespace App\Http\Controllers;

use App\Models\Suppliers;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function index()
    {
        return view('suppliers', [
            'suppliers' => Suppliers::paginate(10)
        ]);
    }

    function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'phone' => 'required|string|max:11|min:11'
        ]);

        try {
            Suppliers::create($validated);
            return back()->withSuccess('Successful')->withInput($validated);
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            Suppliers::whereId($id)->delete();

            return back()->withSuccess('Deleted');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }
}
