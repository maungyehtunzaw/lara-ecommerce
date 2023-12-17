<?php

namespace App\DataTables\Admin;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $paymentStatus = ['1'=>'Paid','0'=>'Unpaid'];
        $paymentMethod = ['1'=>'Visa','2'=>'MobilePay','3'=>'Bank Transfer','4'=>'COD'];
        $deliveryStatus = ['1'=>'Pending','2'=>'Processing','3'=>'Delivered','4'=>'Cancelled'];
        return (new EloquentDataTable($query))
            ->addColumn('action', 'admin.order.action')
            ->editColumn('customer',function($query){
                return $query->customer->name;
            })
            ->editColumn('payment_status',function($query) use($paymentStatus){
                // if(in_array($query->payment_status,$paymentStatus)){
                //     return $paymentStatus[$query->payment_status];
                // }else{
                //     return 'Unpaid';
                // }
               return $query->payment_status == 1 ? '<span class="badge badge-success">Paid</span>' : '<span class="badge badge-danger">Unpaid</span>';            })
            ->editColumn('payment_method',function($query) use($paymentMethod){
                if(array_key_exists($query->payments_id,$paymentMethod)){
                    return $paymentMethod[$query->payments_id];
                }else{
                    return 'COD';
                }
            })
            ->editColumn('shipping_status',function($query) use($deliveryStatus){
                if(in_array($query->delivery_status,$deliveryStatus)){
                    return $deliveryStatus[$query->delivery_status];
                }else{
                    return 'Pending';
                }

            })
            ->editColumn('created_at',function($query){
                // return $query->created_at->format('d-m-Y H:i');
                return $query->created_at->diffForHumans();
            })
            ->rawColumns(['action','payment_status','shipping_status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Order $model): QueryBuilder
    {
        return $model->newQuery()->with('customer:id,first_name');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('order-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(120)
                  ->addClass('text-center align-middle'),
            Column::make('id'),
            Column::make('saleno'),
            Column::make('customer'),
            Column::make('total_qty'),
            Column::make('total_amount'),
            Column::make('shipping_status'),
            Column::make('payment_status'),
            Column::make('payment_method'),
            Column::make('created_at')->title('Created'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Order_' . date('YmdHis');
    }
}
