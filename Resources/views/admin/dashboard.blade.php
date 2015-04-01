@extends('layouts.master')

@section('content-header')
    <h1>
        Dashboard
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p>{{ trans('dashboard::dashboard.welcome-message') }}</p>
        </div>
    </div>
    <div class="row">
        <div class="grid-stack grid-stack-6069 grid-stack-animate">
            <?php if (isset($widgets)): ?>
            <?php foreach ($widgets as $widget): ?>
            <div class="grid-stack-item"
                 data-gs-no-resize="1"
                 data-gs-x="{{ isset($widget['options']['x']) ? $widget['options']['x'] : 2 }}"
                 data-gs-y="{{ isset($widget['options']['y']) ? $widget['options']['y'] : 0 }}"
                 data-gs-width="{{ isset($widget['options']['width']) ? $widget['options']['width'] : 2 }}"
                 data-gs-height="{{ isset($widget['options']['width']) ? $widget['options']['width'] : 1 }}">
                <div class="grid-stack-item-content">
                    {!! $widget['html'] !!}
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="clearfix"></div>
@stop

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            var options = {
                cell_height: 80,
                vertical_margin: 10
            };
            $('.grid-stack').gridstack(options);


            var serialize_widget_map = function (items) {
                console.log(items);
            };

            $('.grid-stack').on('change', function (e, items) {
                serialize_widget_map(items);
            });
        });
    </script>
@stop
