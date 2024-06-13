<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::all();
        return response()->successWithData($vouchers);
    }
    public function show(Voucher $id)
    {
        return response()->successWithData($id);
    }

    public function update(Voucher $id, Request $request)
    {
        try{
            $validated =  $request->validate([
                'title' => ['required', 'string', 'max:255', 'unique:vouchers,title,'.$id->id],
                'discount' => ['required', 'numeric'],
                'quota' => ['required', 'numeric', 'min:1'],
                'active_at' => ['required', 'date', 'before:expire_at'],
                'expire_at' => ['required', 'date', 'after:active_date']
            ]);
        }catch(ValidationException $validator){
            return response()->invalidEntity($validator->errors());
        }

        $id->update($validated);

        return response()->successWithData($id, 'Voucher successully updated.');
    }

    public function destroy(Voucher $id)
    {
        $id->delete();
        return response()->success('Voucher successfully deleted.');
    }
}
