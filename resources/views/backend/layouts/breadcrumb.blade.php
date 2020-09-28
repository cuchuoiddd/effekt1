{{--<div class="content-header row">--}}
{{--<div class="content-header-left col-md-6 col-12 mb-2">--}}
{{--<h3 class="content-header-title mb-0">Card Actions</h3>--}}
{{--<div class="row breadcrumbs-top">--}}
{{--<div class="breadcrumb-wrapper col-12">--}}
{{--<ol class="breadcrumb">--}}
{{--<li class="breadcrumb-item"><a href="index.html">Home</a>--}}
{{--</li>--}}
{{--<li class="breadcrumb-item"><a href="#">Components</a>--}}
{{--</li>--}}
{{--<li class="breadcrumb-item active">Card Actions--}}
{{--</li>--}}
{{--</ol>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

@if(\Session::has('success'))
    <div class="alert alert-icon-left alert-success alert-dismissible mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong>{{ \Session::get('success') }}</strong>
        @php
            \Session::forget('success');
        @endphp
    </div>
@elseif(\Session::has('error'))
    <div class="alert alert-icon-left alert-danger alert-dismissible mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong>{{ \Session::get('error') }} eqweqwe</strong>
        @php
            \Session::forget('error');
        @endphp
    </div>
@elseif(\Session::has('status'))
    <div class="alert alert-icon-left alert-warning alert-dismissible mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong>{{ \Session::get('status') }}</strong>
        @php
            \Session::forget('status');
        @endphp
    </div>
@endif
