<?php

namespace App\Http\Controllers;

use App\Models\attachment;
use App\Models\Company;
use App\Models\meeting;
use App\Models\meeting_company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function getCompany(Request $request)
    {
        $flag = $request->validate([
            'commercial_number' => ['required', 'exists:App\Models\Company,commercial_number'],
            'meeting'=>['required', 'exists:App\Models\meeting,id']
        ],[
        'commercial_number.required' => 'السجل التجارى مطلوب',
        'commercial_number.exists' => 'السجل التجارى خطا',
        'meeting.required' => 'الاجتماع مطلوب',
        'meeting.exists' => 'خطا بالاجتماع المطلوب',
    ]);
        
        $meeting = meeting::where('id' , $request->meeting)->first();
        if ($flag) {
             $company = Company::where('commercial_number', $request->commercial_number)->first();
             $meetings = $company->meetings;
            for ($i=0; $i < count($meetings); $i++) {
                if($meeting->id == $meetings[$i]->id){
                    $rand_number = rand(1000, 9999);
                    $msg_id = $this->SendSms($company->phone , "رقم التاكيد  $rand_number");
                    $msg_status = $this->GetMessageStatus($msg_id);
                    $company->message = $rand_number;
                    $company->save();
                     if ($msg_status == 'sent') {
                         return view('user.auth.verifyMessage' , compact('company' , 'meeting'));
                     } else {
                        return redirect()->back()->with(['success', 'هناك خطا فى ارسال الرسائل']);
                     }
                }
            }
            return redirect()->back()->withErrors(['errors' => ' الاجتماع المختار خطا']);
        }
        else{
            return redirect()->back()->withErrors(['errors' => 'السجل التجارى خطا ']);
        }
    }
    public function verifyMsg(Request $request ,Company $company)
    {
        $request->validate([
            'number'=>'required',
            'meeting'=>['required' , 'exists:App\Models\meeting,id']
        ]);
        if($request->number == $company->message){
             return redirect()->route('votes' , ['company' => $company , 'meeting' => meeting::where('id' , $request->meeting)->first()]);
        }else {
            return redirect()->back()->withErrors(['error'=>"رمز التاكبد خطا"]);
        }
    }
    public function attendance(Request $request, Company $company)
    {
        $meeting_company = meeting_company::where('company_id', $company->id)->first();
        if( $meeting_company->attendance == 'لم تحدد'){
            if ($request->attendance == 'حاضر') {
               $meeting_company->attendance = 'حاضر';
            } elseif ($request->attendance == 'معتزر') {
                $meeting_company->attendance = 'معتزر';
            } else {
                 return redirect()->back()->with(['success' => ' خطا']);
            }
            $meeting_company->save();
             return redirect()->back()->with(['success' => " :تم حفظ حالة الحضور $request->attendance"]);
        }else {
          return redirect()->back()->withErrors(['error' => "لقد قمت بتحديد الحالة من قبل و هى : $meeting_company->attendance  " ]);
        }
        
    }

    function SendSms($number, $msg)
    {
        $url = "https://app.mobile.net.sa/api/v1/send/";
        $headers = array(
            "Accept: application/json",
            "Content-Type: application/json",
            "Authorization: Bearer lwwBvsSnQgJbuXKoEFCwIar62Rz5aaONWlf8JA6B"
        );

        $data = [
            "number" => "966".ltrim($number, '0'),
            "senderName" => "aljhaz",
            "sendAtOption" => "Now",
            "messageBody" => "$msg",
            "allow_duplicate" => true
        ];
        if (!$url || $url == "") {
            return "No URL";
        } else {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_VERBOSE, 0);
            $response = curl_exec($ch);
            if ($response === FALSE) {
                die(curl_error($ch));
            }
            // Decode the response
            $responseData = json_decode($response, TRUE);
            // Close the cURL handler
            curl_close($ch);
            // Print the date from the response
            $msg_id = $responseData['data']['message']['id'];
            return $msg_id;
        }
    }
    function GetMessageStatus($msg_id)
    {
        $url = "https://app.mobile.net.sa/api/v1/message-status/$msg_id";
        $headers = array(
            "Accept: application/json",
            "Content-Type: application/json",
            "Authorization: Bearer lwwBvsSnQgJbuXKoEFCwIar62Rz5aaONWlf8JA6B"
        );
        if (!$url || $url == "") {
            return "No URL";
        } else {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_VERBOSE, 0);
            $response = curl_exec($ch);
            if ($response === FALSE) {
                die(curl_error($ch));
            }
            // Decode the response
            $responseData = json_decode($response, TRUE);
            // Close the cURL handler
            curl_close($ch);
            // Print the date from the response
            $msg_status = $responseData['data']['status'];
            return $msg_status;
        }
    }
   public  function get(Company $company){
              $company = Company::where('commercial_number', $_GET['commercial_number'])->first();

       if($company == [] || $_GET['commercial_number'] == null){
           return redirect()->back()->withErrors(['error' , 'خطا بالسجل التجارى']) ;          
       }else{
        return view('dashboard.company' , compact('company'));
           
       }
       
    } 
    function show(Company $company){
        return view('dashboard.getCompany');
    }
}
