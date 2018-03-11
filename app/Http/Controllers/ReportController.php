<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Transaction;
use Carbon\Carbon;
use DB;
use PDF;

class ReportController extends Controller
{
    public function index()
    {
    	$reports = Transaction::all();
    	return view('reports.index', compact('reports'));
    }

    public function postReport(Request $request)
    {
    	$start = Carbon::parse($request->start);
    	$end = Carbon::parse($request->end)->addDay();
    	$reports = DB::select('SELECT c.kode, c.name, SUM(r.qty) ITEM, SUM(r.total) TOTAL, (SELECT SUM(r.total) FROM reports r) GRANDTOTAL FROM reports r LEFT JOIN categories c ON c.id = r.category_id WHERE r.updated_at BETWEEN "' . $start . '" AND "' . $end . '" GROUP BY r.category_id');
    	// return view('reports.pdf', compact('reports', 'start', 'end'));
    	return PDF::loadView('reports.pdf', compact('reports', 'start', 'end'))->stream('Report_' . date_format(Carbon::now(), 'd-m-Y') . '.pdf');
    }
}
