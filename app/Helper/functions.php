<?php

// site setting function checking
if(!function_exists('site')){
    function site(){
        return \App\Models\SiteSetting::first();
    }
}


// get issue path
if(!function_exists('issue_path')){
    function issue_path($issue){
        $ex = explode('/',$issue);
        return end($ex) ?? null;
    }
}
