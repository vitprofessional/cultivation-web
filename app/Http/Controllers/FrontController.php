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
         $photo  =  PhotoGallery::all();
         $insData  =   InstituteDetails::first();
         $notice  =   Notice::orderBy('id','desc')->limit(5)->get();
         $slider = HomeSlider::orderBy('ID','DESC')->limit(5)->get();
        return view('frontend.index',[
            'insData'=>$insData,
            'noticeBoard'=>$notice,
            'sliderData'=>$slider,
            'gallery'=>$photo,
        ]);
    }

    public function visitor(Request $request) {
        $today = now()->toDateString();

        $todayVisitors = Visitor::where('visit_date', $today)->count();
        $totalVisitors = Visitor::count();
        $ip = $request->ip();

        return view('visitor', compact('todayVisitors', 'totalVisitors', 'ip'));
    }

    // All notices listing page
    public function allNotices(){
        // Paginate for performance if large dataset
        $notices = Notice::orderBy('id','desc')->paginate(15);
        return view('frontend.notice.all',[ 'notices' => $notices ]);
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
        
        $video  =   VideoGallery::all();
        return view('frontend.gallery.video',['Datakey'=>$video]);
    }

    public function imagePage(){
        
        $gallery  =   PhotoGallery::all();
        return view('frontend.gallery.image',['Datakey'=>$gallery]);
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
        // Order students by class for display; eager load only needed columns
        $students = newAdmission::orderBy('className','asc')->get();
        return view('frontend.institute.student',[
            'Datakey' => $students,
        ]);
    }

    // single student profile view
    public function studentShow($id){
        $student = newAdmission::findOrFail($id);
        // related lookups
        $session = \App\Models\sessionManage::find($student->sessName);
        $class   = \App\Models\classManage::find($student->className);
        $section = \App\Models\sectionManage::find($student->sectionName);
        $dept    = \App\Models\Department::find($student->departmentName);
        return view('frontend.institute.student-show',[
            'student'=>$student,
            'session'=>$session,
            'class'=>$class,
            'section'=>$section,
            'dept'=>$dept,
        ]);
    }

    //X-principal
    public function exprincipalPage(){
        $syllabus  =   ExPrincipal::all();
        return view('frontend.institute.exprincipal',['Datakey'=>$syllabus]);
    }

    //teacher list page
    public function teacherPage(){
        $syllabus  =   TeacherManagement::orderBy('rank','asc')->get();
        return view('frontend.institute.teachers',['Datakey'=>$syllabus]);
    }

    // teacher detail page
    public function teacherShow($id){
        $teacher = TeacherManagement::findOrFail($id);
        return view('frontend.institute.teacher-show', [
            'teacher' => $teacher,
        ]);
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
    public function internalResult(Request $request){
        // Filters
        $classId   = $request->query('class');
        $sectionId = $request->query('section');
        $deptId    = $request->query('department');
        $sessId    = $request->query('session');

        $query = Marksheet::query();
        if(!empty($classId))   { $query->where('assignClass', $classId); }
        if(!empty($sectionId)) { $query->where('assignSection', $sectionId); }
        if(!empty($deptId))    { $query->where('assignDepartment', $deptId); }
        if(!empty($sessId))    { $query->where('assignSession', $sessId); }

        $result = $query->orderBy('id','desc')->get();

        // Option lists
        $classes   = \App\Models\classManage::orderBy('className','asc')->get();
        $sections  = \App\Models\sectionManage::orderBy('section','asc')->get();
        $depts     = \App\Models\Department::orderBy('departmentName','asc')->get();
        $sessions  = \App\Models\sessionManage::orderBy('session','desc')->get();

        return view('frontend.result.internalResult',[
            'Datakey'  => $result,
            'classes'  => $classes,
            'sections' => $sections,
            'depts'    => $depts,
            'sessions' => $sessions,
            'filters'  => [
                'class'     => $classId,
                'section'   => $sectionId,
                'department'=> $deptId,
                'session'   => $sessId,
            ],
        ]);
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
        // Simple honeypot check
        if($requ->filled('website')){
            return back()->with('error','Invalid submission detected.');
        }

        // Time-based submission check (too fast is suspicious)
        $formTs = (int) $requ->input('form_ts', 0);
        if($formTs > 0 && (time() - $formTs) < 2){
            return back()->with('error','Please wait a moment before submitting.');
        }

        // Basic content check to avoid obvious spam/scam inputs
        foreach (['fullName','sessionYear'] as $field) {
            $val = (string) $requ->input($field, '');
            if (stripos($val, 'http://') !== false || stripos($val, 'https://') !== false) {
                return back()->with('error','Links are not allowed in this form.');
            }
        }

        // Validate inputs strictly
        $validated = $requ->validate([
            'fullName'     => ['required','string','min:2','max:100'],
            'email'        => ['required','email:rfc,dns','max:150'],
            'mobile'       => ['required','regex:/^\+?[0-9]{10,15}$/'],
            'sessionYear'  => ['required','string','min:4','max:20'],
            'rollNumber'   => ['required','digits:6'],
            'avatar'       => ['required','image','mimes:jpeg,png,jpg,gif,webp,avif','max:5120'],
            'attachment'   => ['required','mimes:pdf','max:5120'],
        ],[
            'mobile.regex'      => 'Mobile must be 10-15 digits, optionally starting with +',
            'rollNumber.digits' => 'Roll number must be exactly 6 digits',
            'avatar.image'      => 'Photo must be an image file',
            'attachment.mimes'  => 'CV must be a PDF file',
        ]);

        // Prepare model
        if(empty($requ->itemId)){
            $item   = new needyStudentPanel();
        } else {
            $item   = needyStudentPanel::find($requ->itemId);
            if(!$item){
                return back()->with('error','Record not found.');
            }
        }

        // Assign sanitized values
        $item->fullName    = trim(strip_tags($requ->fullName));
        $item->mobile      = trim($requ->mobile);
        $item->email       = trim(strtolower($requ->email));
        $item->sessionYear = trim(strip_tags($requ->sessionYear));
        $item->rollNumber  = trim($requ->rollNumber);

        // Ensure upload directory exists
        $uploadDir = public_path('upload/image/neddyStudent/');
        if(!File::exists($uploadDir)){
            File::makeDirectory($uploadDir, 0755, true);
        }

        // Save avatar (photo)
        if($requ->hasFile('avatar')){
            $stdAvatar = $requ->file('avatar');
            $extA = strtolower($stdAvatar->getClientOriginalExtension());
            $newAvatar = (string) \Illuminate\Support\Str::uuid().'.'.$extA;
            $stdAvatar->move($uploadDir, $newAvatar);
            $item->avatar = $newAvatar;
        }

        // Save CV (PDF)
        if($requ->hasFile('attachment')){
            $stdAttachment = $requ->file('attachment');
            $extC = strtolower($stdAttachment->getClientOriginalExtension());
            $newAttachment = (string) \Illuminate\Support\Str::uuid().'.'.$extC;
            $stdAttachment->move($uploadDir, $newAttachment);
            $item->attachment = $newAttachment;
        }

        if($item->save()){
            return back()->with('success','Item successfully saved');
        } else {
            return back()->with('error','Item failed to save');
        }
    }
    
}
