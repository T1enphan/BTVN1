@extends('admin_lte.shares.master_lte')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Quản Lý Bài Viết</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div id="homnayvui" class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Thêm Mới Bài Viết
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tiêu Đề Bài Viết</label>
                                        <input v-on:keyup="aaa()" v-model="add.tieu_de_bai_viet" type="text" class="form-control" placeholder="Nhập vào tên bài viết">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Slug Bài Viết</label>
                                        <input v-model="slug_bai_viet" type="text" class="form-control" placeholder="Nhập slug tên bài viết">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tình Trạng</label>
                                        <select v-model="add.is_open" class="form-control">
                                            <option value="1">Hiển Thị</option>
                                            <option value="0">Tạm Tắt</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hình Ảnh Bài Viết</label>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Chuyên Mục Bài Viết</label>
                                        <select v-model="add.chuyen_muc_id" class="form-control">
                                            @foreach ($chuyenMuc as $key => $value)
                                            <option value="{{$value->id}}">{{ $value->ten_chuyen_muc }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mô Tả Ngắn Của Bài Viết</label>
                                        <textarea v-model="add.mo_ta_ngan_bai_viet" class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mô Tả Chi Tiết Của Bài Viết</label>
                                        <textarea name="mo_ta_chi_tiet_bai_viet" id="mo_ta_chi_tiet_bai_viet" class="form-control" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary" v-on:click="themMoi()">Thêm Mới Bài Viết</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Danh Sách Bài Viết
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center text-nowrap">#</th>
                                        <th class="text-center text-nowrap">Tiêu Đề</th>
                                        <th class="text-center text-nowrap">Mô Tả Ngắn</th>
                                        <th class="text-center text-nowrap">Tình Trạng</th>
                                        <th class="text-center text-nowrap">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(v, k) in list">
                                        <th class="text-center align-middle text-nowrap">@{{ k + 1 }}</th>
                                        <td class="text-center align-middle text-nowrap">@{{ v.tieu_de_bai_viet }}</td>
                                        <td class="text-center align-middle">@{{ v.mo_ta_ngan_bai_viet }}</td>
                                        <td class="text-center align-middle text-nowrap">
                                            <button class="btn btn-primary" v-if="v.is_open == 1">Hiển Thị</button>
                                            <button class="btn btn-danger" v-else>Tạm Tắt</button>
                                        </td>
                                        <td class="text-center align-middle text-nowrap">
                                            <button v-on:click="edit= v" data-toggle="modal" data-target="#editModal" class="btn btn-info">Cập Nhật</button>
                                            <button v-on:click="del= v" data-toggle="modal" data-target="#deleteModal" class="btn btn-danger">Xóa Bỏ</button>
                                        </td>
                                    </tr>
                                </tbody>
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
                                            Bạn có chắc chắn muốn xóa dữ liệu hay không?
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button data-dismiss="modal" v-on:click="accpect_del()" type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <input v-model="edit.id" type="text" class="form-control" placeholder="Nhập vào tên loại sản phẩm">
                                            <div class="form-group">
                                                <label>Tiêu Đề Bài Viết</label>
                                                <input v-on:keyup="aaa()" v-model="edit.tieu_de_bai_viet" type="text" class="form-control" placeholder="Nhập vào tên bài viết">
                                            </div>
                                            <div class="form-group">
                                                <label>Slug Bài Viết</label>
                                                <input v-model="slug_bai_viet" type="text" class="form-control" placeholder="Nhập slug tên bài viết">
                                            </div>
                                            <div class="form-group">
                                                <label>Tình Trạng</label>
                                                <select v-model="edit.is_open" class="form-control">
                                                    <option value="1">Hiển Thị</option>
                                                    <option value="0">Tạm Tắt</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Hình Ảnh Bài Viết</label>
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
                                            <div class="form-group">
                                                <label>Chuyên Mục Bài Viết</label>
                                                <select v-model="edit.chuyen_muc_id" class="form-control">
                                                    @foreach ($chuyenMuc as $key => $value)
                                                    <option value="{{$value->id}}">{{ $value->ten_chuyen_muc }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Mô Tả Ngắn Của Bài Viết</label>
                                                    <textarea v-model="edit.mo_ta_ngan_bai_viet" class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Mô Tả Chi Tiết Của Bài Viết</label>
                                                    <textarea v-model="edit.mo_ta_chi_tiet_bai_viet" name="mo_ta_chi_tiet_bai_viet" id="mo_ta_chi_tiet_bai_viet" class="form-control" rows="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button data-dismiss="modal" v-on:click="accpect_update()" type="button" class="btn btn-primary">Save changes</button>
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
    new Vue({
        el      :   '#homnayvui',
        data    :   {
            add             :   {
                is_open : 1,
            },
            slug_bai_viet   :   '',
            list            :   [],
            del             :   {},
            edit            :   {},
        },
        created()   {
            this.getList();
        },
        methods :   {
            toSlug(str) {
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
            },
            aaa() {
                var tieu_de = this.add.tieu_de_bai_viet;
                var slug    = this.toSlug(tieu_de);
                this.slug_bai_viet = slug;
            },
            themMoi() {
                this.add.slug_bai_viet              = this.slug_bai_viet;
                this.add.hinh_anh_bai_viet          = $("#hinh_anh").val();
                this.add.mo_ta_chi_tiet_bai_viet    = CKEDITOR.instances['mo_ta_chi_tiet_bai_viet'].getData(),
                axios
                    .post('/admin-lte/bai-viet/create', this.add)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success(res.data.mess);
                            this.getList();
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
            },
            getList() {
                axios
                    .get('/admin-lte/bai-viet/data')
                    .then((res) => {
                        this.list = res.data.danhSachBaiViet;
                    })
            },
            accpect_del(){
                axios
                    .post('/admin-lte/bai-viet/delete', this.del)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success(res.data.mess);
                            this.getList();
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
            },
            accpect_update() {
                    axios
                        .post('/admin-lte/bai-viet/update', this.edit)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.mess);
                                this.getList();
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
                },
        },
    });
</script>
<script>
    var route_prefix = "/laravel-filemanager";
</script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $("#lfm").filemanager('image', {prefix : route_prefix});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.19.1/ckeditor.js"></script>
<script>
    CKEDITOR.replace('mo_ta_chi_tiet_bai_viet');
    CKEDITOR.replace('update_mo_ta_chi_tiet');
</script>
@endsection
