<?php

namespace App\Http\Controllers;

use App\Models\attachment;
use App\Models\meeting;
use App\Models\meeting_company;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function index(meeting $meeting)
    {
        $attachments = $meeting->attachments;
        return view('dashboard.attachments.index', compact('attachments','meeting'));
    }
    public function create(meeting $meeting){
        return view('dashboard.attachments.create', compact('meeting'));
    }
    public function edit(attachment $attachment){
        return view('dashboard.attachments.edit',compact('attachment'));
    }
    public function store(Request $request, meeting $meeting)
    {
        $request->validate([
            'file' => 'required',
            'name' => 'required'
        ]);

        $meetingController = new MeetingController();

        $saved_file = $meetingController->store_file($meeting->name . $request->name, $request->file);
        attachment::create([
            'name' => $request->name,
            'file' =>   $saved_file,
            'meeting_id'=>$meeting->id
        ]);
        return redirect()->back()->with(['success' => 'تم حفظ المرفق ']);
    }
    public function update(Request $request, attachment $attachment)
    {
        $meeting = $attachment->meeting;
        if ($request->file != null) {
            $meetingController = new MeetingController();
            $saved_file = $meetingController->store_file($meeting->name . $request->name, $request->file);
            $attachment->file = $saved_file;
            $attachment->save();
        }
        if ($request->has('name')) {
            $attachment->name = $request->name;
            $attachment->save();
        }
        return redirect()->route('attachments' , $attachment->meeting )->with(['success' => 'تم تعديل المرفق ']);
    }
    public function destroy(attachment $attachment)
    {
        if ($attachment->delete()) {
            return redirect()->back()->with(['success' => 'تم حذف هذا المرفق']);
        } else {
            return redirect()->back()->withErrors(['error' => 'خطا فى حذف المرفق']);
        }
    }

    public function download($file)
    {
        if (file_exists("files/$file")) {
            //Define header information
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header("Cache-Control: no-cache, must-revalidate");
            header("Expires: 0");
            header('Content-Disposition: attachment; filename="' . basename('files/' . $file) . '"');
            header('Content-Length: ' . filesize('files/' . $file));
            header('Pragma: public');
            //Clear system output buffer
            // flush();
            //Read the size of the file
            readfile('files/' . $file);
            //Terminate from the script
            die();
        } else {
            dd("File does not exist.");
        }
    }
}
