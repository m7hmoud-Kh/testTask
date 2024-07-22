<?php

namespace App\Http\Controllers;

use App\Http\Requests\Journal\StoreJournalRequest;
use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index(Request $request)
    {
        $allJournal = Journal::where('shipping_id',$request->shippingId)->get();
        return view('journal.all',[
            'allJournal' => $allJournal
        ]);
    }

    public function create(Request $request)
    {
        return view('journal.create',[
            'shippingId' => $request->shippingId
        ]);
    }

    public function store(StoreJournalRequest $request)
    {
        $journal = new Journal($request->validated());
        $journal->save();
        return redirect()->route('shipping.index')->with([
            'success' => 'Journal Added Successfully'
        ]);
    }


    public function destory($journalId)
    {
        $journal = Journal::find($journalId);
        if($journal){
            $shippingId= $journal->shipping_id;
            $journal->delete();
            return redirect()->route('journals.index',$shippingId)->with([
                'success' => 'Journal Deleted Successfully'
            ]);
        }
    }

}
