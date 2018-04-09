<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use App\Payroll;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Report;
use Exception;

/**
 * This controller
 *
 * @author Vinoth
 *        
 */
class PayrollController extends Controller
{

    /**
     * Payroll creation logic
     * @param Request $request
     *            
     */
    public function store(Request $request)
    {
        $file = $request->file('file-upload');
        $this->validatePayrollForm($request, $file);
        DB::beginTransaction();
        try{
            $reportId = $this->processForm($file);
        } catch(Exception $e){
            DB::rollBack();
            return view("index")->with('message', $e->getMessage())
            ->with('reports', Report::getReports())->with('all_reports', true);
        }
        DB::commit();
        return redirect("/report/" );
    }

    /**
     */
    private function validatePayrollForm(Request $request, $file)
    {
        if (! $request->hasFile('file-upload') && $file->getClientOriginalExtension() != 'csv') {
            throw new BadRequestHttpException("Please upload a valid csv file");
        }
    }

    /**
     * 
     * @param Request $request
     */
    private function processForm($file)
    {
        $payrollArray = array_map('str_getcsv', file($file));
        $reportId = array_pop($payrollArray)[1];
            
        // Converting the data into an array of associated arrays so that it is easier to process.
        array_walk($payrollArray, function (&$a) use ($payrollArray) {
            $a = array_combine($payrollArray[0], $a);
        });
        // Remove row 1 which is the column header, since the arary has been converted into an associative array.
        array_shift($payrollArray);
        $isProcessed = Payroll::where('report_id', $reportId)->count() > 0;
        
        if ($isProcessed) {
            throw new BadRequestHttpException("This sheet has already been processed.");
        }
        
        // Updating the database
        foreach ($payrollArray as $row) {
            Payroll::create([
                'report_id' => $reportId,
                'employee_id' => $row['employee id'],
                'job_group_id' => 1,
                'date' => Carbon::createFromFormat('d/m/Y', $row['date'])->toDateTimeString(),
                'hours' => $row['hours worked']
            ]);
        }
        return $reportId;
    }
}


