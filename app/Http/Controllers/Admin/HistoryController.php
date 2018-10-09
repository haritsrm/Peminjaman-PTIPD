<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use App\History;
use Session;

class HistoryController extends BaseController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = History::all();
        return view('admin.showhistory')->with('val', $data);
    }
}