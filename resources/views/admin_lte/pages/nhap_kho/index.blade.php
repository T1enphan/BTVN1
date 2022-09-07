@extends('admin_lte.shares.master_lte')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Quản Lý Nhập Kho Sản Phẩm</h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Lựa chọn sản phẩm nhập kho
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input id="search" type="text" class="form-control" placeholder="Nhập vào tên sản phẩm">
                        </div>
                        <table class="table table-bordered" id="left_table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Tên Sản Phẩm</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="text-center align-middle">1</th>
                                    <td class="align-middle">Iphone 13 Promax</td>
                                    <td class="align-middle text-center">
                                        <button class="btn btn-primary">Thêm</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        Danh Sách Sản Phẩm Nhập Kho
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="right_table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Tên Sản Phẩm</th>
                                    <th class="text-center">Số Lượng</th>
                                    <th class="text-center">Đơn Giá</th>
                                    <th class="text-center">Thành Tiền</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" id="create">Nhập Kho</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    $(document).ready(function(){
        $("#create").click(function() {
            axios
                .get('/admin-lte/nhap-kho/create')
                .then((res) => {
                    if(res.data.status) {
                        toastr.success(res.data.mess);
                        getRight();
                    } else if(res.data.status == 0) {
                        toastr.error(res.data.mess);
                    } else if(res.data.status == 2) {
                        toastr.warning(res.data.mess);
                    }
                });
        });

        get();

        function get()
        {
            axios
                .get('/admin-lte/san-pham/data')
                .then((res) => {
                    var content = '';
                    $.each(res.data.listXXX, function(k, v) {
                        content += '<tr>';
                        content += '<th class="text-center align-middle">'+ (k + 1) +'</th>';
                        content += '<td class="align-middle">'+ v.ten_san_pham +'</td>';
                        content += '<td class="align-middle text-center">';
                        content += '<button class="add btn btn-primary" data-id="'+ v.id +'">Thêm</button>';
                        content += '</td>';
                        content += '</tr>';
                    });
                    $("#left_table tbody").html(content);
                });
        }

        $("#search").keyup(function() {
            var xxx = {
                'name'  : $(this).val(),
            };
            axios
                .post('/admin-lte/san-pham/find-name', xxx)
                .then((res) => {
                    var content = '';
                    $.each(res.data.danh_sach, function(k, v) {
                        content += '<tr>';
                        content += '<th class="text-center align-middle">'+ (k + 1) +'</th>';
                        content += '<td class="align-middle">'+ v.ten_san_pham +'</td>';
                        content += '<td class="align-middle text-center">';
                        content += '<button class="add btn btn-primary" data-id="'+ v.id +'">Thêm</button>';
                        content += '</td>';
                        content += '</tr>';
                    });
                    $("#left_table tbody").html(content);
                })
                .catch((res) => {
                    var listE = res.response.data.errors;
                    $.each(listE, function(k, v) {
                        toastr.error(v[0]);
                    });
                });

        });

        getRight();

        function getRight()
        {
            axios
                .get('/admin-lte/nhap-kho/data')
                .then((res) => {
                    var content = '';
                    $.each(res.data.list, function(k, v) {
                        content += '<tr>';
                        content += '<th class="text-center align-middle">'+ (k + 1) +'</th>';
                        content += '<td class="align-middle">'+ v.ten_san_pham +'</td>';
                        content += '<td class="align-middle">';
                        content += '<input type="number" data-id="'+ v.id +'" class="qty form-control" value="'+ v.so_luong_nhap +'">';
                        content += '</td>';
                        content += '<td class="align-middle">';
                        content += '<input type="number" data-id="'+ v.id +'" class="price form-control" value="'+ v.don_gia_nhap +'">';
                        content += '</td>';
                        content += '<td class="align-middle">'+ v.so_luong_nhap * v.don_gia_nhap +'</td>';
                        content += '<td class="align-middle text-center">';
                        content += '<button class="remove btn btn-danger" data-id="'+ v.id +'">Remove</button>';
                        content += '</td>';
                        content += '</tr>';
                    });
                    $("#right_table tbody").html(content);
            });
        }

        $("body").on('change', '.qty', function() {
            var xxx = {
                'so_luong_nhap'  : $(this).val(),
                'id'             : $(this).data('id'),
            };
            axios
                .post('/admin-lte/nhap-kho/update', xxx)
                .then((res) => {
                    if(res.data.status) {
                        toastr.success(res.data.mess);
                        getRight();
                    } else if(res.data.status == 0) {
                        toastr.error(res.data.mess);
                    } else if(res.data.status == 2) {
                        toastr.warning(res.data.mess);
                    }
                })
                .catch((res) => {
                    var listE = res.response.data.errors;
                    $.each(listE, function(k, v) {
                        toastr.error(v[0]);
                    });
                });

        });

        $("body").on('change', '.price', function() {
            var xxx = {
                'don_gia_nhap'  : $(this).val(),
                'id'             : $(this).data('id'),
            };
            axios
                .post('/admin-lte/nhap-kho/update', xxx)
                .then((res) => {
                    if(res.data.status) {
                        toastr.success(res.data.mess);
                        getRight();
                    } else if(res.data.status == 0) {
                        toastr.error(res.data.mess);
                    } else if(res.data.status == 2) {
                        toastr.warning(res.data.mess);
                    }
                })
                .catch((res) => {
                    var listE = res.response.data.errors;
                    $.each(listE, function(k, v) {
                        toastr.error(v[0]);
                    });
                });

        });

        $("body").on('click', '.add', function() {
            var xxx = {
                'id'    :   $(this).data('id'),
            };
            axios
                .post('/admin-lte/nhap-kho/create', xxx)
                .then((res) => {
                    if(res.data.status) {
                        toastr.success(res.data.mess);
                        getRight();
                    } else if(res.data.status == 0) {
                        toastr.error(res.data.mess);
                    } else if(res.data.status == 2) {
                        toastr.warning(res.data.mess);
                    }
                })
                .catch((res) => {
                    var listE = res.response.data.errors;
                    $.each(listE, function(k, v) {
                        toastr.error(v[0]);
                    });
                });
        });


        $("body").on('click', '.remove', function() {
            var xxx = {
                'id'    :   $(this).data('id')
            };
            axios
                .post('/admin-lte/nhap-kho/delete', xxx)
                .then((res) => {
                    if(res.data.status) {
                        toastr.success(res.data.mess);
                        getRight();
                    } else if(res.data.status == 0) {
                        toastr.error(res.data.mess);
                    } else if(res.data.status == 2) {
                        toastr.warning(res.data.mess);
                    }
                })
                .catch((res) => {
                    var listE = res.response.data.errors;
                    $.each(listE, function(k, v) {
                        toastr.error(v[0]);
                    });
                });

        });
    });
</script>
@endsection
