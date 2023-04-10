<?php

namespace App\Library;

use App\Models\Wallet;
use Illuminate\Support\Facades\Log;

class WalletService
{
    private Wallet $wallet;

    public function __construct(Wallet $wallet)
    {
        $this->wallet = $wallet;
    }


    public function insert($amount)
    {
        try {
            $this->wallet->increment('balance', $amount);
            $this->wallet->update();

            return $this->wallet->balance;
        } catch (\Exception|\Throwable $e) {
            Log::error($e);

            return $e;
        }
    }

    public function substruct($amount)
    {
        try {
            if ($this->wallet->balance - $amount < 0) {
                throw new \Exception("Insufficient balance.");
            }

            $this->wallet->decrement('balance', $amount);
            $this->wallet->update();

            return $this->wallet->balance;
        } catch (\Exception|\Throwable $e) {
            Log::error($e);

            return $e;
        }
    }

    public function fetch()
    {
        try {
            return $this->wallet->balance;
        } catch (\Exception | \Throwable $e){
            Log::error($e);

            return $e;
        }
    }
}
