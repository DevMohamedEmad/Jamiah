<?php

namespace App\Http\Controllers;

use App\Models\attachment;
use App\Models\Company;
use App\Models\meeting;
use App\Models\meeting_company;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function index()
    {
        return View('dashboard.meetings.index', ['meetings' => meeting::latest()->paginate(5)]);
    }

    public function create()
    {
        return View('dashboard.meetings.create');
    }
    
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name'      => 'required',
            'time'      => 'required',
            'date'      => 'required',
            'companies' => 'required'
        ]);
        //declaration
        $attachment_files = $request->file;
        $attachments_name = $request->attachment_name;
        $meeting = meeting::create(
            [
                'link' => $request->link,
                'name' => $request->name,
                'time' => $request->time,
                'date' => $request->date,
                'file' => "jj"

            ]
        );
        // store the companies records
        $this->store_excel_data($meeting, $request->companies);
        $stored_file  = $this->store_file($meeting->name . $meeting->id, $request->companies);
        $meeting->file = $stored_file;
       
        $meeting->save();

        //attachments
        if($request->attachment != []){
             for ($i = 0; $i < count($attachment_files); $i++) {
            $stored_file  = $this->store_file($meeting->name . $attachments_name[$i], $attachment_files[$i]);
            attachment::create([
                'meeting_id' => $meeting->id,
                'file' => $stored_file,
                'name' => $attachments_name[$i]
            ]);
        }
        }
       
        return redirect()->route('meetings')->with(['success' => ' تم حفظ الاجتماع بنجاح']);
    }

    public function show(meeting $meeting)
    {
        $saved = 0;
        $accepted = 0;
        $rejected = 0;
        $total = 0;
        $votes = [];
        $attachments = $meeting->attachments;
        for ($j = 0; $j < count($attachments); $j++) {
            if ($attachments[$j]->votes != []) {
                for ($i = 0; $i < count($attachments[$j]->votes); $i++) {
                    if ($i == 0) {
                        $votes[$j]['name'] = $attachments[$j]->name;
                        $votes[$j]['total'] = 0;
                        $votes[$j]['accept'] = 0;
                        $votes[$j]['reject'] = 0;
                        $votes[$j]['save'] = 0;
                    }
                    $votes[$j]['total']++;
                    if ($attachments[$j]->votes[$i]->vote == 1) {
                        $votes[$j]['save']++;
                    } elseif ($attachments[$j]->votes[$i]->vote == 2) {
                        $votes[$j]['accept']++;
                    } else {
                        $votes[$j]['reject']++;
                    }
                }
            }
        }
        return View('dashboard.meetings.show', [
            'meeting' => $meeting, 'votes' => $votes
        ]);
    }

    public function edit(meeting $meeting)
    {
        return View('dashboard/meetings.edit', ['meeting' => $meeting]);
    }

    public function update(Request $request, meeting $meeting)
    {
        //update meeting
        $meeting->update([
            'name' => $request->name,
            'time' => $request->time,
            'date' => $request->date,
            'link' => $request->link,
        ]);
        //file companies store records
        if ($request->companies != null) {
            
            $meeting->companies()->detach();
            $this->store_excel_data($meeting, $request->companies);
            $stored_file  = $this->store_file($meeting->name . $meeting->id, $request->companies);
            $meeting->file =  $stored_file;
            $meeting->save();
        }
        return redirect()->route('meetings')->with(['success' => 'تم تعديل الاجتماع بنجاح']);
    }

    public function destroy(meeting $meeting)
    {
        if (auth()->user()->role == 'Super-Admin') {
            if ($meeting->delete()) {
                return redirect()->back()->with('success', 'تم حذف الاجتماع بنجاح ');
            } else {
                return redirect()->back()->withErrors('error', 'نأسف هناك خطا');
            }
        } else {
            return redirect()->back()->withErrors('error', 'ليس لديك هذه الصلاحيات');
        }
    }

    public function store_excel_data(meeting $meeting, $file)
    { 
        
        $csvData = file_get_contents($file);
        $rows = array_map("str_getcsv", explode("\n", $csvData));
        $header = array_shift($rows);
        $count = count($rows);
        for ($i = 0; $i < $count; $i++) {
            if (count($rows[$i]) == 4 && $rows[$i][2] != '') {
                $company = Company::where('commercial_number' , $rows[$i][2])->first();
                if($company== null){
                    $company = Company::create([
                    'name' => $rows[$i][0],
                    'phone' => $rows[$i][1],
                    'commercial_number' => $rows[$i][2],
                    'owner_name' => $rows[$i][3]
                ]);
                }
                
                $meeting->companies()->attach($company->id);
            }
        }
        return true;
    }
    public function store_file($file_name,  $file)
    {
        $new_file = $file_name . $file->getClientOriginalName();
        $file->move('files/', $new_file);
        return $new_file;
    }
    
    public function get_votes(meeting $meeting){
         $votes = meeting_company::whereIn('attendance', ['حاضر', 'معتزر'])->where('meeting_id' , $meeting->id)->paginate(100);
        return view('dashboard.index',compact('votes' , 'meeting'));
    }
}
