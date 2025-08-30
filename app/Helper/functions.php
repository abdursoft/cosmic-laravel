<?php

// site setting function checking
if(!function_exists('site')){
    function site(){
        return \App\Models\SiteSetting::first() ?? null;
    }
}

// subscription package
if(!function_exists('packages')){
    function packages(){
        return \App\Models\Package::latest()->get() ?? (object)[];
    }
}

// check active package
if (!function_exists('check_package')) {
    function check_package($issueId, $packageId) {
        $issue = \App\Models\Issue::find($issueId);
        if (!$issue) {
            return false;
        }
        return $issue->packages()->where('package_id', $packageId)->exists();
    }
}


// get issue path
if(!function_exists('issue_path')){
    function issue_path($issue){
        $ex = explode('/',$issue);
        return end($ex) ?? null;
    }
}


// get pages
if(!function_exists('pages')){
    function pages(){
        return \App\Models\Page::where('status','active')->get() ?? (object)[];
    }
}


// button title
if(!function_exists('cta_button')){
    function cta_button($index){
        if($index == '0'){
            return 'Claim the First Taste';
        }elseif($index == '1'){
            return "Expand My Domain";
        }else{
            return "Command Everything";
        }
    }
}
