@extends('admin_lte.shares.master_lte')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quản Lý Sản Phẩm</h1>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Thêm Mới Sản Phẩm
                            </div>
                            <div class="card-body">
                            <form id="form_create">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Tên Sản Phẩm</label>
                                            <input id="ten_san_pham" type="text" class="form-control" placeholder="Nhập vào tên sản phẩm">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Slug Sản Phẩm</label>
                                            <input id="slug_san_pham" type="text" class="form-control" placeholder="Nhập vào slug sản phẩm">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Hình Ảnh Sản Phẩm</label>
                                            <div class="input-group">
                                                <input id="hinh_anh" class="form-control" type="text" name="filepath">
                                                <span class="input-group-prepend">
                                                  <a id="lfm" data-input="hinh_anh" data-preview="holder" class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                  </a>
                                                </span>
                                            </div>
                                            <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Giá Bán</label>
                                            <input id="gia_ban" type="number" min="0" class="form-control" placeholder="Nhập vào giá bán">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Giá Khuyến Mãi</label>
                                            <input id="gia_khuyen_mai" type="number" min="0" class="form-control" placeholder="Nhập vào giá khuyến mãi">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Tình Trạng</label>
                                            <select id="is_open" class="form-control">
                                                <option value="1">Hiển Thị</option>
                                                <option value="0">Dừng Kinh Doanh</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Loại Sản Phẩm</label>
                                            <select id="id_loai_san_pham" class="form-control">
                                                @foreach ($loaiSP as $key => $value)
                                                    <option value="{{ $value->id }}">{{ $value->ten_loai_san_pham }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Mô Tả Ngắn</label>
                                            <textarea class="form-control" id="mo_ta_ngan" cols="30" rows="3" placeholder="Nhập vào mô tả ngắn của sản phẩm"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Mô Tả Chi Tiết</label>
                                            <textarea class="form-control" name="mo_ta_chi_tiet" id="mo_ta_chi_tiet" cols="30" rows="7" placeholder="Nhập vào mô tả chi tiết của sản phẩm"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                            <div class="card-footer text-right">
                                <button id="accpect_create" class="btn btn-primary" disabled>Thêm Mới Sản Phẩm</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Danh Sách Sản Phẩm
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center text-nowrap">#</th>
                                            <th class="text-center text-nowrap">Tên Sản Phẩm</th>
                                            <th class="text-center text-nowrap">Hình Ảnh</th>
                                            <th class="text-center text-nowrap">Mô Tả</th>
                                            <th class="text-center text-nowrap">Giá Bán</th>
                                            <th class="text-center text-nowrap">Giá Khuyến Mãi</th>
                                            <th class="text-center text-nowrap">Tình Trạng</th>
                                            <th class="text-center text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" id="id_delete" class="form-control">
                                            Bạn có chắc chắn muốn xóa dữ liệu hay không?
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button data-dismiss="modal" id="accpect_delete" type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" id="update_id" class="form-control">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Tên Sản Phẩm</label>
                                                        <input id="update_ten_san_pham" type="text" class="form-control" placeholder="Nhập vào tên sản phẩm">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Slug Sản Phẩm</label>
                                                        <input id="update_slug_san_pham" type="text" class="form-control" placeholder="Nhập vào slug sản phẩm">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Hình Ảnh Sản Phẩm</label>
                                                        <input id="update_hinh_anh" type="text" class="form-control" placeholder="Nhập vào hình ảnh sản phẩm">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Giá Bán</label>
                                                        <input id="update_gia_ban" type="number" min="0" class="form-control" placeholder="Nhập vào giá bán">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Giá Khuyến Mãi</label>
                                                        <input id="update_gia_khuyen_mai" type="number" min="0" class="form-control" placeholder="Nhập vào giá khuyến mãi">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Tình Trạng</label>
                                                        <select id="update_is_open" class="form-control">
                                                            <option value="1">Hiển Thị</option>
                                                            <option value="0">Dừng Kinh Doanh</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Loại Sản Phẩm</label>
                                                        <select id="update_id_loai_san_pham" class="form-control">
                                                            @foreach ($loaiSP as $key => $value)
                                                                <option value="{{ $value->id }}">{{ $value->ten_loai_san_pham }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Mô Tả Ngắn</label>
                                                        <textarea class="form-control" id="update_mo_ta_ngan" cols="30" rows="3" placeholder="Nhập vào mô tả ngắn của sản phẩm"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group">
                                                        <label>Mô Tả Chi Tiết</label>
                                                        <textarea class="form-control" name="update_mo_ta_chi_tiet" id="update_mo_ta_chi_tiet" cols="30" rows="7" placeholder="Nhập vào mô tả chi tiết của sản phẩm"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button data-dismiss="modal" id="accpect_update" type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script>
        var route_prefix = "/laravel-filemanager";
    </script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $("#lfm").filemanager('image', {prefix : route_prefix});
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.19.1/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('mo_ta_chi_tiet');
        CKEDITOR.replace('update_mo_ta_chi_tiet');
    </script>
    <script>
        $(document).ready(function() {
            $("#ten_san_pham").blur(function() {
                var xxx = {
                    'slug'  :   $("#slug_san_pham").val(),
                };
                axios
                    .post('/admin-lte/san-pham/check-slug', xxx)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success(res.data.mess);
                            $("#accpect_create").removeAttr('disabled');
                        } else if(res.data.status == 0) {
                            toastr.error(res.data.mess);
                            $("#accpect_create").attr('disabled','disabled');
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

            get();

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

            $("#ten_san_pham").keyup(function() {
                // var ten = $("#ten_san_pham").val();
                var ten  = $(this).val();
                var slug = toSlug(ten);
                $("#slug_san_pham").val(slug);
                // $("#slug_san_pham").val(toSlug($(this).val()));
            });

            $("#accpect_create").click(function() {
                var xxx = {
                    'ten_san_pham'      :   $("#ten_san_pham").val(),
                    'slug_san_pham'     :   $("#slug_san_pham").val(),
                    'hinh_anh'          :   $("#hinh_anh").val(),
                    'mo_ta_ngan'        :   $("#mo_ta_ngan").val(),
                    'mo_ta_chi_tiet'    :   CKEDITOR.instances['mo_ta_chi_tiet'].getData(),
                    'is_open'           :   $("#is_open").val(),
                    'gia_ban'           :   $("#gia_ban").val(),
                    'gia_khuyen_mai'    :   $("#gia_khuyen_mai").val(),
                    'id_loai_san_pham'  :   $("#id_loai_san_pham").val(),
                };
                console.log(xxx);
                axios
                    .post('/admin-lte/san-pham/create', xxx)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success(res.data.mess);
                            $("#form_create").trigger("reset");
                            CKEDITOR.instances.mo_ta_chi_tiet.setData('');
                            get();
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

            })

            function convert(list)
            {
                var content = '';
                $.each(list, function(k, v) {
                    content += '<tr>';
                    content += '<th class="text-center align-middle">'+ (k + 1) +'</th>';
                    content += '<td class="align-middle text-nowrap">'+ v.ten_san_pham +'</td>';
                    content += '<td class="text-center align-middle">';
                    content += '<img src="'+ v.hinh_anh +'" class="img-thumbnail" style="max-height: 250px">';
                    content += '</td>';
                    content += '<td class="align-middle ">'+ v.mo_ta_ngan +'</td>';
                    content += '<td class="align-middle text-nowrap">'+ v.gia_ban +'</td>';
                    content += '<td class="align-middle text-nowrap">'+ v.gia_khuyen_mai +'</td>';
                    content += '<td class="text-center align-middle text-nowrap">';
                    if(v.is_open == 0){
                        content += '<button class="status btn btn-danger" data-id="' + v.id + '">Tạm Dừng</button>';
                    } else {
                        content += '<button class="status btn btn-primary" data-id="' + v.id + '">Đang Kinh Doanh</button>';
                    }
                    content += '</td>';
                    content += '<td class="text-center align-middle text-nowrap">';
                    content += '<button class="edit btn btn-info mr-1" data-id="'+ v.id +'" data-toggle="modal" data-target="#updateModal">Cập Nhật</button>';
                    content += '<button class="del btn btn-danger" data-id="'+ v.id +'" data-toggle="modal" data-target="#deleteModal">Xóa Bỏ</button>';
                    content += '</td>';
                    content += '</tr>';
                });

                $("#table tbody").html(content);
            }

            function get()
            {
                axios
                    .get('/admin-lte/san-pham/data')
                    .then((res) => {
                        var list    = res.data.listXXX; // array
                        convert(list);
                    });
            }

            $("#accpect_delete").click(function() {
                var xxx = {
                    'id'    :   $("#id_delete").val()
                };
                axios
                    .post('/admin-lte/san-pham/delete', xxx)
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

            $("body").on('click', '.del', function() {
                var id_delete = $(this).data('id');
                $("#id_delete").val(id_delete);
            });

            $("body").on('click', '.edit', function() {
                var id_update = $(this).data('id');
                var xxx = {
                    id  :   id_update
                };
                axios
                    .post('/admin-lte/san-pham/edit', xxx)
                    .then((res) => {
                        $("#update_id").val(res.data.sanPham.id);
                        $("#update_ten_san_pham").val(res.data.sanPham.ten_san_pham);
                        $("#update_slug_san_pham").val(res.data.sanPham.slug_san_pham);
                        $("#update_hinh_anh").val(res.data.sanPham.hinh_anh);
                        $("#update_mo_ta_ngan").val(res.data.sanPham.mo_ta_ngan);
                        CKEDITOR.instances.update_mo_ta_chi_tiet.setData(res.data.sanPham.mo_ta_chi_tiet);
                        // $("#update_mo_ta_chi_tiet").val(res.data.sanPham.mo_ta_chi_tiet);
                        $("#update_is_open").val(res.data.sanPham.is_open);
                        $("#update_gia_ban").val(res.data.sanPham.gia_ban);
                        $("#update_gia_khuyen_mai").val(res.data.sanPham.gia_khuyen_mai);
                        $("#update_id_loai_san_pham").val(res.data.sanPham.id_loai_san_pham);
                    })
                    .catch((res) => {
                        var listE = res.response.data.errors;
                        $.each(listE, function(k, v) {
                            toastr.error(v[0]);
                        });
                    });

            });

            $("#accpect_update").click(function() {
                var xxx = {
                    'id'                :   $("#update_id").val(),
                    'ten_san_pham'      :   $("#update_ten_san_pham").val(),
                    'slug_san_pham'     :   $("#update_slug_san_pham").val(),
                    'hinh_anh'          :   $("#update_hinh_anh").val(),
                    'mo_ta_ngan'        :   $("#update_mo_ta_ngan").val(),
                    // 'mo_ta_chi_tiet'    :   $("#update_mo_ta_chi_tiet").val(),
                    'mo_ta_chi_tiet'    :   CKEDITOR.instances['update_mo_ta_chi_tiet'].getData(),
                    'is_open'           :   $("#update_is_open").val(),
                    'gia_ban'           :   $("#update_gia_ban").val(),
                    'gia_khuyen_mai'    :   $("#update_gia_khuyen_mai").val(),
                    'id_loai_san_pham'  :   $("#update_id_loai_san_pham").val(),
                };
                axios
                    .post('/admin-lte/san-pham/update', xxx)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success(res.data.mess);
                            $("#form_create").trigger("reset");
                            get();
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

            $("body").on('click', '.status', function() {
                var id_x = $(this).data('id');
                var xxx = {
                    id  :   id_x
                };
                axios
                    .post('/admin-lte/san-pham/status', xxx)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success(res.data.mess);
                            get();
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
