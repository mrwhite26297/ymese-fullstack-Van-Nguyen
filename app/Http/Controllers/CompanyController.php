<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Storage;
use App\Models\issue;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listIssues()
    {
        $issues = issue::orderBy('id', 'desc')->paginate(5);

        return view('list-issues',compact('issues'));
    }

    public function create()
    {
        return view('create-issue');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only('content');
        // dd($data);
        $data['date'] =strtotime(now());
        // dd($data['date']);
        issue::create($data);

        // $pdf = PDF::loadview('issues',compact('data'));
        Storage::disk('local')->put($data['date'].".pdf",$data['content']);
        return redirect()->route('issues-list')
            ->with('success', 'Issue created successfully!');

        // $pdf = PDF::loadview('issues',compact('data'));
        // return $pdf->download("");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy( $company)
    {
        //
    }
}
