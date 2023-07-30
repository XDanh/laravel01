<x-app-layout>
  <x-headercontract>
  </x-headercontract>
  <div class="container mx-auto px-4">
    <!-- Table view -->
    <table id="contracts" class="table table-striped" class="display">
      <thead>
        <tr>
          <th>Mã hợp đồng</th>
          <th>Tên khách hàng</th>
          <th>Tên nhân viên</th>
          <th>Mã số thế</th>
          <th>Ngày ký</th>
          <th>Dịch vụ</th>
          <th>Giá sau thế</th>
          <th>Trạng thái</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <!-- modal for view detail -->
    <div class="modal fade" id="viewDetailModal" tabindex="-1" aria-labelledby="viewDetailModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content mx-auto px-4">
          <div class="modal-header">
            <h5 class="modal-title" id="viewDetailModalLabel">Chi tiết khách hàng</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-4">
            <h3>Thông tin khách hàng</h3>
            <div class="d-flex justify-content-between flex-column flex-md-row">
              <div class="boxContent mb-2">
                <p><strong>Tên khách hàng:</strong> <span id="viewTenKH"></span></p>
                <p><strong>Địa chỉ:</strong> <span id="viewDiaChi"></span></p>
              </div>
              <div class="boxContent mb-2">
                <p><strong>Mã số thế:</strong> <span id="viewMasothue"></span></p>
                <p><strong>Mã BHXH:</strong> <span id="viewBHXH"></span></p>
              </div>
            </div>

            <h3>Thông tin hợp đồng</h3>

            <div class="d-flex justify-content-between flex-column flex-md-row">
              <div class="boxContent mb-2">
                <p><strong>Nhân viên lập hợp đồng: </strong> <span id="viewNhanvien"></span></p>
                <p><strong>Ngày ký hợp đồng: </strong> <span id="viewNgaykyhd"></span></p>
                <p><strong>Mã số hợp đồng: </strong> <span id="viewMasohd"></span></p>
                <p><strong>Trạng thái đơn hàng: </strong> <span id="viewTrangthaidonhang"></span></p>
                <p><strong>Dịch vụ: </strong> <span id="viewDichvu"></span></p>
                <p><strong>Gói cước: </strong> <span id="viewGoicuoc"></span></p>
                <p><strong>Loại gói cước: </strong> <span id="viewLoaigoicuoc"></span></p>
              </div>
              <div class="boxContent mb-2">
                <p><strong>Thời gian (tháng): </strong> <span id="viewThoigian"></span></p>
                <p><strong>Loại thiết bị: </strong> <span id="viewLoaithietbi"></span></p>
                <p><strong>Số lượng: </strong> <span id="viewSoluong"></span></p>
                <p><strong>Giá thiết bị: </strong> <span id="viewGiathietbi"></span></p>
                <p><strong>Giá trước thuế: </strong> <span id="viewGiatruocthe"></span></p>
                <p><strong>Giá sau thuế: </strong> <span id="viewGiasauthe"></span></p>
                <p><strong>PDF: </strong><span id="pdfLink"></span>
                  </span>

                </p>

                <p><strong>Ghi chú: </strong> <span id="viewGhichu"></span></p>
              </div>
            </div>

            <h3>Thông số kỹ thuật</h3>

            <div class="d-flex justify-content-between flex-column flex-md-row">
              <div class="boxContent mb-2">
                <p><strong>Mã giao dịch: </strong> <span id="viewMagiaodich"></span></p>
                <p><strong>Mã thuê bao: </strong> <span id="viewMathuebao"></span></p>
                <p><strong>Username: </strong> <span id="viewUsername"></span></p>
                <p><strong>Số seri: </strong> <span id="viewSoseri"></span></p>
              </div>
              <div class="boxContent mb-2">
                <p><strong>Số hóa đơn: </strong> <span id="viewSohd"></span></p>
                <p><strong>Mã tra cứu hóa đơn: </strong> <span id="viewMatracuuhoadon"></span></p>
                <p><strong>Ngày xuất hóa đơn: </strong> <span id="viewNgayxuathoadon"></span></p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="btnUpdateOrder">Cập nhật đơn hàng</button>
            <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="btnEdit">Sửa</button>
            <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" id="btnDelete" data-bs-toggle="deleteConfirmationModal">Xóa</button>
            <button type="button" id="closeDetailModal" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" data-bs-dismiss="modal">Đóng</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Chỉnh sửa khách hàng</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('contracts.store') }}" id="idFormSave">
              @csrf
              <h3>Thông tin khách hàng</h3>

              <div class="d-flex justify-content-between flex-column flex-md-row">
                <div class="inputBox p-3">
                  <div class="field mb-3 justify-between flex items-center">
                    <label class="label me-2">Tên khách hàng: </label>
                    <div class="control">
                      <input class="border border-gray-400 p-2 w-full rounded-lg" id="TEN_KHACH_HANG" type="text" placeholder="Nhập tên khách hàng" name="TEN_KHACH_HANG">
                    </div>
                  </div>

                  <div class="field mb-3 justify-between flex items-center">
                    <label class="label me-2">Mã thuế: </label>
                    <div class="control">
                      <input class="border border-gray-400 p-2 w-full rounded-lg" id="MA_SO_THUE" type="text" placeholder="Nhập mã thuế" name="MA_SO_THUE">
                    </div>
                    <!-- <p class="help is-danger">{{ $errors->first('MA_SO_THUE') }}</p> -->
                  </div>

                  <div class="field mb-3 justify-between flex items-center">
                    <label class="label me-2">Mã BHXH: </label>
                    <div class="control">
                      <input class="border border-gray-400 p-2 w-full rounded-lg" id="MBHXH" type="text" placeholder="Nhập mã BHXH" name="MBHXH">
                    </div>
                  </div>

                  <div class="field mb-3 justify-between flex items-center">
                    <label class="label me-2">Số nhà: </label>
                    <div class="control">
                      <input class="border border-gray-400 p-2 w-full rounded-lg" id="SO_NHA" type="text" placeholder="e.g. 123" name="SO_NHA">
                    </div>
                  </div>
                </div>

                <div class="inputBox p-3">
                  <div class="field mb-3 justify-between flex items-center">
                    <label class="label me-2">Tỉnh/ Thành phố: </label>
                    <div class="control">
                      <select id="provinceInput" class="border border-gray-400 p-2 w-full rounded-lg">
                        <option value="">----Chọn Tỉnh/ Thành phố----</option>
                      </select>
                    </div>
                  </div>

                  <div class="field mb-3 justify-between flex items-center">
                    <label class="label me-2">Quận/ Huyện: </label>
                    <div class="control">
                      <select id="districtInput" class="border border-gray-400 p-2 w-full rounded-lg">
                        <option value="">----Chọn Quận/ Huyện----</option>
                      </select>
                    </div>
                  </div>

                  <div class="field mb-3 justify-between flex items-center">
                    <label class="label me-2">Phường/ Xã: </label>
                    <div class="control">
                      <select id="wardInput" class="border border-gray-400 p-2 w-full rounded-lg">
                        <option value="">----Chọn Phường/ Xã----</option>
                      </select>
                    </div>
                  </div>

                  <div class="field mb-3 justify-between flex items-center">
                    <div class="field mb-3">
                      <span class="me-2 addresstitle">Địa chỉ: </span>
                      <span id="DIA_CHI"></span>
                    </div>
                  </div>
                </div>
              </div>

              <h3>Thông tin hợp đồng</h3>

              <div class="d-flex justify-content-between flex-column flex-md-row">
                <div class="inputBox p-3">
                  <div class="field mb-3 justify-between flex items-center">
                    <label class="label me-2">Nhân viên lập hợp đồng: </label>
                    <div class="control">
                      <select id="staffInput" class="border border-gray-400 p-2 w-full rounded-lg" name="NV">
                        <option value="">----Chọn nhân viên----</option>
                      </select>
                    </div>
                  </div>
                  <div class="field mb-3 justify-between flex items-center">
                    <label class="label me-2">Ngày ký hợp đồng: </label>
                    <div class="control">
                      <input class="border border-gray-400 p-2 w-full rounded-lg" type="date" name="NGAY_KY_HD" id="NGAY_KY_HD">
                    </div>
                  </div>
                  <div class="field mb-3 justify-between flex items-center">
                    <label class="label me-2">Trạng thái đơn hàng: </label>
                    <div class="control">
                      <select id="orderStatusInput" class="border border-gray-400 p-2 w-full rounded-lg" name="TRANG_THAI_DON_HANG">
                        <option value="">----Chọn trạng thái đơn hàng----</option>
                        <option value="Chưa duyệt">Chưa duyệt</option>
                        <option value="Đã duyệt">Đã duyệt</option>
                        <option value="Từ chối">Từ chối</option>
                      </select>
                    </div>
                  </div>

                  <div class="field mb-3 justify-between flex items-center">
                    <label class="label me-2">Dịch vụ: </label>
                    <div class="control">
                      <select id="serviceInput" class="border border-gray-400 p-2 w-full rounded-lg">
                        <option value="">----Chọn dịch vụ----</option>

                      </select>
                    </div>
                  </div>

                  <div class="field mb-3 justify-between flex items-center">
                    <label class="label me-2">Gói cước: </label>
                    <div class="control">
                      <select id="packInput" class="border border-gray-400 p-2 w-full rounded-lg">
                        <option value="">----Chọn gói cước----</option>

                      </select>
                    </div>
                  </div>

                  <div class="field mb-3 justify-between flex items-center">
                    <label class="label me-2">Loại gói cước: </label>
                    <div class="control">
                      <select id="packTypeInput" class="border border-gray-400 p-2 w-full rounded-lg">
                        <option value="">----Chọn gói cước----</option>

                      </select>
                    </div>
                  </div>
                </div>
                <div class="inputBox p-3">

                  <div class="field mb-3 justify-between flex items-center">
                    <label class="label me-2">Thời gian (tháng): </label>
                    <div class="control">
                      <select id="timeInput" class="border border-gray-400 p-2 w-full rounded-lg">
                        <option value="">----Chọn thời gian----</option>

                      </select>
                    </div>
                  </div>

                  <div class="field mb-3 justify-between flex items-center">
                    <label class="label me-2">Số lượng thiết bị: </label>
                    <div class="control">
                      <input type="number" id="SO_LUONG" name="SO_LUONG" min=0 placeholder="Nhập số lượng thiết bị" class="border border-gray-400 p-2 w-full rounded-lg">
                    </div>
                  </div>

                  <div class="field mb-3 justify-between flex items-center">
                    <label class="label me-2">Giá thiết bị: </label>
                    <div class="control">
                      <input id="GIA_TB" class="border border-gray-400 p-2 w-full rounded-lg" disabled type="text" name="GIA_THIET_BI">
                    </div>
                  </div>
                  <div class="field mb-3 justify-between flex items-center">
                    <label class="label me-2"></label>
                    <div class="control">
                      <div class="total-cost-device">
                        <span>Total: </span>
                        <span id="Sum"></span>
                      </div>
                    </div>
                  </div>

                  <div class="field mb-3 justify-between flex items-center">
                    <label class="label me-2">Giá trước thuế: </label>
                    <div class="control">
                      <input id="GIA_TRUOC_THUE" class="border border-gray-400 p-2 w-full rounded-lg" disabled type="text" name="GIA_TRUOC_THUE">
                    </div>
                  </div>

                  <div class="field mb-3 justify-between flex items-center">
                    <label class="label me-2">Giá sau thuế: </label>
                    <div class="control">
                      <input id="GIA_SAU_THUE" class="border border-gray-400 p-2 w-full rounded-lg" disabled type="text" name="GIA_SAU_THUE">
                    </div>
                  </div>
                  <div class="field mb-3 justify-between flex items-center">
                    <label class="label me-2">Ghi chú: </label>
                    <div class="control">
                      <input class="border border-gray-400 p-2 w-full rounded-lg" type="text" id="GHI_CHU" name="GHI_CHU">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" id="closeEditModal" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="btnSaveChange">Lưu thay đổi</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for Update -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLable" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="updateModalLable">Chỉnh sửa khách hàng</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="/api/upload" id="idFormUpdate" enctype="multipart/form-data" method="POST">
              @csrf
              <div class="d-flex justify-content-between flex-column ">

                <div class="d-flex justify-content-between flex-column flex-md-row">
                  <div class="inputBox p-3">
                    <div class="field mb-3 justify-between flex items-center">
                      <label class="label me-2">Mã giao dịch: </label>
                      <div class="control">
                        <input id="magd" class="border border-gray-400 p-2 w-full rounded-lg" type="text" placeholder="Nhập mã giao dịch" name="MA_GD">
                      </div>
                    </div>

                    <div class="field mb-3 justify-between flex items-center">
                      <label class="label me-2">Mã thuê bao: </label>
                      <div class="control">
                        <input id="mathuebao" class="border border-gray-400 p-2 w-full rounded-lg" type="text" placeholder="Nhập mã thuê bao" name="MA_THUE_BAO">
                      </div>
                    </div>

                    <div class="field mb-3 justify-between flex items-center">
                      <label class="label me-2">Username: </label>
                      <div class="control">
                        <input id="username" class="border border-gray-400 p-2 w-full rounded-lg" type="text" placeholder="Nhập username" name="USERNAME">
                      </div>
                    </div>

                    <div class="field mb-3 justify-between flex items-center">
                      <label class="label me-2">Số seri: </label>
                      <div class="control">
                        <input id="seri" class="border border-gray-400 p-2 w-full rounded-lg" type="text" placeholder="Nhập số seri" name="SO_SERI">
                      </div>
                    </div>

                    <div class="field mb-3 justify-between flex items-center">
                      <label class="label me-2">Số hoa đơn: </label>
                      <div class="control">
                        <input id="sohd" class="border border-gray-400 p-2 w-full rounded-lg" type="text" placeholder="Nhập số hóa đơn" name="SO_HD">

                      </div>
                    </div>
                    <div class="field mb-3 justify-between flex items-center">
                      <label class="label me-2"></label>
                      <div class="control">
                        <p>Nếu nhập nhiều số hoá đơn ngăn cách bằng dấu ;</p>
                      </div>
                    </div>
                  </div>

                  <div class="inputBox p-3">
                    <div class="field mb-3 justify-between flex items-center">
                      <label class="label me-2">Mã tra cứu hóa đơn: </label>
                      <div class="control">
                        <input id="matracuuhd" class="border border-gray-400 p-2 w-full rounded-lg" type="text" placeholder="Nhập mã tra cứu hóa đơn" name="MA_TRA_CUU">
                      </div>
                    </div>

                    <div class="field mb-3 justify-between flex items-center">
                      <label class="label me-2">Ngày xuất hóa đơn: </label>
                      <div class="control">
                        <input id="ngayxuathd" class="border border-gray-400 p-2 w-full rounded-lg" type="text" placeholder="Nhập ngày xuất hóa đơn" name="NGAY_XUAT_HOA_DON">
                      </div>
                    </div>

                    <div class="field mb-3 justify-between flex items-center">
                      <label class="label me-2">Upload file: </label>
                      <div class="control">
                        <input type="file" name="pdf[]" multiple class="border border-gray-400 p-2 w-full rounded-lg">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" id="closeUpdateModal" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" data-bs-dismiss="modal">Đóng</button>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" id="btnSaveChanges">Cập nhật</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- delete Confirm -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="1000" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteConfirmationModalLabel">Xác nhận xóa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Bạn có chắc chắn muốn xóa hợp đồng này?</p>
          </div>
          <div class="modal-footer">
            <button type="button" id="closeDeleteModal" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" data-bs-dismiss="modal">Hủy</button>
            <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" id="btnConfirmDelete">Xóa</button>
          </div>
        </div>
      </div>
    </div>
  </div>


</x-app-layout>