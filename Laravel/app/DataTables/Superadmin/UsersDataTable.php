<?php

namespace App\DataTables\Superadmin;

use App\DataTables\DataTableConfigTrait;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    use DataTableConfigTrait;

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->editColumn('roles', 'superadmin.users.datatable.roles')
            ->editColumn('action', 'superadmin.users.datatable.actions')
            ->rawColumns(['action', 'roles']);
    }

    public function query(User $model): QueryBuilder
    {
        return $model->with('roles')->newQuery();
    }

    public function html(): HtmlBuilder
    {
        $dataTableBuilder = $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns());

        $route = "$('#createModal').modal('show')";
        $buttonText = __('إضافة مستخدم جديد');
        $is_modal = true;
        $hasPermission = false;
        return $this->configureDataTable($dataTableBuilder, $buttonText, $route, $is_modal, $hasPermission, null);
    }

    public function getColumns(): array
    {
        return [
            Column::make('id')->title('#'),
            Column::make('name')->title(__('الاسم')),
            Column::make('email')->title(__('البريد الإلكتروني')),
            Column::make('phone_number')->title(__('رقم الجوال')),
            Column::make('username')->title(__('اسم المستخدم')),
            Column::computed('roles')->title(__('الصلاحيات')),
            Column::computed('action', __('الإجراء'))->exportable(false)->printable(false),
        ];
    }
}
