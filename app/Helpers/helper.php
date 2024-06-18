<?php
function getSource($sourceList,$item){
    $soreceItem='';
    foreach ($sourceList as $key => $sItem) {
        if($key == $item){
            $soreceItem = $sItem;
            break;
        }
    }
    return $soreceItem;
}

function getServiceName($serviceIds){

    $services = \App\Models\admin\Service::whereIn('id',$serviceIds)->get();
    $html='';
    if ($services){
        $html .=`<ul>`;
        foreach ($services as $service) {
            $html .= '<li>' . $service->name . ' - Price: ' . $service->price . '</li>';
        }
        $html .=`</ul>`;
    }

    return $html;
}

function getTotalSales(){
    return \App\Models\admin\VisitorService::count();
}

function getTotalVisitor(){
    return \App\Models\admin\Visitor::count();

}

function getTotalLead(){

}

function getTotalEmployee(){
    return \App\Models\admin\User::where('role',EMPLOYEE_ROLE)->count();

}

function getTotalService(){
    return \App\Models\admin\Service::count();

}
