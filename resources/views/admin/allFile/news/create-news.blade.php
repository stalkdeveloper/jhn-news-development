@extends('layouts.admin')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-subheader__main">
        <h3 class="kt-subheader__title">
            News Bar </h3>
        <span class="kt-subheader__separator kt-hidden"></span>
        <div class="kt-subheader__breadcrumbs">
            <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
            <span class="kt-subheader__breadcrumbs-separator"></span>
            <a href="" class="kt-subheader__breadcrumbs-link"></a>
            <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
        </div>
    </div>
    <div class="kt-subheader__toolbar">
        <div class="kt-subheader__wrapper">
            <div class="btn kt-subheader__btn-daterange" id=""  data-placement="left">
                <span class="kt-subheader__btn-daterange-title" id="_title">Today</span>&nbsp;
                <span class="kt-subheader__btn-daterange-date" id="_date">{{-- {{$date}} --}}</span>
            </div>
        </div>
    </div>
</div>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
    <div class="row">
        <div class="col-lg-12">

            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">News Form <small>Make a news</small></h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="{{route('getAllNews')}}" class="btn btn-clean kt-margin-r-10">
                            <i class="la la-arrow-left"></i>
                            <span class="kt-hidden-mobile">Back</span>
                        </a>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <form class="" id="storeNewsData">
                        @csrf
                        <div class="row">
                            <div class="col-xl-2"></div>
                            <div class="col-xl-8">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <h3 class="kt-section__title kt-section__title-lg">News Info:</h3>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Category Name</label>
                                            <div class="col-9">
                                                <input class="form-control" name="category_name" type="text" value="" placeholder="Enter your description title" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">News Type</label>
                                            <div class="col-9">
                                                <input class="form-control" name="category_name" type="text" value="" placeholder="Enter your description title" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Title</label>
                                            <div class="col-9">
                                                <input class="form-control" name="news_name" type="text" value="" placeholder="Enter your description title" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Description</label>
                                            <div class="col-9">
                                                <textarea class="ckeditor form-control" name="description" required></textarea>
                                                <span class="form-text text-muted">Here, You can write description of your category detail.</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Image</label>
                                            <div class="col-9">
                                                <textarea class="ckeditor form-control" name="description" required></textarea>
                                                <span class="form-text text-muted">Here, You can write description of your category detail.</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3 col-form-label">Video</label>
                                            <div class="col-9">
                                                <textarea class="ckeditor form-control" name="description" required></textarea>
                                                <span class="form-text text-muted">Here, You can write description of your category detail.</span>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-brand float-right">
                                            <i class="la la-check"></i>Save
                                        </button>
                                        {{-- <div class="float-right">
                                            <i class="la la-check"></i><input type="submit" class="btn btn-brand float-right" value="Save">
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-xl-2"></div> --}}
                        </div>
                    </form>
                </div>
            </div>

            <!--end::Portlet-->
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>

<script>
    $(document).ready(function() {
        $('#storeCategoryData').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: "{{route('getStoreCategory')}}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.message) {
                        toastr.success(response.message);
                        window.location.replace("{{route('getAllCategory')}}");
                    } else {
                        toastr.error(response.error);
                    }
                },
                error: function(response) {
                toastr.error(response.error);
                }
            });
        });
    });
</script>
