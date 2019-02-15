@extends('layouts.sidebar')
@section('mainContent')

<div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-heading">
                        <div class="panel-tools">
                            <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                            <a class="closebox"><i class="fa fa-times"></i></a>
                        </div>
                        Column ordering
                    </div>
                    <div class="panel-body">
                        <p>Easily change the order of our built-in grid columns with
                            <code>.col-md-push-*</code> and
                            <code>.col-md-pull-*</code> modifier classes.</p>

                        <div class="row show-grid">
                            <div class="col-md-9 col-md-push-3">.col-md-9 .col-md-push-3</div>
                            <div class="col-md-3 col-md-pull-9">.col-md-3 .col-md-pull-9</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
   @endsection
