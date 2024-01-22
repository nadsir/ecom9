<?php

namespace App\Exports;

use App\Models\NewsletterSubscriber;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class subscribersExport implements WithHeadings,FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //for exporting subscribers email
        //return NewsletterSubscriber::all();
        //For exporting selected columns
        $subscribersData=NewsletterSubscriber::select('id','email','created_at')->where('status',1)->orderBy('id','Desc')->get();
        return $subscribersData;

    }
    public function headings(): array
    {
        // TODO: Implement headings() method.
        return ['Id','Email','Subscribed on'];
    }
}
