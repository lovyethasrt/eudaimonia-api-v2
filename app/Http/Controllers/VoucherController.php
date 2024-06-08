<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

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
}
