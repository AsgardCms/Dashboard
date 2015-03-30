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
        <?php if (isset($widgets)): ?>
        <?php foreach($widgets as $widget): ?>
        <div class="{{ $widget['type'] }}">
            {!! $widget['html'] !!}
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="grid-stack grid-stack-6069 grid-stack-animate">
            <div class="grid-stack-item"
                 data-gs-x="0" data-gs-y="0"
                 data-gs-width="4" data-gs-height="10">
                <div class="grid-stack-item-content">
                    <div style="background: red">
                        asdasd
                    </div>
                </div>
            </div>
            <div class="grid-stack-item"
                 data-gs-x="4" data-gs-y="0"
                 data-gs-width="4" data-gs-height="4">
                <div class="grid-stack-item-content">
                    <div style="background: blue">
                        asdasd
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript">
        $(function () {
            var options = {
                cell_height: 80,
                vertical_margin: 10
            };
            $('.grid-stack').gridstack(options);
        });
    </script>
@stop
