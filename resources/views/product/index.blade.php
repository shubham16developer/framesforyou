@extends('layouts.master')

@section('content')



    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Products
                    </h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ url('home') }}" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Products</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                @if (Auth::user()->role == 'Admin')
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <!--begin::Primary button-->
                        <a href="{{ url('product/add') }}" class="btn btn-sm fw-bold btn-primary">Add Product</a>
                        <!--end::Primary button-->
                    </div>
                @endif
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">

                <div class="card">
                    <!--begin::Header-->
                    <div class="card-header card-header-stretch">
                        <!--begin::Title-->
                        <div class="card-title">
                            <h3 class="m-0 text-gray-800">Products</h3>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Tab Content-->
                    <div id="kt_referred_users_tab_content" class="tab-content" style="padding:15px;">
                        <div id="kt_referrals_1" class="card-body p-0 tab-pane fade show active" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9"
                                    id="myTable">
                                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                        <tr>
                                            <th class="min-w-120px ps-9">Id</th>
                                            <th class="min-w-120px ps-9">Category</th>
                                            <th class="min-w-120px ps-9">Color</th>
                                            <th class="min-w-175px ps-9">Product Name</th>
                                            <th class="min-w-175px ps-9">Product Image</th>
                                            <!-- <th class="min-w-175px ps-9">Group</th> -->
                                            <th class="min-w-125px text-center">Action</th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>


@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myTable').DataTable({
            "ajax": "{{ route('list_product') }}",
            "columns": [{
                    "data": "id",
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "data": "category_id",
                    render: function(data, type, row, meta) {
                        return row.product_category.cat_name;
                    }
                },
                {
                    "data": "color_id",
                    render: function(data, type, row, meta) {
                        return row.product_color.color_name;
                    }
                },
                {
                    "data": "product_name"
                },

                { 
                    "data": "image",
                    render:function(data,type,row,meta)
                    {
                        $image = (row.image);
                        //$html = '<audio controls> <source src="{{ url('upload/media') }}/'+$title+'"></audio>';
                        $html = '<img style="display: inline" src="{{ url('upload/product_images') }}/'+$image+'" alt="img" width="150" height="100">';
                        return $html;           
                    }        
                },
                
                {
                    "data": "id",
                    render: function(data, type, row, meta) 
                    {
                        $id = (row.id);
                        $html = '<a href="{{ url('product/edit') }}/' + btoa($id) +
                            '" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1"><span class="svg-icon svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path><path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="currentColor"></path></svg></span></a>   <button class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm btn_delete" data-id="' +
                            btoa($id) +
                            '"><span class="svg-icon svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path><path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path><path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path></svg></span></button>';


                        return $html;
                    }
                },
            ],
            "columnDefs": [{
                "className": "dt-center",
                "targets": "_all"
            }],
        });
        });

        $(document).on('click', '.btn_delete', function(event) {
            event.preventDefault();
            /* Act on the event */
            var id = $(this).attr('data-id');
            swal({
                    title: "Are you sure?",
                    text: "Are you sure you want to delete this Product?",
                    icon: "warning",
                    buttons: ["No", "Yes"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            type: "POST",
                            url: "{{ route('deleteproduct') }}",
                            data: {
                                "id": id,
                                "_token": "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                if (response.status == "success") {
                                    swal(response.message, {
                                        icon: 'success',
                                    }).then((result) => {
                                        location.reload(true);
                                    });
                                } else {
                                    swal("Error", "Something went wrong!", {
                                        icon: 'error'
                                    });
                                }
                            }
                        });
                    } else {
                        swal("Your Product is Safe!");
                    }
                });
        });
    </script>
@endpush
