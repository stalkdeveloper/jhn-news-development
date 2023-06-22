@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
<style>
    *{
        font-size:13px;
    }
</style>
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                News </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <div class="kt-subheader__breadcrumbs-link">
                   List of News..!! 
                </div>
            </div>
        </div>
        <?php $date = todayDataGet(); ?>
        <div class="kt-subheader__toolbar">
            <div class="kt-subheader__wrapper">
                <div class="btn kt-subheader__btn-daterange" id="">
                    <span class="kt-subheader__btn-daterange-title" id="">Today</span>&nbsp;
                    <span class="kt-subheader__btn-daterange-date" id="">{{$date}}</span>
                </div>
            </div>
        </div>
    </div>
    <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}" />
    <!-- end:: Subheader -->
    <!-- begin:: Content -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        News Category
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="la la-download"></i> Export
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__section kt-nav__section--first">
                                            <span class="kt-nav__section-text">Choose an option</span>
                                        </li>
                                        {{-- <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-print"></i>
                                                <span class="kt-nav__link-text">Print</span>
                                            </a>
                                        </li> --}}
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                                <span class="kt-nav__link-text">Excel</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                                <span class="kt-nav__link-text">PDF</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            &nbsp;
                            <a href="{{route('getAddNews')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                Add News
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Category Name</th>
                            <th>Type</th>
                            <th>News Title</th>
                            <th>User Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($getNews))
                            @if(is_array($getNews) || is_object($getNews))
                                @foreach($getNews as $count=>$news)
                                    <tr>
                                        <td>{{$count+1}}</td>
                                        <td>{{$news->title}}</td>
                                        <td>{{$news->description}}</td>
                                        <td>{{$news->user->name ?? 'N/A'}}</td>
                                        <td>
                                                @if($news->is_active == '1')
                                                    <a href="#" onclick="newsStatusUpdate('{{$news['id']}}', 0)" class="btn btn-sm btn-label-primary btn-bold">Active</a>
                                                @else
                                                    <a href="#" onclick="newsStatusUpdate('{{$news['id']}}', 1)" class="btn btn-sm btn-label-danger btn-bold">In Active</a>
                                                @endif
                                        </td>
                                        <td>
                                            {{-- <span class="dropdown">
                                                <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true"><i class="la la-ellipsis-h"></i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>
                                                    <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                                                    <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                                                </div>
                                            </span> --}}
                                            <a href="{{route('getViewCategory', $news['id'])}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View"><i class="flaticon-edit"></i></a>
                                            <a href="#" onclick="deleteCategoryData({{$news['id']}})" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="View"><i class="flaticon-delete"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endif
                    </tbody>
                </table>
                <!--end: Datatable -->
            </div>
        </div>
    </div>
    <!-- end:: Content -->
</div>
@endsection
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    // function categoryStatusUpdate(id, status){
    //     var token = $("#token").val();
    //     $.ajax({
    //             type: "POST",
    //             url: "{{route('getStatusCategory')}}",
    //             data: {
    //                 id: id,
    //                 status: status,
    //                 _token: token,
    //             },
    //             success: function(response) {
    //                 // console.log(response);
    //                 if(response.status = 'true'){
    //                 toastr.success(response.message);
    //                 setTimeout(function(){
    //                         window.location.replace("{{route('getAllCategory')}}");
    //                 }, 1000);
    //                 }else{

    //                 }

    //             },
    //     });
    // }

    // function deleteCategoryData(id){
    //     var token = $("#token").val();
    //     if (confirm("Are you sure.? \n Do you want to Delete Category.??")) {
    //         $.ajax({
    //             type: "POST",
    //             url:"{{route('getDeleteCategory')}}",
    //             data: {
    //                 id: id,
    //             _token: token,
    //             },
    //             success: function(response) {
    //                 if(response.status = 'true'){
    //                     toastr.success(response.message);
    //                     setTimeout(function(){
    //                         window.location.replace("{{route('getAllCategory')}}");
    //                     }, 1000);
    //                 }else {
    //                     toastr.error(response.error);
    //                 }
    //             },
    //         });
    //     }
    //     return false;
    // }
</script>

