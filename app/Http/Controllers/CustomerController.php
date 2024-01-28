<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return view('customers', [
            'customers' => Customer::paginate(10)
        ]);
    }

    function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email:rfc,dns',
            'mobile' => 'required|string|max:11|min:11',
        ]);

        try {
            Customer::create($validated);
            return back()->withSuccess('Successful')->withInput($validated);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->withError($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            Customer::whereId($id)->delete();

            return back()->withSuccess('Deleted');
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        }
    }
}
