<?php
namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PrescriptionHistoryExport implements FromView, ShouldAutoSize {
    
    use Exportable;
    
    protected $data;
    public function __construct( $data) {
        $this->data = $data;
        
    }
    public function view(): View {
        return view('reports.prescriptions.prescription_history_report',$this->data);
    }
    
}