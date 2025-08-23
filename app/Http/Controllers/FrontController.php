<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServerConfig;
use App\Models\Syllabus;
use App\Models\SemisterPlan;
use App\Models\StudentManagement;
use App\Models\StaffManagement;
use App\Models\TeacherManagement;
use App\Models\CultivationAdmin;
use App\Models\HomeInfo;
use App\Models\HomeSlider;
use App\Models\PhotoGallery;
use App\Models\ExamRoutine;
use App\Models\ClassRoutine;
use App\Models\VideoGallery;
use App\Models\InstituteDetails;
use App\Models\PrincipalSpeech;
use App\Models\ExPrincipal;
use App\Models\ManagingComittee;
use App\Models\newAdmission;
use App\Models\Marksheet;
use App\Models\GradeList;
use App\Models\Notice;
use App\Models\PlacementCell;
use App\Models\NeedyStudent;
use App\Models\needyStudentPanel;
use File;
use Hash;
use sessionData;
use Session;

class FrontController extends Controller
{
    
    
    public function adminLogin(){
        $cultivation = CultivationAdmin::orderBy('id','DESC')->limit(1);
        return view('cultivation.login',['cultivation'=>$cultivation]);
    }
    
    public function cultivationLogin(Request $requ){
        $cultivation = CultivationAdmin::where(['adminUser'=>$requ->cultivationUser])->first();
        if($cultivation):
            if(!Hash::check($requ->cultivationPass,$cultivation->loginPassword)):
                return back()->with('error','Sorry! Wrong password provided');
            else:
                session(['cultivationAdmin' => $cultivation->id]);
                $requ->session()->regenerate();
                $requ->session()->put('cultivationAdmin',$cultivation->id);
                return redirect(route('cultivationIndex'));
            endif;
        else:
            return back()->with('error','Sorry! User not exist');
        endif;
    }
    
    public function adminRegister(Request $requ){
        $cultivation = CultivationAdmin::where(['adminUser'=>$requ->cultivationUser])->first();
        if($cultivation):
            return back()->with('error','Sorry! User or email already exist');
        else:
            $authPass    = Hash::make($requ->cultivationPass);
            $cultivation = new CultivationAdmin();

            $cultivation->adminName     = $requ->adminName;
            $cultivation->adminMail     = $requ->adminEmail;
            $cultivation->adminMobile   = $requ->adminMobile;
            $cultivation->userType      = "Admin";
            $cultivation->adminUser     = $requ->cultivationUser;
            $cultivation->loginPassword = $authPass;
            
            if($cultivation->save()):
                return back()->with('success','Success! Admin profile created successfully');
            else:
                return back()->with('success','error! There was an error. Please try later');
            endif;
        endif;
    }
    
    public function adminLogout(){
        Session::flush();
        return redirect(route('adminLogin'))->with('success','Yes! Logout successfull');
    }


    public function homePage(){
         $photo  =   PhotoGallery::all();
         $server  =   ServerConfig::first();
         $home  =   HomeInfo::first();
         $slider = HomeSlider::orderBy('ID','DESC')->limit(5)->get();
        return view('frontend.index',['Datakey'=>$home,'sliderData'=>$slider,'gallery'=>$photo,'config'=>$server]);
    }

    public function visitor(Request $request) {
        $today = now()->toDateString();

        $todayVisitors = Visitor::where('visit_date', $today)->count();
        $totalVisitors = Visitor::count();
        $ip = $request->ip();

        return view('visitor', compact('todayVisitors', 'totalVisitors', 'ip'));
    }

    
    //web front controller str academic part
    public function newSyllabus()
    {
        $syllabus  =   Syllabus::all();
        return view('frontend.academic.syllabus',['Datakey'=>$syllabus]);
    }

    public function newClassSchedule()
    {   
        $result=ClassRoutine::get();
        return view('frontend.academic.classSchedule',['Datakey'=>$result]);
    }

    public function newExamSchedule()
    {
        $result=ExamRoutine::get();
        return view('frontend.academic.examSchedule',['Datakey'=>$result]);
    }

    public function newSemister()
    {
        $result = SemisterPlan::get();
        return view('frontend.academic.semister',['Datakey'=>$result]);
    }
     //web front controller end

     
    //fontend str gellary part
    public function videoPage(){
        
        $syllabus  =   VideoGallery::all();
        return view('frontend.gallery.video',['Datakey'=>$syllabus]);
    }

    public function imagePage(){
        
        $syllabus  =   PhotoGallery::all();
        return view('frontend.gallery.image',['Datakey'=>$syllabus]);
    }
    //fontend end

    

    //web support
    public function supportPage(){
        return view('frontend.support');
    }

    //institute info
    public function institutePage(){
        $syllabus  =   InstituteDetails::first();
        return view('frontend.institute.instituteInfo',['data'=>$syllabus]);
    }
    //principalSpeech
    public function principalSpeechPage(){
        $pSpeech  =   PrincipalSpeech::orderBy('id','DESC')->first();

        $principalData  = TeacherManagement::where(['designation'=>1])->orWhere(['designation'=>2])->first();
        $cultivation    = ServerConfig::orderBy('id','DESC')->first();
        // $cultivation->count();
        return view('frontend.institute.principalSpeech',['pSpeech'=>$pSpeech,'cultivation'=>$cultivation,'principal'=>$principalData]);
    }

    
    //X-principal
    public function student(){
        $syllabus  =   newAdmission::all();
        return view('frontend.institute.student',['Datakey'=>$syllabus]);
    }

    //X-principal
    public function exprincipalPage(){
        $syllabus  =   ExPrincipal::all();
        return view('frontend.institute.exprincipal',['Datakey'=>$syllabus]);
    }

    //teacher list page
    public function teacherPage(){
        $syllabus  =   TeacherManagement::all();
        return view('frontend.institute.teachers',['Datakey'=>$syllabus]);
    }

    //staff list page
    public function staffPage(){
        $syllabus  =   StaffManagement::all();
        return view('frontend.institute.staff',['Datakey'=>$syllabus]);
    }

    //comittee list page
    public function comitteePage(){
        $syllabus  =   ManagingComittee::all();
        return view('frontend.institute.comittee',['Datakey'=>$syllabus]);
    }

    //front web site str
    public function internalResult(){
        return view('frontend.result.internalResult');
    }


    public function individualResult(){
        return view('frontend.result.individualResult');
    }
    //front web site end

    

    //fontend str
    public function placementCellView(){
        $syllabus  =   PlacementCell::all();
        return view('frontend.job.placementCell',['Datakey'=>$syllabus]);
    }

    public function jobNeedyStudentView(){
        $syllabus  =   needyStudentPanel::all();
        return view('frontend.job.jobNeedyStudent',['Datakey'=>$syllabus]);
    }
     //fontend end

     

    public function savePlacementCell(Request $requ){
        if(empty($requ->itemId)):
            $item   = new PlacementCell();
        else:
            $item   = PlacementCell::find($requ->itemId);
        endif;

        $item->fullName            = $requ->fullName;
        $item->mobile              = $requ->mobile;
        $item->email               = $requ->email;
        $item->sessionYear         = $requ->sessionYear;
        $item->rollNumber          = $requ->rollNumber;
        $item->companyName         = $requ->companyName;
        $item->joinDate            = $requ->joinDate;
        $item->designation         = $requ->designation;
        $item->jobDetails          = $requ->jobDetails;
        if(!empty($requ->avatar)):
            $validated = $requ->validate([
                    'avatar' => 'required|mimes:pdf,jpeg,png,jpg,gif,webp,avif,|max:5120',
                     // max 5 MB
                ],[
                    'avatar.mimes'  => 'Allowed formats: PDF, JPEG, PNG, JPG, GIF, WEBP, AVIF.',
                    'avatar.max'    => 'Each file must be less than 5MB.'
                ]);
            $stdAvatar = $requ->file('avatar');
            $newAvatar = rand().date('Ymd').'.'.$stdAvatar->getClientOriginalExtension();
            $stdAvatar->move(public_path('upload/image/placementCell/'),$newAvatar);

            $item->avatar = $newAvatar;
        endif;
        // $item->status        = $requ->status;

        if($item->save()):
            return back()->with('success','Item successfully saved');
        else:
            return back()->with('error','Item failed to save');
        endif;
    }
    
    public function saveNeedyStdPanel(Request $requ){
        if(empty($requ->itemId)):
            $item   = new needyStudentPanel();
        else:
            $item   = needyStudentPanel::find($requ->itemId);
        endif;

        $item->fullName            = $requ->fullName;
        $item->mobile              = $requ->mobile;
        $item->email               = $requ->email;
        $item->sessionYear         = $requ->sessionYear;
        $item->rollNumber          = $requ->rollNumber;
        if(!empty($requ->avatar)):
            $validated = $requ->validate([
                    'avatar' => 'required|mimes:pdf,jpeg,png,jpg,gif,webp,avif,|max:5120',
                     // max 5 MB
                ],[
                    'avatar.mimes'  => 'Allowed formats: PDF, JPEG, PNG, JPG, GIF, WEBP, AVIF.',
                    'avatar.max'    => 'Each file must be less than 5MB.'
                ]);
            $stdAvatar = $requ->file('avatar');
            $newAvatar = rand().date('Ymd').'.'.$stdAvatar->getClientOriginalExtension();
            $stdAvatar->move(public_path('upload/image/neddyStudent/'),$newAvatar);

            $item->avatar = $newAvatar;
        endif;

        if(!empty($requ->attachment)):
            $validated = $requ->validate([
                    'attachment' => 'required|mimes:pdf,jpeg,png,jpg,gif,webp,avif,|max:5120',
                     // max 5 MB
                ],[
                    'attachment.mimes'  => 'Allowed formats: PDF, JPEG, PNG, JPG, GIF, WEBP, AVIF.',
                    'attachment.max'    => 'Each file must be less than 5MB.'
                ]);
            $stdAttachment = $requ->file('attachment');
            $newAttachment = rand().date('Ymd').'.'.$stdAttachment->getClientOriginalExtension();
            $stdAttachment->move(public_path('upload/image/neddyStudent/'),$newAttachment);

            $item->attachment = $newAttachment;
        endif;
        // $item->status        = $requ->status;

        if($item->save()):
            return back()->with('success','Item successfully saved');
        else:
            return back()->with('error','Item failed to save');
        endif;
    }
    
}
