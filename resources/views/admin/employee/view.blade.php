@extends('layouts.admin.app')
@section('content')
@php
   // dd($employee_item->edu)
@endphp
<div class="adminbody-content">
    <div class="adminbody-content-inner">
        <div class="full-section-row row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="section-heading">{{ $title }}</div>
                <div class="ad-padd-main light-box-shadow">
                    <div class="row row-view">
                        <div class="col-sm-12 col-md-2 col-lg-2">
                            <label>Name</label>
                        </div>
                        <div class="col-sm-12 col-md-10 col-lg-10">
                            {{ $employee_item->first_name }} {{$employee_item->last_name}}
                        </div>
                    </div>
                    <hr>
                    <div class="row row-view">
                        <div class="col-sm-12 col-md-2 col-lg-2">
                            <label>Email</label>
                        </div>
                        <div class="col-sm-12 col-md-10 col-lg-10">
                            {{ $employee_item->email }}
                        </div>
                    </div>
                    <hr>
                    <div class="row row-view">
                        <div class="col-sm-12 col-md-2 col-lg-2">
                            <label>Designation</label>
                        </div>
                        <div class="col-sm-12 col-md-10 col-lg-10">
                            {{ $employee_item->designation }}
                        </div>
                    </div>
                    <hr>
                    <div class="row row-view">
                        <div class="col-sm-12 col-md-2 col-lg-2">
                            <label>Course</label>
                        </div>
                        <div class="col-sm-12 col-md-10 col-lg-10">
                            @foreach ($employee_item->edu as $edu_name)
                                {{ $edu_name->course_name }}
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="row row-view">
                        <div class="col-sm-12 col-md-2 col-lg-2">
                            <label>Company Name</label>
                        </div>
                        <div class="col-sm-12 col-md-10 col-lg-10">
                            @foreach ($employee_item->exp as $exp_name)
                                {{ $exp_name->company_address }}
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="row row-view">
                        <div class="col-sm-12 col-md-2 col-lg-2">
                            <label>Technology</label>
                        </div>
                        <div class="col-sm-12 col-md-10 col-lg-10">
                            @foreach ($employee_item->exp as $exp_name)
                                     {{ $exp_name->technology }}
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="row row-view">
                        <div class="col-sm-12 col-md-2 col-lg-2">
                            <label>Referance Name</label>
                        </div>
                        <div class="col-sm-12 col-md-10 col-lg-10">
                            @foreach ($employee_item->ref as $ref_item)
                                    {{ $ref_item->ref_name }}
                            @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="row row-view">
                        <div class="col-sm-12 col-md-2 col-lg-2">
                            <label>Current CTC</label>
                        </div>
                        <div class="col-sm-12 col-md-10 col-lg-10">
                            @foreach ($employee_item->exp as $exp_name)
                                {{ $exp_name->current_ctc }}
                            @endforeach

                        </div>
                    </div>
                    <hr>
                    <div class="row row-view">
                        <div class="col-sm-12 col-md-2 col-lg-2">
                            <label>Expect CTC</label>
                        </div>
                        <div class="col-sm-12 col-md-10 col-lg-10">
                            @foreach ($employee_item->exp as $exp_name)
                                {{ $exp_name->exp_ctc }}
                             @endforeach
                        </div>
                    </div>
                    <hr>
                    <div class="full-section-row row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="full-section-center-btn">
                                <a href="{{ route('employee.index') }}" class="btn btn-primary pull-right">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
