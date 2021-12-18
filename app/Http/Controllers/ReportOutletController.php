<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use DB;

class ReportOutletController extends ApiController
{
    public function monthly(Request $request)
    {
        // Get user from $request token.
        if (! $user = auth()->setRequest($request)->user()) {
            return $this->responseUnauthorized();
        }

        $query = DB::table('merchants')
            ->leftJoin('outlets', 'merchants.id', '=', 'outlets.merchant_id')
            ->leftJoin('transactions', 'merchants.id', '=', 'transactions.merchant_id')
            ->where('merchants.user_id', '=', auth()->user()->id)
            ->select('merchants.merchant_name', 'transactions.bill_total', 'merchants.user_id', 'outlets.outlet_name')
            ->selectRaw('DATE_FORMAT(transactions.created_at, "%Y-%m-%d") as date')
            ->orderBy('transactions.created_at', 'ASC')
            ->get();

        $bulan = 11;
        $startDate = Carbon::parse('2021-' . $bulan)->startOfMonth();
        $endDate = Carbon::parse('2021-' . $bulan)->endOfMonth();
        $periode = CarbonPeriod::create($startDate, $endDate);

        $omzetHarian = [];
        foreach ($periode as $date) {
            $omzetHarian[] = [
                'merchant' => $query->where('user_id', auth()->user()->id)->first()->merchant_name ?? '',
                'outlet' => $query->where('user_id', auth()->user()->id)->first()->outlet_name ?? '',
                'tanggal' => $date->toDateString(),
                'total' => $query->where('date', $date->toDateString())->first()->bill_total ?? 0,
            ];
        }

        return [
            'omzet' => $omzetHarian,
        ];
    }
}
