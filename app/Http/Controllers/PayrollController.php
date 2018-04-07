<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

/**
 * This controller 
 * @author Vinoth
 *        
 */
class PayrollController extends Controller
{
    /**
     * @param  Request  $request
     * Payroll creation logic 
     */
    public function store(Request $request){
       $input = Input::all();
       
       // Validate
       
       // Extract data
    }
    
    /**
     * 
     * @param  Request  $request
     * @retun void
     */
    private function validateForm(Request $request){
        $request->all();
    }
    

    
}

