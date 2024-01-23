<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class ApiController extends Controller
{
    public function companyList()
    {
        $data           = [];        
        $companies      = Company::orderby('name', 'ASC')->get()->toArray();
        if(!empty($companies))
        {
            foreach($companies AS $company)
            { 
                //$comp_array['id']            = $company['id'];
                //$venue_array['image']   = $image_array;
               // $venue_array['tags']    = $arrTags;            
                $comp_array[]         = $company; 

            }
        }
        $data           = $comp_array;
        return json_encode(array("status"=>"SUCCESS","message" => "Data fetched successfully",
            "data"=>$data));
    }
}
