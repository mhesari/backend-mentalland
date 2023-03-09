<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\adminprofileRequest;
use App\Http\Requests\adverstingRequest;
use App\Http\Requests\blogRequest;
use App\Http\Requests\categoryBlogRequest;
use App\Http\Requests\CategoryConstReqest;
use App\Http\Requests\constprofileRequest;
use App\Http\Requests\contactusRequest;
use App\Http\Requests\educationalrecordRequest;
use App\Http\Requests\employerprofileRequest;
use App\Http\Requests\employerregisterRequest;
use App\Http\Requests\EventsRequest;
use App\Http\Requests\faqsRequest;
use App\Http\Requests\jobopperR;
use App\Http\Requests\loginRequest;
use App\Http\Requests\messagesRequest;
use App\Http\Requests\appointR;
use App\Http\Requests\newsletterR;
use App\Http\Requests\PriceConstReqest;
use App\Http\Requests\seminarR;
use App\Http\Requests\setDateRequest;
use App\Http\Requests\settingRequest;
use App\Http\Requests\SocialRequest;
use App\Http\Requests\subCategoryConstReqest;
use App\Http\Requests\thisjobR;
use App\Http\Requests\userprofileRequest;
use App\Http\Requests\userRequest;
use App\Http\Requests\usersregisterRequest;
use App\Http\Requests\workexperenceRequest;
use App\Models\admin_profile;
use App\Models\adversting;
use App\Models\applypsychM;
use App\Models\appointments;
use App\Models\blogs;
use App\Models\category_blog;
use App\Models\category_const;
use App\Models\coachAdultM;
use App\Models\coachChildM;
use App\Models\const_profile;
use App\Models\contact;
use App\Models\educational_records;
use App\Models\employer_profile;
use App\Models\events;
use App\Models\faqs;
use App\Models\joboppperM;
use App\Models\Messages;
use App\Models\music_adultM;
use App\Models\music_childrenM;
use App\Models\newsletterM;
use App\Models\price_const;
use App\Models\psychM;
use App\Models\seminars;
use App\Models\setDate_const;
use App\Models\setting;
use App\Models\social_media;
use App\Models\subcategory_const;
use App\Models\thisjobM;
use App\Models\User;
use App\Models\user_profile;
use App\Models\work_experience;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class homeController extends Controller
{
    public function login(loginRequest $request){
        $email = $request->input('email');

        if (!Auth::attempt($request->only(['email','password']))){
            return  Response::success("403","نام کاربری و رمزعبور با هم تطابق ندارد");
        }
        $user = User::where('email',$email)->first();
        $token = $user->createToken('API TOKEN')->plainTextToken;
        return Response::SetToken("با موفقیت وارد شدید",$token);

    }
    public function logout(){
        auth()->user()->tokens()->where('id', auth()->user()->currentAccessToken()->id)->delete();
        return Response::success(true,"با موفقیت خارج شدید");

    }
    public function admin_profile(adminprofileRequest $request){
        $fileCheck =  admin_profile::where('user_id',auth()->user()->id)->first();
        $Fname = $request->input('Fname');
        $Lname = $request->input('Lname');
        $avatar = $request->file('avatar');
        if (isset($avatar)){
            if (!empty($fileCheck->avatar)){
                unlink('image/users/admin/profile/'.$fileCheck->avatar);
            }
            $name = time().rand(1,100).'.'.$avatar->extension();
            $avatar->move('image/users/admin/profile', $name);
            $filePicture = $name;

        }
        admin_profile::where('user_id',auth()->user()->id)->update(['Fname'=>$Fname]);
        admin_profile::where('user_id',auth()->user()->id)->update(['Lname'=>$Lname]);
        if (isset($avatar)){
            admin_profile::where('user_id',auth()->user()->id)->update(['avatar'=>$filePicture]);
        }
        return Response::success(true,"با موفقیت بروزرسانی شد");

    }
    public function employer_profile(employerprofileRequest $request){
        $fileCheck =  employer_profile::where('user_id',auth()->user()->id)->first();
        $company_english = $request->input('company_english');
        $company_persian = $request->input('company_persian');
        $Fname_Lname_manager = $request->input('Fname_Lname_manager');
        $company_logo = $request->file('company_logo');
        if (isset($company_logo)){
            if (!empty($fileCheck->company_logo)){
                unlink('image/users/employer/profile/'.$fileCheck->company_logo);
            }
            $name = time().rand(1,100).'.'.$company_logo->extension();
            $company_logo->move('image/users/employer/profile', $name);
            $filePicture = $name;

        }
        $address_company = $request->input('address_company');
        $Activity_company = $request->input('Activity_company');
        $bio_company = $request->input('bio_company');
        $website_company = $request->input('website_company');
        $phone_number = $request->input('phone_number');
        $province_id = $request->input('province_id');
        $city_id = $request->input('city_id');

        employer_profile::where('user_id',auth()->user()->id)->update(['company_english'=>$company_english]);
        employer_profile::where('user_id',auth()->user()->id)->update(['company_persian'=>$company_persian]);
        if (isset($company_logo)){
            employer_profile::where('user_id',auth()->user()->id)->update(['company_logo'=>$filePicture]);
        }
        employer_profile::where('user_id',auth()->user()->id)->update(['province_id'=>$province_id]);
        employer_profile::where('user_id',auth()->user()->id)->update(['city_id'=>$city_id]);
        employer_profile::where('user_id',auth()->user()->id)->update(['address_company'=>$address_company]);
        employer_profile::where('user_id',auth()->user()->id)->update(['Activity_company'=>$Activity_company]);
        employer_profile::where('user_id',auth()->user()->id)->update(['bio_company'=>$bio_company]);
        employer_profile::where('user_id',auth()->user()->id)->update(['website_company'=>$website_company]);
        employer_profile::where('user_id',auth()->user()->id)->update(['phone_number'=>$phone_number]);
        employer_profile::where('user_id',auth()->user()->id)->update(['Fname_Lname_manager'=>$Fname_Lname_manager]);

        return Response::success(true,"با موفقیت بروزرسانی شد");

    }
    public function user_profile(userprofileRequest $request){
        $Fname = $request->input('Fname');
        $Lname = $request->input('Lname');
        $gender = $request->input('gender');
        $avatar = $request->file('avatar');
        if (isset($avatar)){
            if (!empty($fileCheck->avatar)){
                unlink('image/users/user/profile/'.$fileCheck->company_logo);
            }
            $name = time().rand(1,100).'.'.$avatar->extension();
            $avatar->move('image/users/user/profile', $name);
            $filePicture = $name;
        }
        $marital_status = $request->input('marital_status');
        $date_birthday = $request->input('date_birthday');
        $Expected_Salary = $request->input('Expected_Salary');
        $phone_number = $request->input('phone_number');
        $province_id  = $request->input('province_id');
        $city_id  = $request->input('city_id');

        user_profile::where('user_id',auth()->user()->id)->update(['Fname'=>$Fname]);
        user_profile::where('user_id',auth()->user()->id)->update(['Lname'=>$Lname]);
        user_profile::where('user_id',auth()->user()->id)->update(['gender'=>$gender]);
        if (isset($avatar)){
            user_profile::where('user_id',auth()->user()->id)->update(['avatar'=>$filePicture]);

        }
        user_profile::where('user_id',auth()->user()->id)->update(['marital_status'=>$marital_status]);
        user_profile::where('user_id',auth()->user()->id)->update(['date_birthday'=>$date_birthday]);
        user_profile::where('user_id',auth()->user()->id)->update(['Expected_Salary'=>$Expected_Salary]);
        user_profile::where('user_id',auth()->user()->id)->update(['phone_number'=>$phone_number]);
        user_profile::where('user_id',auth()->user()->id)->update(['province_id'=>$province_id]);
        user_profile::where('user_id',auth()->user()->id)->update(['city_id'=>$city_id]);

        return Response::success(true,"با موفقیت بروزرسانی شد");

    }
    public function work_experence_user_create(workexperenceRequest $request){
        $title_job = $request->input('title_job');
        $company_name = $request->input('company_name');
        $company_city = $request->input('company_city');
        $start_work = $request->input('start_work');
        $end_work = $request->input('end_work');
        work_experience::create([
            'title_job'=>$title_job,
            'company_name'=>$company_name,
            'company_city'=>$company_city,
            'start_work'=>$start_work,
            'end_work'=>$end_work,
            'user_id'=>auth()->user()->id,
        ]);

        return Response::success(true,"با موفقیت ثبت شد");

    }
    public function work_experence_user_list(){
        $user_id = auth()->user()->id;

        $work =  work_experience::where('user_id',$user_id)->get();

        return Response::Display($work);
    }
    public function work_experence_user_delete($id){
        work_experience::where('id',$id)->delete();

        return Response::success(true,"با موفقیت حذف شد");
    }
    public function educational_record_create(educationalrecordRequest $request){
        $degree_level = $request->input('degree_level');
        $major = $request->input('major');
        $university = $request->input('university');
        $start_date = $request->input('start_date');
        $start_end = $request->input('end_date');

        educational_records::create([
            'Degree_level'=>$degree_level,
            'Major'=>$major,
            'university'=>$university,
            'start_date'=>$start_date,
            'end_date'=>$start_end,
            'user_id'=>auth()->user()->id,
        ]);

        return Response::success(true,"با موفقیت ثبت شد");
    }
    public function educational_record_list(){
        $educaional = educational_records::where('user_id',auth()->user()->id)->get();

        return Response::Display($educaional);
    }
    public function educational_record_delete($id){
        educational_records::where('id',$id)->delete();

        return Response::success(true,"با موفقیت حذف شد");
    }
    public function setting_list(){
        $setting = setting::all();

        return Response::Display($setting);
    }
    public function setting_update(settingRequest $request,$id){
        $file = setting::where('id',$id)->first();

        $title_s = $request->input('title_s');
        $seo_s = $request->input('seo_s');
        $keyword_seo = $request->input('keyword_seo');
        $favicon_setting = $request->file('favicon_setting');
        $logo_setting = $request->file('logo_setting');
        $aboutUs_setting = $request->input('aboutUs_setting');
        $copyright_website = $request->input('copyright_website');
        if (isset($favicon_setting)){
            if (!empty($file->Favicon_website)){
                unlink('image/setting/favicon/'.$file->Favicon_website);
            }
            $name = time().rand(1,100).'.'.$favicon_setting->extension();
            $favicon_setting->move('image/setting/favicon/', $name);
            $filefavicon = $name;
        }
        if (isset($logo_setting)){
            if (!empty($file->Logo_website)){
                unlink('image/setting/logo/'.$file->Logo_website);
            }
            $name = time().rand(1,100).'.'.$logo_setting->extension();
            $logo_setting->move('image/setting/logo/', $name);
            $filelogo = $name;
        }
        setting::where('id',$id)->update(['title_website'=>$title_s]);
        setting::where('id',$id)->update(['copyright_website'=>$copyright_website]);
        setting::where('id',$id)->update(['seo_website'=>$seo_s]);
        setting::where('id',$id)->update(['keyword_website'=>$keyword_seo]);
        setting::where('id',$id)->update(['aboutme'=>$aboutUs_setting]);
        if (isset($favicon_setting)) {
           setting::where('id', $id)->update(['Favicon_website' => $filefavicon]);
        }
        if (isset($logo_setting)) {
            setting::where('id', $id)->update(['Logo_website' => $filelogo]);
        }
        return Response::success(true,"با موفقیت بروزرسانی شد");

    }
    public function social_media_list(){
        $social = social_media::all();

        return Response::Display($social);
    }
    public function social_media_update(Request $request,$id){
        $instagram = $request->input('instagram');
        $whatsapp  = $request->input('whatsapp');
        $telegram = $request->input('telegram');
        $twitter = $request->input('twitter');
        $email = $request->input('email');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $lon = $request->input('lon');
        $lat = $request->input('lat');

        social_media::where('id',$id)->update(['instagram_id'=>$instagram]);
        social_media::where('id',$id)->update(['telegram_id'=>$telegram]);
        social_media::where('id',$id)->update(['twitter_id'=>$twitter]);
        social_media::where('id',$id)->update(['whatsapp_phone'=>$whatsapp]);
        social_media::where('id',$id)->update(['address'=>$address]);
        social_media::where('id',$id)->update(['phone_number'=>$phone]);
        social_media::where('id',$id)->update(['Longitude'=>$lon]);
        social_media::where('id',$id)->update(['latitude'=>$lat]);
        social_media::where('id',$id)->update(['email'=>$email]);

        return Response::success(true,"با موفقیت بروزرسانی شد");
    }
    public function const_profile(constprofileRequest $request){
        $Fname = $request->input('Fname');
        $Lname = $request->input('Lname');
        $codemeli = $request->input('codemeli');
        $phone_number = $request->input('phone_number');
        $university = $request->input('university');
        $avatar = $request->file('avatar');
        if (isset($avatar)){
            if (!empty($file->Logo_website)){
                unlink('image/users/cons/profile/'.$file->Logo_website);
            }
            $name = time().rand(1,100).'.'.$avatar->extension();
            $avatar->move('image/users/cons/degree/', $name);
            $filelogo = $name;
        }
        $degree_education = $request->file('degree_education');
        if (isset($degree_education)){
            if (!empty($file->Logo_website)){
                unlink('image/users/cons/profile/'.$file->Logo_website);
            }
            $name = time().rand(1,100).'.'.$degree_education->extension();
            $degree_education->move('image/users/cons/degree/', $name);
            $filedegree = $name;
        }

        const_profile::where('user_id',auth()->user()->id)->update(['Fname'=>$Fname]);
        const_profile::where('user_id',auth()->user()->id)->update(['Lname'=>$Lname]);
        const_profile::where('user_id',auth()->user()->id)->update(['national_code'=>$codemeli]);
        const_profile::where('user_id',auth()->user()->id)->update(['phone_number'=>$phone_number]);
        if (isset($avatar)){
            const_profile::where('user_id',auth()->user()->id)->update(['avatar'=>$filelogo]);

        }
        const_profile::where('user_id',auth()->user()->id)->update(['university'=>$university]);
        if (isset($degree_education)){
            const_profile::where('user_id',auth()->user()->id)->update(['degree_education'=>$filedegree]);
        }

        return Response::success(true,"با موفقیت بروزرسانی شد");

    }
    public function adversting_save(adverstingRequest $request){
        $ad_title = $request->input('ad_title');
        $ad_category = $request->input('ad_category');
        $province_id  = $request->input('province_id');
        $city_id  = $request->input('city_id');
        $Type_cooperation  = $request->input('Type_cooperation');
        $minimum_salary  = $request->input('minimum_salary');
        $ad_content  = $request->input('ad_content');
        $Relevant_work_experience  = $request->input('Relevant_work_experience');
        $date = verta();
        adversting::create([
            'ad_title'=>$ad_title,
            'ad_category'=>$ad_category,
            'province_id'=>$province_id,
            'city_id'=>$city_id,
            'Type_cooperation'=>$Type_cooperation,
            'minimum_salary'=>$minimum_salary,
            'ad_content'=>$ad_content,
            'date_register'=>$date->format('Y-m-d'),
            'Relevant_work_experience'=>$Relevant_work_experience,
            'user_id'=>auth()->user()->id,
        ]);
        return Response::success(true,"با موفقیت اگهی شما ثبت شد به محض تایید در سایت قرار میگیرد");

    }
    public function city($id){
        $city = DB::table('cities')->where('province_id',$id)->get();
        return Response::Display($city);

    }
    public function adversting_update(adverstingRequest $request,$id){
        $check =  adversting::where('id',$id)->first();
        if ($check->status == 0 xor $check->status == 2){
            $ad_title = $request->input('ad_title');
            $ad_category = $request->input('ad_category');
            $province_id  = $request->input('province_id');
            $city_id  = $request->input('city_id');
            $Type_cooperation  = $request->input('Type_cooperation');
            $minimum_salary  = $request->input('minimum_salary');
            $ad_content  = $request->input('ad_content');
            $Relevant_work_experience  = $request->input('Relevant_work_experience');
            if ($check->status == 2){
                adversting::where('id',$id)->update(['status'=>0]);

            }
            adversting::where('id',$id)->update(['ad_title'=>$ad_title]);
            adversting::where('id',$id)->update(['ad_category'=>$ad_category]);
            adversting::where('id',$id)->update(['province_id'=>$province_id]);
            adversting::where('id',$id)->update(['city_id'=>$city_id]);
            adversting::where('id',$id)->update(['Type_cooperation'=>$Type_cooperation]);
            adversting::where('id',$id)->update(['minimum_salary'=>$minimum_salary]);
            adversting::where('id',$id)->update(['ad_content'=>$ad_content]);
            adversting::where('id',$id)->update(['Relevant_work_experience'=>$Relevant_work_experience]);

            return Response::success(true,"با موفقیت اگهی شما بروزرسانی شد");
        }else{
            return Response::success(false,"متاسفم اگهی شما تایید شده است");

        }


    }
    public function adversting_list(){
        $user_id = auth()->user()->id;

        $adversting = adversting::where('user_id',$user_id)->get();

        return Response::Display($adversting);

    }
    public function adversting_close($id){

        adversting::where('id',$id)->update(['status_adv'=>1]);

        return Response::success(true,"با موفقیت اگهی شما بسته شد");

    }
    public function adversting_list_admin(){

        $adversting = adversting::join('employer_profiles','employer_profiles.user_id','=','adverstings.user_id')
            ->select('adverstings.*','employer_profiles.company_persian','employer_profiles.Fname_Lname_manager')
            ->get();

        return Response::Display($adversting);


    }
    public function adversting_check_admin(Request $request,$id){
        $message = $request->input('message');
        $state = $request->input('state');
        if ($state == 1){
            adversting::where('id',$id)->update(['status'=>$state]);
            adversting::where('id',$id)->update(['message'=>" "]);
        }else{
            adversting::where('id',$id)->update(['status'=>$state]);

            adversting::where('id',$id)->update(['message'=>$message]);
        }

        return Response::success(true,"با موفقیت اگهی تایید شد");

    }
    public function adversting_delete_admin($id){
        adversting::where('id',$id)->delete();

        return Response::success(true,"با موفقیت اگهی حذف شد");

    }
    public function set_date_time(setDateRequest $request){
        $date = $request->input('date');
        $time_start = $request->input('time_start');
        $time_end = $request->input('time_end');
        setDate_const::create([
            'set_date'=>$date,
            'set_start_time'=>$time_start,
            'set_end_time'=>$time_end,
            'user_id'=>auth()->user()->id,
        ]);

        return Response::success(true,"با موفقیت ثبت  شد");


    }
    public function set_date_time_list(){
        $setDate = setDate_const::where('user_id',auth()->user()->id)->get();

        return Response::Display($setDate);

    }
    public function set_date_time_delete($id){

        setDate_const::where('user_id',auth()->user()->id)->delete();
        return Response::success(true,"با موفقیت حذف  شد");

    }
    public function blogs_create(blogRequest $request){
        $thumbnail_blog = $request->file('thumbnail_blog');
        if (isset($thumbnail_blog)){
            $title_blog = $request->input('title_blog');
            $name = time().rand(1,100).'.'.$thumbnail_blog->extension();
            $thumbnail_blog->move('image/blog/', $name);
            $files = $name;
            $content_blog = $request->input('content_blog');
            $meta_description = $request->input('meta_description');
            $category_id = $request->input('category_id');
            $keyword_description = $request->input('keyword_description');
            $slug = $request->input('slug');
            $date = verta();
            blogs::create([
                'title_blog'=>$title_blog,
                'thumbnail_blog'=>$files,
                'content_blog'=>$content_blog,
                'category_id'=>$category_id,
                'meta_description'=>$meta_description,
                'keyword_description'=>$keyword_description,
                'date_register' => $date->format('d %B Y'),
                'day' => $date->formatWord('l'),
                'slug'=>$slug,
            ]);
            return Response::success(true,"با موفقیت ثبت  شد");
        }else{
            return Response::success(false,"لطفا تصویر را اپلود نمایید");

        }


    }
    public function blogs_update(blogRequest $request,$id){
        $fileCheck = blogs::where('id',$id)->first();
        $title_blog = $request->input('title_blog');
        $thumbnail_blog = $request->file('thumbnail_blog');
        $category_id = $request->input('category_id');

        if (isset($thumbnail_blog)){
            if (!empty($fileCheck->thumbnail_blog)){
                unlink('image/blog/'.$fileCheck->thumbnail_blog);
            }
            $name = time().rand(1,100).'.'.$thumbnail_blog->extension();
            $thumbnail_blog->move('image/blog/', $name);
            $files = $name;
        }

        $content_blog = $request->input('content_blog');
        $meta_description = $request->input('meta_description');
        $keyword_description = $request->input('keyword_description');
        $slug = $request->input('slug');

        blogs::where('id',$id)->update(['title_blog'=>$title_blog]);
        if (isset($thumbnail_blog)){
            blogs::where('id',$id)->update(['thumbnail_blog'=>$files]);
        }
        blogs::where('id',$id)->update(['content_blog'=>$content_blog]);
        blogs::where('id',$id)->update(['meta_description'=>$meta_description]);
        blogs::where('id',$id)->update(['keyword_description'=>$keyword_description]);
        blogs::where('id',$id)->update(['category_id'=>$category_id]);
        blogs::where('id',$id)->update(['slug'=>$slug]);

        return Response::success(true,"با موفقیت بروزرسانی  شد");

    }
    public function blogs_list(){
        $blogs = blogs::latest()->get();

        return Response::Display($blogs);

    }
    public function blogs_delete($id){
        $fileCheck = blogs::where('id',$id)->first();

        unlink('image/blog/'.$fileCheck->thumbnail_blog);

         blogs::where('id',$id)->delete();

        return Response::success(true,"با موفقیت حذف شد");


    }
    public function faqs_create(faqsRequest $request){
        $title_faqs = $request->input('title_faqs');
        $content_faqs = $request->input('content_faqs');
        $Priority_faqs = $request->input('Priority_faqs');

        faqs::create([
            'title_faqs'=>$title_faqs,
            'content_faqs'=>$content_faqs,
            'Priority_faqs'=>$Priority_faqs,
        ]);

        return Response::success(true,"با موفقیت ثبت شد");


    }
    public function faqs_list(){
        $faqs = faqs::latest()->get();

        return Response::Display($faqs);

    }
    public function faqs_delete($id){

        faqs::where('id',$id)->delete();

        return Response::success(true,"با موفقیت حذف شد");

    }
    public function contactus(contactusRequest $request){
        $Fname_Lname = $request->input('Fname_Lname');
        $phone_number = $request->input('phone_number');
        $subject = $request->input('subject');
        $description = $request->input('description');

        contact::create([
            'Fname_Lname'=>$Fname_Lname,
            'phone_number'=>$phone_number,
            'subject'=>$subject,
            'description'=>$description,
        ]);

        return Response::success(true,"با موفقیت ثبت شد");


    }
    public function contactus_list(){
        $contact = contact::latest()->get();

        return Response::Display($contact);

    }
    public function contactus_delete($id){
        $contact = contact::where('id',$id)->delete();

        return Response::success(true,"با موفقیت حذف شد");

    }
    public function events_create(EventsRequest $request){
        $title_event = $request->input('title_event');
        $thumbnail_events = $request->file('thumbnail_events');
        $name = time().rand(1,100).'.'.$thumbnail_events->extension();
        $thumbnail_events->move('image/events/', $name);
        $files = $name;

        $teacher_image_events = $request->file('teacher_image_events');
        $name = time().rand(1,100).'.'.$teacher_image_events->extension();
        $teacher_image_events->move('image/events/teacher/', $name);
        $filesTeacher = $name;

        $teacher_events = $request->input('teacher_events');
        $time_events = $request->input('time_events');
        $date_events = $request->input('date_events');
        $view_register = $request->input('view_register');
        $price_event = $request->input('price_event');
        $price_gift_events = $request->input('price_gift_events');
        $description_events = $request->input('description_events');

        events::create([
            'title_event'=>$title_event,
            'thumbnail_events'=>$files,
            'teacher_events'=>$teacher_events,
            'time_events'=>$time_events,
            'date_events'=>$date_events,
            'view_register'=>$view_register,
            'price_event'=>$price_event,
            'teacher_image_events'=>$filesTeacher,
            'price_gift_events'=>$price_gift_events,
            'description_events'=>$description_events,
            'user_id'=>auth()->user()->id,
        ]);

        return Response::success(true,"با موفقیت ثبت شد");

    }
    public function events_update(EventsRequest $request,$id){
        $fileCheck = events::where('id',$id)->first();

        $title_event = $request->input('title_event');

        $thumbnail_events = $request->file('thumbnail_events');
        if (isset($thumbnail_events)){
            if (!empty($fileCheck->thumbnail_events)){
                unlink('image/events/'.$fileCheck->thumbnail_events);
            }
            $name = time().rand(1,100).'.'.$thumbnail_events->extension();
            $thumbnail_events->move('image/events/', $name);
            $files = $name;
        }


        $teacher_image_events = $request->file('teacher_image_events');
        if (isset($teacher_image_events)){
            if (!empty($fileCheck->teacher_image_events))
            $name = time().rand(1,100).'.'.$teacher_image_events->extension();
            $teacher_image_events->move('image/events/teacher/', $name);
            $filesTeacher = $name;

        }


        $teacher_events = $request->input('teacher_events');
        $time_events = $request->input('time_events');
        $date_events = $request->input('date_events');
        $view_register = $request->input('view_register');
        $price_event = $request->input('price_event');
        $price_gift_events = $request->input('price_gift_events');
        $description_events = $request->input('description_events');

        events::where('id',$id)->update(['title_event'=>$title_event]);

        if (isset($thumbnail_events)){
            events::where('id',$id)->update(['thumbnail_events'=>$files]);

        }

        events::where('id',$id)->update(['teacher_events'=>$teacher_events]);
        events::where('id',$id)->update(['time_events'=>$time_events]);
        events::where('id',$id)->update(['date_events'=>$date_events]);
        events::where('id',$id)->update(['view_register'=>$view_register]);
        events::where('id',$id)->update(['price_event'=>$price_event]);

        if (isset($teacher_image_events)){
            events::where('id',$id)->update(['teacher_image_events'=>$filesTeacher]);

        }

        events::where('id',$id)->update(['price_gift_events'=>$price_gift_events]);
        events::where('id',$id)->update(['description_events'=>$description_events]);


        return Response::success(true,"با موفقیت ثبت شد");

    }
    public function events_list(){

        $events = events::where('user_id',auth()->user()->id)->get();

        return Response::Display($events);

    }
    public function events_delete($id){
        $fileCheck = events::where('id',$id)->first();

        unlink('image/events/'.$fileCheck->thumbnail_events);

        events::where('id',$id)->delete();

        return Response::success(true,"با موفقیت حذف شد");

    }
    public function employer_register(employerregisterRequest $request){
        $company_english = $request->input('company_english');
        $company_persian = $request->input('company_persian');
        $Fname_Lname_manager = $request->input('Fname_Lname_manager');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $password = $request->input('password');

        $users = User::create([
            'email'=>$email,
            'password'=>Hash::make($password),
            'role'=>"empolyee",
        ]);

        employer_profile::create([
           'Fname_Lname_manager'=>$Fname_Lname_manager,
           'company_english'=>$company_english,
           'company_persian'=>$company_persian,
           'phone_number'=>$phone,
           'user_id'=>$users->id,
        ]);

        return Response::success(true,"با موفقیت ثبت شد");


    }
    public function users_register(usersregisterRequest $request){
        $email = $request->input('email');
        $Fname = $request->input('Fname');
        $Lname = $request->input('Lname');
        $phone = $request->input('phone');
        $password = $request->input('password');

        $users = User::create([
            'name'=>$Fname.$Lname,
            'email'=>$email,
            'password'=>Hash::make($password),
        ]);

        user_profile::create([
            'Fname'=>$Fname,
            'Lname'=>$Lname,
            'phone_number'=>$phone,
            'user_id'=>$users->id
        ]);

        return Response::success(true,"با موفقیت ثبت شد");

    }
    public function users_admin_list(){
        $users = User::join('user_profiles','user_profiles.user_id','=','users.id')
            ->join('provinces','provinces.id','=','user_profiles.province_id')
            ->join('cities','cities.id','=','user_profiles.city_id')
            ->get();
        return Response::Display($users);

    }
    public function admin_list(){
        $users = User::join('admin_profiles','admin_profiles.user_id','=','users.id')
            ->get();
        return Response::Display($users);

    }
    public function employer_list(){
        $users = User::join('employer_profiles','employer_profiles.user_id','=','users.id')
            ->get();
        return Response::Display($users);

    }
    public function consts_list(){
        $users = User::join('const_profiles','const_profiles.user_id','=','users.id')
            ->get();
        return Response::Display($users);

    }
    public function users_delete($user_id){
        User::where('id',$user_id)->delete();

        return Response::success(true,"با موفقیت حذف شد");

    }
    public function users_save(userRequest $request){
        $Fname = $request->input('Fname');
        $Lname = $request->input('Lname');
        $email = $request->input('email');
        $role = $request->input('role');
        $users = User::create([
            'email'=>$email,
            'password'=>Hash::make('123456'),
            'role'=>$role,
        ]);
        if ($role == 'user'){
            user_profile::create([
                'Fname'=>$Fname,
                'Lname'=>$Lname,
                'user_id'=>$users->id,
            ]);
        }elseif ($role == 'admin'){
            admin_profile::create([
                'Fname'=>$Fname,
                'Lname'=>$Lname,
                'user_id'=>$users->id,
            ]);
        }else{
            const_profile::create([
                'Fname'=>$Fname,
                'Lname'=>$Lname,
                'user_id'=>$users->id,
            ]);
        }
        return Response::success(true,"با موفقیت ثبت شد");


    }
    public function category_blog_save(categoryBlogRequest $request){
        $title_category = $request->input('title_category');

        category_blog::create([
            'title_category'=>$title_category
        ]);

        return Response::success(true,"با موفقیت ثبت شد");

    }
    public function category_blog_update(categoryBlogRequest $request,$id){
        $title_category = $request->input('title_category');

        category_blog::where('id',$id)->update(['title_category'=>$title_category]);


        return Response::success(true,"با موفقیت بروزرسانی شد");

    }
    public function category_blog_list(){
        $category = category_blog::all();

        return Response::Display($category);

    }
    public function category_blog_delete($id){
        category_blog::where('id',$id)->delete();


        return Response::success(true,"با موفقیت بروزرسانی شد");

    }
    public function category_consts_create(CategoryConstReqest $request){
        $title_category = $request->input('title_category');

        category_const::create([
            'title_category'=>$title_category
        ]);
        return Response::success(true,"با موفقیت ثبت شد");


    }
    public function subcategory_consts_create(subCategoryConstReqest $request){
        $title_category = $request->input('title_category');
        $category_id = $request->input('category_id');

        subcategory_const::create([
            'subcategory_title'=>$title_category,
            'category_id'=>$category_id
        ]);
        return Response::success(true,"با موفقیت ثبت شد");


    }
    public function category_consts_list(){
        $category_const = category_const::all();
        return Response::Display($category_const);

    }
    public function subcategory_consts_list($id){
        $category_const = subcategory_const::where('id',$id)->get();
        return Response::Display($category_const);

    }
    public function category_consts_delete($id){
         category_const::where('id',$id)->delete();
        return Response::success(true,"با موفقیت حذف شد");

    }
    public function subcategory_consts_delete($id){
         category_const::where('id',$id)->delete();
        return Response::success(true,"با موفقیت حذف شد");

    }
    public function get_subcategory_value($id){
        $subcategory = subcategory_const::where('id',$id)->get();
        return Response::Display($subcategory);

    }
    public function save_price_const(PriceConstReqest $reqest){
        $category_id = $reqest->input('category_id');
        $subcategory = $reqest->input('subcategory');
        $price = $reqest->input('price');
        $priceCheck = price_const::where('category_id',$category_id)->where('subcategory_id',$subcategory)->where('user_id',auth()->user()->id)->count();
        if ($priceCheck == 0){
            price_const::create([
                'category_id'=>$category_id,
                'subcategory_id'=>$subcategory,
                'price'=>$price,
                'user_id'=>auth()->user()->id,
            ]);

            return Response::success(true,"با موفقیت ثبت شد");
        }else{
            return Response::success(false,"متاسفم شما یکبار ثبت کرده اید");

        }



    }
    public function list_price_const(){
        $user_id = auth()->user()->id;

        $priceConst = price_const::join('category_consts','category_consts.id','=','price_consts.category_id')
        ->join('subcategory_consts','subcategory_consts.id','=','price_consts.subcategory_id')
        ->select('price_consts.*','category_consts.title_category','subcategory_consts.subcategory_title')->
        where('user_id',$user_id)->get();

        return Response::Display($priceConst);

    }
    public function list_price_const_delete($id){
        price_const::where('id',$id)->delete();

        return Response::success(true,"با موفقیت ثبت شد");

    }


    //Teimory Codes

    public function postmessage(messagesRequest $request)
    {
        $messages = Messages::create($request->all());
        return response(['message' => 'پیام با موفقیت ارسال شد' , $messages ], 201);
    }

    public function postappoint(appointR $request)
    {
        $user_id = auth()->user()->id;
        $field = $request->input('field');
        $psychologist = $request->input('psychologist');


        appointments::create([
            'user_id'=>$user_id,
            'field'=>$field,
            'psychologist'=>$psychologist,
        ]);

        return Response::success(true,"با موفقیت ثبت شد");
    }
    public function getseminars()
    {
        $seminars = seminars::all();
        return Response::Display($seminars);
    }
    public function getjobs()
    {
        $jobs = joboppperM::all();
        return Response::Display($jobs);
    }
    public function getjobsby(jobopperR $request)
    {
        $title = $request->input('title');
        $category = $request->input('category');
        $jobtype = $request->input('jobtype');
        $education = $request->input('education');
        $exp = $request->input('exp');
        $facilities = $request->input('facilities');
        $company = $request->input('company');
        $city = $request->input('city');
        $remote = $request->input('remote');
        $intership = $request->input('intership');
        $salary = $request->input('salary');
        $jobs = joboppperM::where('title','LIKE', "%{$title}%")
            ->where('category', $category)
            ->where('jobtype', $jobtype)
            ->where('education', $education)
            ->where('exp', $exp)
            ->where('facilities', $facilities)
            ->where('company','LIKE', "%{$company}%")
            ->where('city', $city)
            ->where('remote', $remote)
            ->where('intership', $intership)
            ->where('salary', $salary)
            ->get();
        return Response::Display($jobs);
    }
    public function newsletter(newsletterR $request)
    {
        $messages = newsletterM::create($request->all());
        return response(['message' => 'پیام با موفقیت ارسال شد' , $messages ], 201);
    }

    public function getmusicAdults()
    {
        $music = music_adultM::all();
        return Response::Display($music);
    }
    public function getmusicChild()
    {
        $music = music_childrenM::all();
        return Response::Display($music);
    }
    public function getcoachAdults()
    {
        $coach = coachAdultM::all();
        return Response::Display($coach);
    }
    public function getcoachChild()
    {
        $coach = coachChildM::all();
        return Response::Display($coach);
    }
    public function getpsych()
    {
        $psychs = psychM::all();
        return Response::Display($psychs);
    }
    public function post_applied_psych(Request $request)
    {
        $name = $request->input('name');
        $number = $request->input('number');
        $age = $request->input('age');
        $sex = $request->input('sex');
        $const_type = $request->input('const_type');
        $time = $request->input('time');
        $applied = $request->input('applied');
        $psychologist_id = $request->input('psychologist_id');
    

        applypsychM::create([
            'name'=>$name,
            'number'=>$number,
            'age'=>$age,
            'sex'=>$sex,
            'const_type'=>$const_type,
            'time'=>$time,
            'applied'=>$applied,
            'psychologist_id'=>$psychologist_id,

        ]);

        return Response::success(true,"با موفقیت ثبت شد");
    }
    public function gethisjobs(Request $request)
    {
        $jobs = thisjobM::all();
        return Response::Display($jobs);
    }
}
