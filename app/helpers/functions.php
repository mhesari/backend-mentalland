<?php
function setting_copyright(){
    $setting = \App\Models\setting::first();

    return $setting->copyright_website;
}
function title_website(){
    $setting = \App\Models\setting::first();

    return $setting->title_website;
}
function logo_website(){
    $setting = \App\Models\setting::first();

    return "<img src='../../image/setting/logo/$setting->Logo_website' >";

}
function favicon_website(){
    $setting = \App\Models\setting::first();

    return "<img src='../../image/setting/favicon/$setting->Favicon_website' >";

}
function seo_website(){
    $setting = \App\Models\setting::first();

    return $setting->seo_website;

}
function keyword_website(){
    $setting = \App\Models\setting::first();

    return $setting->keyword_website;

}
