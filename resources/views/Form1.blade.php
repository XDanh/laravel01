<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <div class="container">
        <h1>Create Post</h1>
        <form action="{{ route('customer.store') }}" method="POST" id="idForm">
            @csrf
            <h2>Thông tin khách hàng</h2>

            <div class="d-flex justify-content-between flex-column flex-md-row">
                <div class="inputBox p-3">
                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Tên khách hàng: </label>
                        <div class="control">
                            <input class="input form-control" type="text" placeholder="Nhập tên khách hàng" name="TenKH">
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Mã thuế: </label>
                        <div class="control">
                            <input class="input form-control" type="text" placeholder="Nhập mã thuế" name="MaThue">
                        </div>
                        <!-- <p class="help is-danger">{{ $errors->first('MaThue') }}</p> -->
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Mã BHXH: </label>
                        <div class="control">
                            <input class="input form-control" type="text" placeholder="Nhập mã BHXH" name="MaBHXH">
                        </div>
                    </div>
                </div>

                <div class="inputBox p-3">
                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Tỉnh/ Thành phố: </label>
                        <div class="control">
                            <select id="provinceInput" class="form-control">

                            </select>
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Quận/ Huyện: </label>
                        <div class="control">
                            <select id="districtInput" class="form-control">

                            </select>
                        </div>
                        <!-- <p class="help is-danger">{{ $errors->first('DiaChi') }}</p> -->
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Phường/ Xã: </label>
                        <div class="control">
                            <select id="wardInput" class="form-control">

                            </select>
                        </div>
                        <!-- <p class="help is-danger">{{ $errors->first('DiaChi') }}</p> -->
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Số nhà: </label>
                        <div class="control">
                            <input class="input form-control" type="text" placeholder="e.g. 123" name="sonha">
                        </div>
                        <!-- <p class="help is-danger">{{ $errors->first('TenKH') }}</p> -->
                    </div>
                </div>
            </div>

            <h2>Thông tin hợp đồng</h2>

            <div class="d-flex justify-content-between flex-column flex-md-row">
                <div class="inputBox p-3">
                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Nhân viên lập hợp đồng: </label>
                        <div class="control">
                            <select id="staffInput" class="form-control">

                            </select>
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Ngày ký hợp đồng: </label>
                        <div class="control">
                            <input class="input form-control" type="date" name="ngaykyhd">
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Mã số hợp đồng: </label>
                        <div class="control">
                            <input class="input form-control" type="text" placeholder="13HD" name="mahd">
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Trạng thái đơn hàng: </label>
                        <div class="control">
                            <select id="orderStatusInput" class="form-control" name="trangthaidonhang">
                                <option value="0">Chưa duyệt</option>
                                <option value="1">Đã duyệt</option>
                                <option value="2">Từ chối</option>
                            </select>
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Loại đơn hàng: </label>
                        <div class="control">
                            <select id="orderTypeInput" class="form-control" name="loaidonhang">
                                <option value="L1">Loại 1</option>
                                <option value="L2">Loại 2</option>
                                <option value="L3">Loại 3</option>
                            </select>
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Dịch vụ: </label>
                        <div class="control">
                            <select id="serviceInput" class="form-control">

                            </select>
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Gói cước: </label>
                        <div class="control">
                            <select id="packInput" class="form-control">

                            </select>
                        </div>
                    </div>
                </div>

                <div class="inputBox p-3">
                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Thời gian (tháng): </label>
                        <div class="control">
                            <select id="timeInut" class="form-control">

                            </select>
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Loại thiết bị: </label>
                        <div class="control">
                            <select id="orderTypeInput" class="form-control">
                                <option value=0>Không</option>
                                <option value=1>Doanh nghiệp</option>
                                <option value=2>Cá nhân</option>
                                <option value=3>Hộ kinh doanh</option>
                            </select>
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Giá thiết bị: </label>
                        <div class="control">
                            <input class="input form-control" disabled type="text" name="giathietbi">
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Giá trước thuế: </label>
                        <div class="control">
                            <input class="input form-control" disabled type="text" name="giatruocthue">
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">VAT: </label>
                        <div class="control">
                            <input class="input form-control" disabled type="text" name="giatruocthue">
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Giá sau thuế: </label>
                        <div class="control">
                            <input class="input form-control" disabled type="text" name="giasauthue">
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Ghi chú: </label>
                        <div class="control">
                            <input class="input form-control" type="text" name="ghichu">
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-success" type="submit">submit</button>
        </form>
    </div>
    <script>
        var listProvince = []
        var listWard = []
        var listDistrict = []
        var provinceSelected
        var districtSelected
        var wardSelected

        //GET PROVINCE
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "https://provinces.open-api.vn/api/p/",
                success: function(data) {
                    listProvince = data
                    console.log(data)
                    $.each(data, function(index, value) {
                        $("#provinceInput").prepend(`<option value=${value.code}>${value.name}</option>`);
                    })
                }
            })
        })

        //GET DISTRICT
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "https://provinces.open-api.vn/api/d/",
                success: function(data) {
                    listDistrict = data
                }
            })
        })

        //GET WARD
        $(document).ready(function() {
            $.ajax({
                type: "GET",
                url: "https://provinces.open-api.vn/api/w/",
                success: function(data) {
                    listWard = data
                }
            })
        })

        //HANDLE CHANGE PROVINCE
        $("#provinceInput").on("change", function(e) {
            code = e.target.value
            $("#districtInput").empty()

            for (let i = 0; i < listProvince.length; i++) {
                if (listProvince[i].code == code) {
                    for (let j = 0; j < listDistrict.length; j++) {
                        if (listDistrict[j].province_code == code) {
                            $("#districtInput").append(`<option value=${listDistrict[j].code}>${listDistrict[j].name}</option>`);
                        }
                    }
                    provinceSelected = listProvince[i]
                    console.log(listProvince[i])
                    break;
                }
            }
        })

        //HANDLE CHANGE DISTRICT
        $("#districtInput").on("change", function(e) {
            code = e.target.value
            $("#wardInput").empty()

            for (let i = 0; i < listDistrict.length; i++) {
                if (listDistrict[i].code == code) {
                    for (let j = 0; j < listWard.length; j++) {
                        if (listWard[j].district_code == code) {
                            $("#wardInput").append(`<option value=${listWard[j].code}>${listWard[j].name}</option>`);
                        }
                    }
                    districtSelected = listDistrict[i]
                    console.log(districtSelected)
                    break;
                }
            }
        })

        //HANDLE CHANGE DISTRICT
        $("#wardInput").on("change", function(e) {
            code = e.target.value

            for (let i = 0; i < listWard.length; i++) {
                if (listWard[i].code == code) {
                    wardSelected = listWard[i]
                    console.log(wardSelected)
                    break;
                }
            }
        })

        $("#idForm").submit(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.

            var form = $(this);
            var actionUrl = form.attr('action');

            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(), // serializes the form's elements.
                success: function(data) {
                    console.log(data.oke)
                    if (data.oke) {
                        toastr.success(data.oke)
                    } else {
                        $.each(data, function(index, value) {
                            toastr.error(value)
                        });
                    }

                }
            });
        });
    </script>
</body>

</html>