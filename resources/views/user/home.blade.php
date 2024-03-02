@extends('layouts.layout')
@section('content')
    <div class="col-md-3 col-sm-3"></div>
    <div class="col-md-6 col-sm-6">
        <div class="col-md-12 col-sm-12">
            <div id="content-area">
                <div class="box" style="">
                    <h2>User Panel</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <aside>
                <div class="sidebar">
                    <div class="box">
                        <div class="text-box" style="padding-left:0px !important;">
                            <h4 style="text-align:center;margin-top: 0px !important;padding-left:0px !important;"><a
                                    href="#">{{ auth()->user()->name_bn }}</a></h4>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection
