<?php

namespace App\Exports;

use App\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Session;

class CustomersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       
	    $customer = Customer::find(Session::get('customerId'));
	    $orders = $customer->orders;
	    return $orders;
        
    }
}
