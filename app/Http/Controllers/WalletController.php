<?php

namespace App\Http\Controllers;

use App\Http\Requests\InsertRequest;
use App\Http\Requests\SubstructRequest;
use App\Library\WalletService;
use App\Models\Wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    public function index(Request $request, $page = 1, $limit = 10)
    {
        $wallets = Wallet::orderBy('created_at')->paginate($limit, ['*'], 'page', $page);

        return response()->json($wallets->toArray());
    }

    public function insert(InsertRequest $request)
    {
        try {
            $walletService = new WalletService(Wallet::where('customer_id', $request->customer_id)->firstOrFail());

            return response()->json($walletService->insert($request->amount));
        } catch (\Exception|\Throwable $e) {
            return response()->json("Sorry! " . $e->getMessage());
        }
    }

    public function substruct(SubstructRequest $request)
    {
        try {
            $walletService = new WalletService(Wallet::where('customer_id', $request->customer_id)->firstOrFail());

            return response()->json($walletService->substruct($request->amount));
        } catch (\Exception|\Throwable $e) {
            return response()->json("Sorry! " . $e->getMessage());
        }
    }

    public function fetch(Request $request, $id)
    {
        $walletService = new WalletService(Wallet::where('customer_id', $id)->firstOrFail());

        return $walletService->fetch();
    }
}
