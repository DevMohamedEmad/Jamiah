<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\attachment;
use App\Models\meeting;
use App\Models\vote;
use App\Models\Company;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VoteController extends Controller
{
    public function create(Request $request ,Company $company ,meeting $meeting)
    {
                $meetings = $company->meetings;
        for ($i=0; $i < count($meetings); $i++) {
            if($meeting->id == $meetings[$i]->id){
                $attachments =  $meeting->attachments()->latest()->paginate(3);
            return View('user.votes.create', compact('company', 'attachments','meeting'));
            }
        }
        $attachments = [];
        return View('user.votes.create', compact('company', 'attachments'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'vote' => 'required',
            'company_id' => ['required', 'exists:App\Models\Company,id'],
            'attachment_id' => ['required', 'exists:App\Models\attachment,id']
        ]);
        $attachment = attachment::where('id', $request->attachment_id)->first();
        $votes = vote::where('company_id', $request->company_id)->get();

        foreach ($votes as $vote) {
            if ($vote->attachment_id == $request->attachment_id) {
                return redirect()->back()->withErrors(['error' => 'لقد قمت بالتصويت من قبل']);
            }
        }
        vote::create([
            'vote' => $request->vote,
            'company_id' => $request->company_id,
            'attachment_id' => $request->attachment_id
        ]);
        $meeting = meeting::where('id', $attachment->meeting_id)->first();
        $meeting->count_votes = $meeting->count_votes + 1;
        $meeting->save();
        return redirect()->back()->with('success', 'تم حفظ التصويت');
    }

}
