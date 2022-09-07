@extends('admin_lte.shares.master_lte')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Lịch Sử Nhập Kho Sản Phẩm</h1>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Danh Sách Nhập Kho
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Ngày Nhập</th>
                                    <th class="text-center">Lần Nhập</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key => $value)
                                <tr>
                                    <td class="text-center align-middle">{{ $key + 1 }}</td>
                                    <td class="text-center align-middle">{{ $value->date }}</td>
                                    <td class="text-center align-middle">{{ $value->lan_nhap_kho }}</td>
                                    <td class="text-center align-middle">
                                        <button data-id="{{ $value->lan_nhap_kho }}" class="abc btn btn-primary">Chi Tiết</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Chi Tiết Nhập Kho
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="list_detail">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Tên Sản Phẩm</th>
                                    <th class="text-center">Đơn Giá</th>
                                    <th class="text-center">Số Lượng</th>
                                    <th class="text-center">Thành Tiền</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
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
        $(document).ready(function(){
            $(".abc").click(function(){
                var xxx = {
                    'lan_nhap_kho_xx' : $(this).data('id'),
                };
                axios
                    .post('/admin-lte/nhap-kho/detail', xxx)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success(res.data.mess);
                            var content = '';
                            $.each(res.data.list, function(k, v) {
                                content += '<tr>';
                                content += '<td class="text-center">'+ (k + 1) +'</td>';
                                content += '<td>'+ v.ten_san_pham +'</td>';
                                content += '<td>'+ v.so_luong_nhap +'</td>';
                                content += '<td>'+ v.don_gia_nhap +'</td>';
                                content += '<td>'+ (v.so_luong_nhap * v.don_gia_nhap) +'</td>';
                                content += '</tr>';
                            });
                            $("#list_detail tbody").html(content);
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
        })
    </script>
@endsection
