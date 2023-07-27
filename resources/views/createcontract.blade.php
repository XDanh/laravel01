<x-app-layout>
    <x-headermakect>
    </x-headermakect>
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
                            <select id="provinceInput" class="form-control">
                                <option value="">----Chọn Tỉnh/ Thành phố----</option>
                            </select>
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Quận/ Huyện: </label>
                        <div class="control">
                            <select id="districtInput" class="form-control">
                                <option value="">----Chọn Quận/ Huyện----</option>
                            </select>
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Phường/ Xã: </label>
                        <div class="control">
                            <select id="wardInput" class="form-control">
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
                        <label class="label me-2">Ngày ký hợp đồng: </label>
                        <div class="control">
                            <input class="input form-control" type="date" name="NGAY_KY_HD" id="NGAY_KY_HD">
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
                            <select id="serviceInput" class="form-control">
                                <option value="">----Chọn dịch vụ----</option>

                            </select>
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Gói cước: </label>
                        <div class="control">
                            <select id="packInput" class="form-control">
                                <option value="">----Chọn gói cước----</option>

                            </select>
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Loại gói cước: </label>
                        <div class="control">
                            <select id="packTypeInput" class="form-control">
                                <option value="">----Chọn gói cước----</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="inputBox p-3">

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Thời gian (tháng): </label>
                        <div class="control">
                            <select id="timeInput" class="form-control">
                                <option value="">----Chọn thời gian----</option>

                            </select>
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Số lượng thiết bị: </label>
                        <div class="control">
                            <input type="number" id="SO_LUONG" name="SO_LUONG" min=0 placeholder="Nhập số lượng thiết bị" id="deviceNumberInput" class="form-control">
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Giá thiết bị: </label>
                        <div class="control">
                            <input id="GIA_TB" class="input form-control" disabled type="text" name="GIA_THIET_BI">
                        </div>
                    </div>
                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2"></label>
                        <div class="control">
                            <div class="total-cost-device">
                                <span>Total: </span>
                                <span id="Sum"></span>
                            </div>
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Giá trước thuế: </label>
                        <div class="control">
                            <input id="GIA_TRUOC_THUE" class="input form-control" disabled type="text" name="GIA_TRUOC_THUE">
                        </div>
                    </div>

                    <div class="field mb-3 align-items-center justify-content-between d-flex">
                        <label class="label me-2">Giá sau thuế: </label>
                        <div class="control">
                            <input id="GIA_SAU_THUE" class="input form-control" disabled type="text" name="GIA_SAU_THUE">
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-app-layout>
