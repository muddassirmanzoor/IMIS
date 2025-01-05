<?php

namespace App\Http\Controllers;

use App\Repositories\DashboardRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class DashboardController extends Controller
{
    const CACHE_LIFE_TIME = 24;
    protected Carbon $expiresAt;
    protected DashboardRepository $componentOneRepository;

    public function __construct(DashboardRepository $dashboardRepository)
    {
        $this->expiresAt = Carbon::now()->addDays(self::CACHE_LIFE_TIME);
        $this->dashboardRepository = $dashboardRepository;
    }

    /**
     * @param Request $request
     * @return View
     */
    public function imis(Request $request) :View{

        $data = $this->dashboardRepository->getIMISData($request, $this->expiresAt);

        return view('dashboard', compact('data'));
    }

}
