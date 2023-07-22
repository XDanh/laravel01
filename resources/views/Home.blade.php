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

  <link href="https://cdn.datatables.net/v/bs5/dt-1.13.5/sl-1.7.0/datatables.min.css" rel="stylesheet">
  <script src="https://cdn.datatables.net/v/bs5/dt-1.13.5/sl-1.7.0/datatables.min.js"></script>

  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/dataTable.css">
</head>

<body>
  <div class="container">
    <!-- Table view -->
    <table id="contracts" class="table table-striped" class="display">
      <thead>
        <tr>
          <th>Tên nhân viên</th>
          <th>Tên khách hàng</th>
          <th>Mã hợp đồng</th>
          <th>Mã số thế</th>
          <th>Ngày ký</th>
          <th>Dịch vụ</th>
          <th>Loại đơn</th>
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
        <div class="modal-content">
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
                <p><strong>Loại đơn hàng: </strong> <span id="viewLoaidonhang"></span></p>
                <p><strong>Dịch vụ: </strong> <span id="viewDichvu"></span></p>
                <p><strong>Gói cước: </strong> <span id="viewGoicuoc"></span></p>
                <p><strong>Loại gói cước: </strong> <span id="viewLoaigoicuoc"></span></p>
              </div>
              <div class="boxContent mb-2">
                <p><strong>Thời gian (tháng): </strong> <span id="viewThoigian"></span></p>
                <p><strong>Loại thiết bị: </strong> <span id="viewLoaithietbi"></span></p>
                <p><strong>Giá thiết bị: </strong> <span id="viewGiathietbi"></span></p>
                <p><strong>Giá trước thuế: </strong> <span id="viewGiatruocthe"></span></p>
                <p><strong>VAT: </strong> <span id="viewVAT"></span></p>
                <p><strong>Giá sau thuế: </strong> <span id="viewGiasauthe"></span></p>
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
            <button type="button" class="btn btn-primary" id="btnUpdateOrder">Cập nhật đơn hàng</button>
            <button type="button" class="btn btn-primary" id="btnEdit">Sửa</button>
            <button type="button" class="btn btn-danger" id="btnDelete">Xóa</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
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
            <h2>Thông tin khách hàng</h2>

            <div class="d-flex justify-content-between flex-column ">

              <div class="d-flex justify-content-between flex-column flex-md-row">
                <div class="inputBox p-3">
                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Tên khách hàng: </label>
                    <div class="control">
                      <input id="TenKH" class="input form-control" type="text" placeholder="Nhập tên khách hàng" name="TenKH">
                    </div>
                  </div>

                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Mã thuế: </label>
                    <div class="control">
                      <input id="MaThue" class="input form-control" type="text" placeholder="Nhập mã thuế" name="MaThue">
                    </div>
                  </div>

                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Mã BHXH: </label>
                    <div class="control">
                      <input id="MaBHXH" class="input form-control" type="text" placeholder="Nhập mã BHXH" name="MaBHXH">
                    </div>
                  </div>
                </div>

                <div class="inputBox p-3">
                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Tỉnh/ Thành phố: </label>
                    <div class="control">
                      <select id="provinceInput" class="form-control">
                        <option value="">---Chọn Tỉnh/ Thành phố---</option>
                      </select>
                    </div>
                  </div>

                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Quận/ Huyện: </label>
                    <div class="control">
                      <select id="districtInput" class="form-control">
                        <option value="">---Chọn Quận/ Huyện---</option>

                      </select>
                    </div>
                  </div>

                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Phường/ Xã: </label>
                    <div class="control">
                      <select id="wardInput" class="form-control">
                        <option value="">---Chọn Phường/ Xã---</option>

                      </select>
                    </div>
                  </div>

                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Số nhà: </label>
                    <div class="control">
                      <input class="input form-control" type="text" placeholder="e.g. 123" name="sonha">
                    </div>
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
                      <input id="ngaykyhd" class="input form-control" type="date" name="ngaykyhd">
                    </div>
                  </div>

                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Mã số hợp đồng: </label>
                    <div class="control">
                      <input id="mahd" class="input form-control" type="text" placeholder="13HD" name="mahd">
                    </div>
                  </div>

                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Trạng thái đơn hàng: </label>
                    <div class="control">
                      <select id="orderStatusInput" class="form-control" name="trangthaidonhang">
                        <option value="">---Chọn trạng thái đơn hàng---</option>
                        <option value="Chưa duyệt">Chưa duyệt</option>
                        <option value="Đã duyệt">Đã duyệt</option>
                        <option value="Từ chối">Từ chối</option>
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

                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Loại gói cước: </label>
                    <div class="control">
                      <select id="packTypeInput" class="form-control" name="packTypeInput">

                      </select>
                    </div>
                  </div>
                </div>

                <div class="inputBox p-3">
                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Thời gian (tháng): </label>
                    <div class="control">
                      <select id="timeInput" class="form-control">

                      </select>
                    </div>
                  </div>

                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Số lượng thiết bị: </label>
                    <div class="control">
                      <input type="number" min=0 placeholder="Nhập số lượng thiết bị" id="deviceNumberInput" class="form-control">
                    </div>
                  </div>

                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Giá thiết bị: </label>
                    <div class="control">
                      <input id="giathietbi" class="input form-control" disabled type="text" name="giathietbi">
                    </div>
                  </div>

                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Giá trước thuế: </label>
                    <div class="control">
                      <input id="GIA_TRUOC_THUE" class="input form-control" disabled type="text" name="GIA_TRUOC_THUE">
                    </div>
                  </div>

                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">VAT: </label>
                    <div class="control">
                      <input id="giatruocthue" class="input form-control" disabled type="text" name="giatruocthue">
                    </div>
                  </div>

                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Giá sau thuế: </label>
                    <div class="control">
                      <input id="giasauthue" class="input form-control" disabled type="text" name="giasauthue">
                    </div>
                  </div>

                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Ghi chú: </label>
                    <div class="control">
                      <input id="ghichu" class="input form-control" type="text" name="ghichu">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
              <button type="button" class="btn btn-primary" id="btnSaveChanges">Lưu thay đổi</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal for Delete Confirmation -->
      <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteConfirmationModalLabel">Xác nhận xóa</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p>Bạn có chắc chắn muốn xóa khách hàng này?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
              <button type="button" class="btn btn-danger" id="btnConfirmDelete">Xóa</button>
            </div>
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
            <div class="d-flex justify-content-between flex-column ">

              <div class="d-flex justify-content-between flex-column flex-md-row">
                <div class="inputBox p-3">
                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Mã giao dịch: </label>
                    <div class="control">
                      <input id="magd" class="input form-control" type="text" placeholder="Nhập mã giao dịch" name="magd">
                    </div>
                  </div>

                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Mã thuê bao: </label>
                    <div class="control">
                      <input id="mathuebao" class="input form-control" type="text" placeholder="Nhập mã thuê bao" name="mathuebao">
                    </div>
                  </div>

                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Username: </label>
                    <div class="control">
                      <input id="username" class="input form-control" type="text" placeholder="Nhập username" name="username">
                    </div>
                  </div>

                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Số seri: </label>
                    <div class="control">
                      <input id="seri" class="input form-control" type="text" placeholder="Nhập số seri" name="seri">
                    </div>
                  </div>

                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">óSố ha đơn: </label>
                    <div class="control">
                      <input id="sohd" class="input form-control" type="text" placeholder="Nhập số hóa đơn" name="SO_HOA_DON">
                      <p>Nếu nhập nhiều số hoá đơn ngăn cách bằng dấu ;</p>
                    </div>
                  </div>
                </div>

                <div class="inputBox p-3">
                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Mã tra cứu hóa đơn: </label>
                    <div class="control">
                      <input id="matracuuhd" class="input form-control" type="text" placeholder="Nhập mã tra cứu hóa đơn" name="matracuuhd">
                    </div>
                  </div>

                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Ngày xuất hóa đơn: </label>
                    <div class="control">
                      <input id="ngayxuathd" class="input form-control" type="text" placeholder="Nhập ngày xuất hóa đơn" name="ngayxuathd">
                    </div>
                  </div>

                  <div class="field mb-3 align-items-center justify-content-between d-flex">
                    <label class="label me-2">Upload file: </label>
                    <div class="control">
                      <input id="uploadfile" class="input form-control" type="file" multiple name="uploadfile">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
              <button type="button" class="btn btn-primary" id="btnSaveChanges">Cập nhật</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script type="module" src="/js/home.js">

    </script>
</body>

</html>