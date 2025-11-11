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

// magazines
if(!function_exists('magazines')){
    function magazines(){
        return \App\Models\Magazine::latest()->get() ?? (object)[];
    }
}

// check active package
if (!function_exists('check_package')) {
    function check_package($issueId, $packageId) {
        $issue = \App\Models\Magazine::find($packageId);
        if (!$issue) {
            return false;
        }
        return $issue->issues()->where('id', $issueId)->exists();
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


// magazine option selection
if(!function_exists('selection')){
    function selection($key,$select){
        if($key == $select){
            return 'selected';
        }
        return '';
    }
}


/**
 * Get an model
 */
if (!function_exists('getModel')) {
    function getModel($model, $id)
    {
        $class = "\\App\\Models\\$model";
        return $class::find($id) ?: (object) [];
    }
}

/**
 * if magazine into the shopping cart
 */
if(!function_exists('isCart')){
    function isCart($package,$magazine){
        $session = request()->cookie('purchase_session');
        return \App\Models\ShoppingCart::where('session_id', $session)
            ->where('magazine_id', $magazine)
            ->where('package_id', $package)
            ->exists();
    }
}

/**
 * if magazine into the user magazine cart
 */
if(!function_exists('purchasedMagazine')){
    function purchasedMagazine($magazine,$list){
        return $list->contains('magazine_id',$magazine);
    }
}

/**
 * Create unique id
 */
if(!function_exists('uniqueID')){
    function uniqueID($model, $column, $length = 16) {
        do {
            $id = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, $length);
        } while ($model::where($column, $id)->exists());
        return $id;
    }
}
