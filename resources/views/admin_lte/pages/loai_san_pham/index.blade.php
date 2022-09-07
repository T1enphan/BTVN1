@extends('admin_lte.shares.master_lte')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quản Lý Loại Sản Phẩm</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <form id="form">
                    <div class="card">
                        <div class="card-header">
                            Thêm Mới Loại Sản Phẩm
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label>Tên Loại Sản Phẩm</label>
                                <input id="ten_loai_san_pham" type="text" class="form-control" placeholder="Nhập vào tên loại sản phẩm">
                            </div>
                            <div class="form-group">
                                <label>Slug Loại Sản Phẩm</label>
                                <input id="slug_loai_san_pham" type="text" class="form-control" placeholder="Nhập vào slug loại sản phẩm">
                            </div>
                            <div class="form-group">
                                <label>Tình Trạng</label>
                                <select id="is_open" class="form-control">
                                    <option value="1">Hiển Thị</option>
                                    <option value="0">Tạm Tắt</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Chọn Loại Sản Phẩm Cha</label>
                                <select id="id_loai_san_pham_cha" class="form-control">
                                    <option value="0">Root</option>
                                    @foreach ($danhMucCha as $key => $value)
                                    <option value="{{ $value->id }}">{{ $value->ten_loai_san_pham }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button id="add" type="button" class="btn btn-primary">Thêm Mới</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            Danh Sách Loại Sản Phẩm
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Tên Danh Mục</th>
                                    <th class="text-center" scope="col">Tình Trạng</th>
                                    <th class="text-center" scope="col">Danh Mục Cha</th>
                                    <th class="text-center" scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Bạn Có Chắc Chắn</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" class="form-control" id="delete_id_loai_san_pham">
                                            Bạn có chắc chắn muốn xóa loại sản phẩm này!.
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button id="accpect_delete" type="button" class="btn btn-primary" data-dismiss="modal">Chắc Chắn</button>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Bạn Có Chắc Chắn</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <input id="edit_id" type="hidden" class="form-control" placeholder="Nhập vào id loại sản phẩm">
                                            <div class="form-group">
                                                <label>Tên Loại Sản Phẩm</label>
                                                <input id="edit_ten_loai_san_pham" type="text" class="form-control" placeholder="Nhập vào tên loại sản phẩm">
                                            </div>
                                            <div class="form-group">
                                                <label>Slug Loại Sản Phẩm</label>
                                                <input id="edit_slug_loai_san_pham" type="text" class="form-control" placeholder="Nhập vào slug loại sản phẩm">
                                            </div>
                                            <div class="form-group">
                                                <label>Tình Trạng</label>
                                                <select id="edit_is_open" class="form-control">
                                                    <option value="1">Hiển Thị</option>
                                                    <option value="0">Tạm Tắt</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Chọn Loại Sản Phẩm Cha</label>
                                                <select id="edit_id_loai_san_pham_cha" class="form-control">
                                                    <option value="0">Root</option>
                                                    @foreach ($danhMucCha as $key => $value)
                                                    <option value="{{ $value->id }}">{{ $value->ten_loai_san_pham }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button id="accpect_update" type="button" class="btn btn-primary" data-dismiss="modal">Cập Nhật</button>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        get();

        function show(list)
        {
            var content_table = '';
            $.each(list, function(key, value) {
                content_table += '<tr>';
                content_table += '<th class="text-center align-middle" scope="row">'+ (key + 1) +'</th>';
                content_table += '<td class="align-middle">'+ value.ten_loai_san_pham +'</td>';
                content_table += '<td class="align-middle text-center">';
                if(value.is_open){
                    content_table += '<button class="btn btn-primary">Hiển Thị</button>';
                } else {
                    content_table += '<button class="btn btn-danger">Tạm Tắt</button>';
                }
                content_table += '</td>';
                content_table += '<td class="align-middle">';
                if(value.TEN_LOAI_CHA) {
                    content_table += value.TEN_LOAI_CHA;
                } else {
                    content_table += 'Root';
                }
                content_table += '</td>';
                content_table += '<td class="text-center">';
                content_table += '<a class="edit btn btn-info mr-1" data-xyz="' + value.id +'" data-toggle="modal" data-target="#updateModal">Cập Nhật</a>';
                content_table += '<a class="del btn btn-danger" data-abc="' + value.id +'" data-toggle="modal" data-target="#deleteModal">Xóa Bỏ</a>';
                content_table += '</td>';
                content_table += '</tr>';
            });

            $("#table tbody").html(content_table);
        }

        $("body").on("click", ".del", function() {
            var id = $(this).data("abc");
            $("#delete_id_loai_san_pham").val(id);
        });

        $("body").on("click", ".edit", function() {
            var id_edit = $(this).data("xyz");
            var xxx = {
                id  :   id_edit,
            };
            axios
                .post('/admin-lte/loai-san-pham/edit', xxx)
                .then((res) => {
                    // console.log(res.data.xxx);
                    $("#edit_id").val(res.data.xxx.id);
                    $("#edit_ten_loai_san_pham").val(res.data.xxx.ten_loai_san_pham);
                    $("#edit_slug_loai_san_pham").val(res.data.xxx.slug_loai_san_pham);
                    $("#edit_is_open").val(res.data.xxx.is_open);
                    $("#edit_id_loai_san_pham_cha").val(res.data.xxx.id_loai_san_pham_cha);
                })
                .catch((res) => {
                    var listE = res.response.data.errors;
                    $.each(listE, function(k, v) {
                        toastr.error(v[0]);
                    });
                });

        });

        $("#add").click(function() {
            var xxx = {
                ten_loai_san_pham     : $("#ten_loai_san_pham").val(),
                slug_loai_san_pham    : $("#slug_loai_san_pham").val(),
                is_open               : $("#is_open").val(),
                id_loai_san_pham_cha  : $("#id_loai_san_pham_cha").val(),
            };

            axios
                .post('/admin-lte/loai-san-pham/create', xxx)
                .then((res) => {
                    if(res.data.status) {
                        toastr.success(res.data.mess);
                        $("#form").trigger("reset");
                        get();
                    } else if(toastr.data.status == 0) {
                        toastr.error(res.data.mess);
                    } else if(toastr.data.status == 2) {
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

        function get() {
            axios
                .get('/admin-lte/loai-san-pham/data')
                .then((res) => {
                    show(res.data.list);
                });
        }

        $("#ten_loai_san_pham").keyup(function() {
            var noi_dung = $("#ten_loai_san_pham").val();
            var slug = toSlug(noi_dung);
            $("#slug_loai_san_pham").val(slug);
        });

        function toSlug(str)
        {
            str = str.toLowerCase();
            str = str
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '');
            str = str.replace(/[đĐ]/g, 'd');
            str = str.replace(/([^0-9a-z-\s])/g, '');
            str = str.replace(/(\s+)/g, '-');
            str = str.replace(/-+/g, '-');
            str = str.replace(/^-+|-+$/g, '');

            return str;
        }

        $("#accpect_delete").click(function() {
            var id_can_xoa = $("#delete_id_loai_san_pham").val();
            var xxx = {
                id  :   id_can_xoa,
            };
            axios
                .post('/admin-lte/loai-san-pham/delete', xxx)
                .then((res) => {
                    if(res.data.status) {
                        toastr.success(res.data.mess);
                    } else if(res.data.status == 0) {
                        toastr.error(res.data.mess);
                    } else if(res.data.status == 2) {
                        toastr.warning(res.data.mess);
                    }
                    get();
                })
                .catch((res) => {
                    var listE = res.response.data.errors;
                    $.each(listE, function(k, v) {
                        toastr.error(v[0]);
                    });
                });

        });

        $("#edit_ten_loai_san_pham").keyup(function() {
            var noi_dung = $("#edit_ten_loai_san_pham").val();
            var slug = toSlug(noi_dung);
            $("#edit_slug_loai_san_pham").val(slug);
        });

        $("body").on("click", "#accpect_update", function() {
            var xxx = {
                id                    : $("#edit_id").val(),
                ten_loai_san_pham     : $("#edit_ten_loai_san_pham").val(),
                slug_loai_san_pham    : $("#edit_slug_loai_san_pham").val(),
                is_open               : $("#edit_is_open").val(),
                id_loai_san_pham_cha  : $("#edit_id_loai_san_pham_cha").val(),
            };
            axios
                .post('/admin-lte/loai-san-pham/update', xxx)
                .then((res) => {
                    if(res.data.status) {
                        toastr.success(res.data.mess);
                    } else if(res.data.status == 0) {
                        toastr.error(res.data.mess);
                    } else if(res.data.status == 2) {
                        toastr.warning(res.data.mess);
                    }
                    get();
                })
                .catch((res) => {
                    var listE = res.response.data.errors;
                    $.each(listE, function(k, v) {
                        toastr.error(v[0]);
                    });
                });
        });



    </script>
@endsection
