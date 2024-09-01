<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Button;

trait DataTableConfigTrait
{
    protected function configureDataTable(Builder $builder, string $buttonText, string $route, bool $is_modal = false, bool $has_permission, string $can = null, $confirm = false, $confirmMsg = null, $customCondition = null): Builder
    {
        if ($is_modal) {
            $redirect = $route;
        } else {
            if ($confirm) {
                $redirect = "if (confirm('" . $confirmMsg . "')) { window.location.href = '" . $route . "'; } return false;";
            } else {
                $redirect = "window.location.href = '" . $route . "'; return false;";
            }
        }

        $buttons = [
            [
                'extend' => 'collection',
                'className' => 'btn btn-label-primary dropdown-toggle me-2',
                'text' => '<i class="ti ti-file-export me-sm-1"></i> <span class="d-none d-sm-inline-block">تصدير</span>',
                'buttons' => [
                    [
                        'extend' => 'print',
                        'text' => '<i class="ti ti-printer me-1" ></i>طباعة',
                        'className' => 'dropdown-item',
                        'customize' => 'function(win) {
                            // customize print view
                            $(win.document.body)
                                .css("color", config.colors.headingColor)
                                .css("border-color", config.colors.borderColor)
                                .css("background-color", config.colors.bodyBg);
                            $(win.document.body).find("table")
                                .addClass("compact")
                                .css("color", "inherit")
                                .css("border-color", "inherit")
                                .css("background-color", "inherit");
                        }'
                    ],
                    [
                        'extend' => 'csv',
                        'text' => '<i class="ti ti-file-text me-1" ></i>تصدير CSV',
                        'className' => 'dropdown-item',
                    ],
                    [
                        'extend' => 'excel',
                        'text' => '<i class="ti ti-file-spreadsheet me-1"></i>تصدير إكسل',
                        'className' => 'dropdown-item',
                    ],
                    [
                        'extend' => 'copy',
                        'text' => '<i class="ti ti-copy me-1" ></i>نسخ الجدول',
                        'className' => 'dropdown-item',
                    ],
                ],
            ],
        ];

        if ($has_permission) {
            if (auth()->user()->can($can)) {
                $buttons[] = [
                    'text' => "<span class=\"d-none d-sm-inline-block\"></span>$buttonText<i class=\"ti ti-plus ms-sm-1\"></i>",
                    'className' => 'create-new btn btn-primary',
                    'action' => "function(e, node, config) { $redirect }",
                ];
            }
        } else {

            if (!is_null($customCondition) && $customCondition) {
                $buttons[] = [
                    'text' => "<span class=\"d-none d-sm-inline-block\"></span>$buttonText<i class=\"ti ti-plus ms-sm-1\"></i>",
                    'className' => 'create-new btn btn-primary',
                    'action' => "function(e, node, config) { $redirect }",
                ];
            } else if (is_null($customCondition)) {

                $buttons[] = [
                    'text' => "<span class=\"d-none d-sm-inline-block\"></span>$buttonText<i class=\"ti ti-plus ms-sm-1\"></i>",
                    'className' => 'create-new btn btn-primary',
                    'action' => "function(e, node, config) { $redirect }",
                ];
            } else {

                $buttons[] = [
                    'text' => "<span class=\"d-none d-sm-inline-block\"></span>$buttonText<i class=\"ti ti-plus ms-sm-1\"></i>",
                    'className' => 'create-new btn btn-primary disabled',
                ];
            }
        }
        return $builder
            // ->minifiedAjax()
            ->dom('<"card-header flex-column flex-md-row"<"head-label text-center"><"dt-action-buttons text-end pt-3 pt-md-0"B>><"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>>t<"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>') // Set custom DOM layout
            ->orderBy(0)
            ->responsive()
            ->autoWidth(false)
            ->languageUrl(getDataTableTranslationLink())
            ->lengthMenu([[10, 25, 50, 100, -1], [10, 25, 50, 100, __('الكل')]])
            ->buttons($buttons)
            ->columnDefs([
                [
                    'className' => 'dt-right', // Apply the 'dt-right' class
                    'targets' => '_all' // To all columns
                ]
            ]);
    }
}
