<?php

namespace App\Http\Controllers;

use App\Models\income;
use App\Models\User;
use App\Models\clent;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $income = income::orderby('id','desc')->paginate(20);
        Paginator::useBootstrap();
        return view('backend.pages.income.index',compact('income'));
    }
    public function incomefromclient(Request $request)
    {
        $clent = User::where('id',$request->id)->first();
        $income = income::where('client_id',$request->id)->get();
        Paginator::useBootstrap();
        return view('backend.pages.income.incomefromclient',compact('income','clent'));
    }
    public function filter(Request $request)
    {
        $startDate = $request->from;
        $endDate = $request->to;
        $income = income::whereBetween('created_at', [$startDate, $endDate])->orderBy('id','desc')->get();
        return view('backend.pages.income.indexfilter',compact('income'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client_id = User::orderby('id','desc')->get();
        return view('backend.pages.income.create',compact('client_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $income = new income();
        $income->amount = $request->amount;
        $income->client_id = $request->client_id;
        $income->name = $request->name;
        $income->paymentmtd = $request->paymentmtd;
        $income->remark = $request->remark;
        $income->save();
        return redirect()->back()->with('status','New income Added Sucessfully');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function deleteincome($income_id)
    {
        $income = income::where('id',$income_id)->first();
        $income->delete();
        return back()->with('status', 'income has been successfully delete!');
    }

    public function showincome($id)
    {
        $data = income::find($id);
        $client_id = User::orderby('id','desc')->get();
        return view('backend.pages.income.edit', ['data' => $data], compact('client_id'));
    }

    public function update(Request $request, $id)
    {
        $income = income::find($id);
        $income->amount = $request->amount;
        $income->client_id = $request->client_id;
        $income->name = $request->name;
        $income->paymentmtd = $request->paymentmtd;
        $income->remark = $request->remark;
        $income->save();
        return $this->index()->with('status','income detail Updated Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */

    // update Status
    public function incomestatus($id){
        $income = income::findorfail($id);
        if($income != null){
            if($income->status == 'active'){
                $income->status = 'inactive';
            }else{
                $income->status = 'active';
            }
            $income->save();
            return back()->with('success','Status Updated Succesfully !');
        }else{
            return back()->with('error','Sorry income Didnot Found.');
        }
    }
    // update Status
    public function payment_status($id){
        $income = income::findorfail($id);
        if($income != null){
            if($income->payment_status == 'paid'){
                $income->payment_status = 'not-paid';
            }else{
                $income->payment_status = 'paid';
            }
            $income->save();
            return back()->with('success','payment_status Updated Succesfully !');
        }else{
            return back()->with('error','Sorry payment_status Didnot Found.');
        }
    }
}

