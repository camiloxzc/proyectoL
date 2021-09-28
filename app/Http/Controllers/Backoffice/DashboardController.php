<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * This method will show the dashboard.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('backoffice.index');
    }
}
