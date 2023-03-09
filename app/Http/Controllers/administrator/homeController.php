<?php

namespace App\Http\Controllers\administrator;

use App\Http\Controllers\Controller;
use App\Models\admin_profile;
use App\Models\adversting;
use App\Models\blogs;
use App\Models\category_blog;
use App\Models\category_const;
use App\Models\const_profile;
use App\Models\employer_profile;
use App\Models\events;
use App\Models\setting;
use App\Models\social_media;
use App\Models\user_profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function panel(){
        $empolyee = employer_profile::count();
        $users = user_profile::count();
        $manager = admin_profile::count();
        $adv = adversting::count();
        $blogs = blogs::count();
        $event = events::count();
        $const = const_profile::all();
        return view('admin.panel',compact('empolyee','event','const','blogs','users','manager','adv'));
    }
    public function setting_list(){
        if (Auth::user()->hasRole('manager')) {
            return view('admin.setting.setting_list');
        }else{
            return  view('errors.503');
        }
    }
    public function setting_edit($id){
        if (Auth::user()->hasRole('manager')) {
            $setting = setting::where('id',$id)->first();
            return view('admin.setting.setting_edit',compact('setting'));
        }else{
            return  view('errors.503');
        }
    }
    public function social_media_list(){
        if (Auth::user()->hasRole('manager')) {
            return view('admin.social.social_list');
        }else{
            return  view('errors.503');
        }
    }
    public function social_media_edit($id){
        if (Auth::user()->hasRole('manager')) {
            $social = social_media::where('id',$id)->first();
            return view('admin.social.social_edit',compact('social'));
        }else{
            return  view('errors.503');
        }
    }
    public function profile_admin(){
        if (Auth::user()->hasRole('manager')) {
            $profile = admin_profile::where('user_id',auth()->user()->id)->first();
            return view('admin.profile.admin_profile',compact('profile'));
        }else{
            return  view('errors.503');
        }
    }
    public function users_list(){
        if (Auth::user()->hasRole('manager')) {
            return view('admin.users.users_list');
        }else{
            return  view('errors.503');
        }
    }
    public function admin_list(){
        if (Auth::user()->hasRole('manager')) {
            return view('admin.users.admin_list');
        }else{
            return  view('errors.503');
        }
    }
    public function employer_list(){
        if (Auth::user()->hasRole('manager')) {
            return view('admin.users.employer_list');
        }else{
            return  view('errors.503');
        }
    }
    public function consts_list(){
        if (Auth::user()->hasRole('manager')) {
            return view('admin.users.consts_list');
        }else{
            return  view('errors.503');
        }
    }
    public function users_create(){
        if (Auth::user()->hasRole('manager')) {
            return view('admin.users.create_users');
        }else{
            return  view('errors.503');
        }
    }
    public function contactus(){
        if (Auth::user()->hasRole('manager')) {
            return view('admin.setting.contactus');
        }else{
            return  view('errors.503');
        }
    }
    public function faq_create(){
        if (Auth::user()->hasRole('manager')) {
            return view('admin.faq.faq_create');
        }else{
            return  view('errors.503');
        }
    }
    public function faq_list(){
        if (Auth::user()->hasRole('manager')) {
            return view('admin.faq.faq_list');
        }else{
            return  view('errors.503');
        }
    }
    public function adversting_create(){
        if (Auth::user()->hasRole('empolyer')) {
            $province = DB::table('provinces')->get();
            return view('admin.adversting.add_adv',compact('province'));
        }else{
            return  view('errors.503');
        }
    }
    public function adversting_list(){
        if (Auth::user()->hasRole('empolyer')) {
            return view('admin.adversting.list_adv');
        }else{
            return  view('errors.503');
        }
    }
    public function adversting_edit($id){
        if (Auth::user()->hasRole('empolyer')) {
            $adv = adversting::where('id',$id)->first();
            $province = DB::table('provinces')->get();
            $city = DB::table('cities')->where('id',$adv->city_id)->first();
            return view('admin.adversting.edit_adv',compact('adv','province','city'));
        }else{
            return  view('errors.503');
        }
    }
    public function adversting_admin_list(){
        if (Auth::user()->hasRole('manager')) {
            return view('admin.adversting.adv_list_admin');
        }else{
            return  view('errors.503');
        }
    }
    public function single_adversting_admin_list($id){
        if (Auth::user()->hasRole('manager')) {
            $adv = adversting::join('provinces','provinces.id','=','adverstings.province_id')
                ->join('cities','cities.id','=','adverstings.city_id')->where('adverstings.id',$id)->first();

            return view('admin.adversting.single_adv',compact('adv','id'));
        }else{
            return  view('errors.503');
        }
    }
    public function event_create(){
        if (Auth::user()->hasRole('manager')) {
            return view('admin.events.events_create');
        }else{
            return  view('errors.503');
        }
    }
    public function event_list(){
        if (Auth::user()->hasRole('manager')) {
            return view('admin.events.events_list');
        }else{
            return  view('errors.503');
        }
    }
    public function event_edit($id){
        if (Auth::user()->hasRole('manager')) {
            $events = events::where('id',$id)->first();

            return view('admin.events.events_edit',compact('events'));
        }else{
            return  view('errors.503');
        }
    }
    public function set_const_create(){
        if (Auth::user()->hasRole('consts')) {
            return view('admin.consts.set_date');
        }else{
            return  view('errors.503');
        }
    }
    public function set_const_list(){
        if (Auth::user()->hasRole('consts')) {
            return view('admin.consts.set_date_list');
        }else{
            return  view('errors.503');
        }
    }
    public function profile_const(){
        if (Auth::user()->hasRole('consts')) {
            $profile = const_profile::where('user_id',auth()->user()->id)->first();

            return view('admin.profile.consts_profile',compact('profile'));
        }else{
            return  view('errors.503');
        }
    }
    public function profile_empolyee(){
        if (Auth::user()->hasRole('empolyer')) {
            $profile = employer_profile::where('user_id',auth()->user()->id)->first();
            $province = DB::table('provinces')->get();
            $city = DB::table('cities')->where('id',$profile->city_id)->first();
            return view('admin.profile.empolyee_profile',compact('profile','province','city'));
        }else{
            return  view('errors.503');
        }
    }
    public function profile_user(){
        if (Auth::user()->hasRole('user')) {
            $profile = user_profile::where('user_id',auth()->user()->id)->first();
            $province = DB::table('provinces')->get();
            $city = DB::table('cities')->where('id',$profile->city_id)->first();
            $cites = DB::table('cities')->get();
            return view('admin.profile.user_profile',compact('profile','cites','province','city'));
        }else{
            return  view('errors.503');
        }
    }
    public function category_blog_create(){
        if (Auth::user()->hasRole('manager')) {
            return view('admin.blogs.create_category');
        }else{
            return  view('errors.503');
        }
    }
    public function category_blog_list(){
        if (Auth::user()->hasRole('manager')) {
            return view('admin.blogs.list_category');
        }else{
            return  view('errors.503');
        }
    }
    public function category_blog_edit($id){
        if (Auth::user()->hasRole('manager')) {
            $cateogry= category_blog::where('id',$id)->first();
            return view('admin.blogs.edit_category',compact('cateogry'));
        }else{
            return  view('errors.503');
        }
    }
    public function blogs_create(){
        if (Auth::user()->hasRole('manager')) {
            $category = category_blog::all();
            return  view('admin.blogs.blogs_create',compact('category'));
        }else{
            return  view('errors.503');
        }
    }
    public function blogs_list(){
        if (Auth::user()->hasRole('manager')) {
            return  view('admin.blogs.blogs_list');
        }else{
            return  view('errors.503');
        }
    }
    public function blogs_edit($id){
        if (Auth::user()->hasRole('manager')) {
            $blogs = blogs::where('id',$id)->first();
            $category = category_blog::all();
            return  view('admin.blogs.blogs_edit',compact('blogs','category'));
        }else{
            return  view('errors.503');
        }
    }
    public function category_const_create(){
        if (Auth::user()->hasRole('manager')) {
            return  view('admin.consts.category_create');
        }else{
            return  view('errors.503');
        }
    }
    public function category_const_list(){
        if (Auth::user()->hasRole('manager')) {
            return  view('admin.consts.category_list');
        }else{
            return  view('errors.503');
        }
    }
    public function subcategory_const_create(){
        if (Auth::user()->hasRole('manager')) {
            $category = category_const::all();
            return  view('admin.consts.subcategory_create',compact('category'));
        }else{
            return  view('errors.503');
        }
    }
    public function aubcategory_const_list($id){
        if (Auth::user()->hasRole('manager')) {
            return  view('admin.consts.subcategory_list',compact('id'));
        }else{
            return  view('errors.503');
        }
    }
    public function set_price_const(){
        if (Auth::user()->hasRole('consts')) {
            $category_const = category_const::all();
            return  view('admin.consts.set_price_const',compact('category_const'));
        }else{
            return  view('errors.503');
        }
    }

}
