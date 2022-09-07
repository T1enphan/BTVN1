<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <title>Hello, world!</title>
</head>
<body>
    <div class="container mt-5" id="app">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header" id="ten_san_pham">

                    </div>
                    <div class="card-body">
                        <img id="hinh_anh_san_pham" src="" class="img-thumbnail text-center" style="width: 100%">
                        <p class="text-justify" id="noi_dung_san_pham">

                        </p>
                    </div>
                    <div class="card-footer text-right">
                        <a id="link_san_pham" class="btn btn-primary">Mua Sản Phẩm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" ></script>
<script>

    axios
        .get('/admin-lte/san-pham/detail/7')
        .then((res) => {
            var san_pham = res.data.san_pham_xx;
            $("#ten_san_pham").html(san_pham.ten_san_pham);
            $("#noi_dung_san_pham").html(san_pham.mo_ta_chi_tiet);
            $("#hinh_anh_san_pham").attr('src', san_pham.hinh_anh);
            $("#link_san_pham").prop("href", san_pham.id);
        });




</script>
</html>
