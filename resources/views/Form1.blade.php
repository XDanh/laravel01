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
        <h1>TẠO HỢP ĐỒNG</h1>
        <form action="{{ route('contracts.store') }}" method="POST" id="idForm">
            @csrf
            <h3>Thông tin khách hàng</h3>

            <div class="d-flex justify-content-between flex-column flex-md-row">
                <div class="inputBox p-3">
                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Tên khách hàng: </label>
                        <div class="control">
                            <input class="input form-control" type="text" placeholder="Nhập tên khách hàng" name="TEN_KHACH_HANG">
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Mã thuế: </label>
                        <div class="control">
                            <input class="input form-control" type="text" placeholder="Nhập mã thuế" name="MA_SO_THUE">
                        </div>
                        <!-- <p class="help is-danger">{{ $errors->first('MA_SO_THUE') }}</p> -->
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Mã BHXH: </label>
                        <div class="control">
                            <input class="input form-control" type="text" placeholder="Nhập mã BHXH" name="MBHXH">
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Số nhà: </label>
                        <div class="control">
                            <input class="input form-control" type="text" placeholder="e.g. 123" name="SO_NHA">
                        </div>
                    </div>
                </div>

                <div class="inputBox p-3">
                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Tỉnh/ Thành phố: </label>
                        <div class="control">
                            <select id="provinceInput" class="form-control" name="TINH_TP">
                                <option value="">----Chọn Tỉnh/ Thành phố----</option>
                            </select>
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Quận/ Huyện: </label>
                        <div class="control">
                            <select id="districtInput" class="form-control" name="QUAN_HUYEN">
                                <option value="">----Chọn Quận/ Huyện----</option>
                            </select>
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Phường/ Xã: </label>
                        <div class="control">
                            <select id="wardInput" class="form-control" name="XA_PHUONG">
                                <option value="">----Chọn Phường/ Xã----</option>
                            </select>
                        </div>
                    </div>


                </div>
            </div>

            <h3>Thông tin hợp đồng</h3>

            <div class="d-flex justify-content-between flex-column flex-md-row">
                <div class="inputBox p-3">
                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Nhân viên lập hợp đồng: </label>
                        <div class="control">
                            <select id="staffInput" class="form-control" name="NV">
                                <option value="">----Chọn nhân viên----</option>
                            </select>
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Mã số hợp đồng: </label>
                        <div class="control">
                            <input class="input form-control" type="text" placeholder="13HD" name="MA_HOP_DONG">
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Trạng thái đơn hàng: </label>
                        <div class="control">
                            <select id="orderStatusInput" class="form-control" name="TRANG_THAI_DON_HANG">
                                <option value="">----Chọn trạng thái đơn hàng----</option>
                                <option value="Chưa duyệt">Chưa duyệt</option>
                                <option value="Đã duyệt">Đã duyệt</option>
                                <option value="Từ chối">Từ chối</option>
                            </select>
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Loại đơn hàng: </label>
                        <div class="control">
                            <select id="orderTypeInput" class="form-control" name="LOAI_DON_HANG">
                                <option value="">----Chọn loại đơn hàng----</option>
                                <option value="L1">Loại 1</option>
                                <option value="L2">Loại 2</option>
                                <option value="L3">Loại 3</option>
                            </select>
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Dịch vụ: </label>
                        <div class="control">
                            <select id="serviceInput" class="form-control" name="DICH_VU">
                                <option value="">----Chọn dịch vụ----</option>

                            </select>
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Gói cước: </label>
                        <div class="control">
                            <select id="packInput" class="form-control" name="GOI_CUOC">
                                <option value="">----Chọn gói cước----</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="inputBox p-3">
                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Loại gói cước: </label>
                        <div class="control">
                          <select id="packTypeInput" class="form-control" name="packTypeInput">
                            <option value="">----Chọn gói cước----</option>

                          </select>
                        </div>
                      </div>
                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Thời gian (tháng): </label>
                        <div class="control">
                            <select id="timeInut" class="form-control" name="THOI_GIAN">
                                <option value="">----Chọn thời gian----</option>

                            </select>
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Số lượng thiết bị: </label>
                        <div class="control">
                            <input type="number" name="SO_LUONG" min=0 placeholder="Nhập số lượng thiết bị" id="deviceNumberInput" class="form-control">
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Giá thiết bị: </label>
                        <div class="control">
                            <input class="input form-control" disabled type="text" name="GIA_THIET_BI">
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Giá trước thuế: </label>
                        <div class="control">
                            <input class="input form-control" disabled type="text" name="GIA_TRUOC_THUE">
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Giá sau thuế: </label>
                        <div class="control">
                            <input class="input form-control" disabled type="text" name="GIA_SAU_THUE">
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Ghi chú: </label>
                        <div class="control">
                            <input class="input form-control" type="text" name="GHI_CHU">
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-success" type="submit">submit</button>
        </form>
    </div>
    <script type="module" src="/js/form1.js">
    </script>
    <script type="module" src="/js/ajaxHelpers.js">
    </script>
</body>

</html>
