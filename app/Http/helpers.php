<?php


function modules() {
    return \App\Models\Module::getActiveModules();
}

function submenus() {
    return \App\Models\SubMenu::getActiveSubMenus();
}

function accesses($id) {
    return \App\Models\Access::getAccessFor($id);
}

function subaccesses($id) {
    return \App\Models\SubAccess::getSubAccessFor($id);
}

function roles() {
    return \App\Models\Role::getActiveRoles();
}

function siteIndex() {
    
}

function after_last($str, $inthat) {
    if (!is_bool(strrevpos($inthat, $str)))
        return substr($inthat, strrevpos($inthat, $str) + strlen($str));
}

function before_last($this, $inthat) {
    return substr($inthat, 0, strrevpos($inthat, $this));
}

function strrevpos($instr, $needle) {
    $rev_pos = strpos(strrev($instr), strrev($needle));
    if ($rev_pos === false)
        return false;
    else
        return strlen($instr) - $rev_pos - strlen($needle);
}


/*Get Bell Notification*/
function bellCounter() {
    return \App\Models\cms\User::bellCounter();
}

function children($id)
{
    return \App\Models\Editor::getChildFolder($id);
}
/*Get Bell Notification*/


// List of users that request for password reset
function notification_lists()
{
    return $users = \App\Models\cms\User::usersThatRequestForPasswordReset();
}
// List of users that request for password reset

/*Check if user can access the module*/
function checkAccess($module_id)
{
    //Get user role
    $role_id = \Auth()->user()->role_id;
    //Check if user has an access
    return \App\Models\Access::checkAccess($role_id, $module_id);   
}
/*Check if user can access the module*/

// Get News Summary output it on dashboard
function getNewsSummary()
{
    if (Schema::hasTable('content_news'))
    {
        $data['all_news']  = DB::table('content_news')->count();
        $data['published'] = DB::table('content_news')
                                 ->select(DB::raw('count(published) as published'))
                                 ->where('published', '=', 1)
                                 ->count();
        
        $data['featured']  = DB::table('content_news')
                        ->select(DB::raw('count(`featured`) as featured'))
                        ->where('featured', '=', 1)
                        ->count();
    }else{
        $data['all_news']  = 0;
        $data['published'] = 0;
        $data['featured']  = 0;
    }

    return $data;
}

// Get Page Summary output it on dashboard
function getPageSummary()
{
    if (Schema::hasTable('pages'))
    {
     $data['all_pages']  = DB::table('pages')->count();
     $data['published']  = DB::table('pages')
                       ->select(DB::raw('count(id) as published'))
                       ->where('status', '=', 1)
                       ->count();
    }else{
     $data['all_pages']  = 0;
     $data['published']  = 0;
    }

    return $data;
}

// Get Page Summary output it on dashboard
function getBannerSummary()
{
    if (Schema::hasTable('banners'))
    {
        $data['all_banners']  = DB::table('banners')->count();
        $data['advanced']     = DB::table('banners')
                       ->select(DB::raw('count(id) as advanced'))
                       ->where('type', '=', 'Advanced')
                       ->count();
    }else{
        $data['all_banners'] = 0;
        $data['advanced']    = 0;
    }

    return $data;
}