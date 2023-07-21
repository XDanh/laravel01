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
          <th>ID</th>
          <th>Tên khách hàng</th>
          <th>Địa chỉ</th>
          <th>Mã thuế</th>
          <th>Mã bảo hiểm xã hội</th>
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
          <div class="modal-body">
            <h3>Thông tin khách hàng</h3>
            <div class="d-flex justify-content-between flex-column flex-md-row">
              <div>
                <p><strong>Tên khách hàng:</strong> <span id="viewTenKH"></span></p>
                <p><strong>Địa chỉ:</strong> <span id="viewDiaChi"></span></p>
              </div>
              <div>
                <p><strong>Mã số thế:</strong> <span id="viewMasothue"></span></p>
                <p><strong>Mã BHXH:</strong> <span id="viewBHXH"></span></p>
              </div>
            </div>

            <h3>Thông tin hợp đồng</h3>

            <div class="d-flex justify-content-between flex-column flex-md-row">
              <div>
                <p><strong>Nhân viên lập hợp đồng: </strong> <span id="viewNhanvien"></span></p>
                <p><strong>Ngày ký hợp đồng: </strong> <span id="viewNgaykyhd"></span></p>
                <p><strong>Mã số hợp đồng: </strong> <span id="viewMasohd"></span></p>
                <p><strong>Trạng thái đơn hàng: </strong> <span id="viewTrangthaidonhang"></span></p>
                <p><strong>Loại đơn hàng: </strong> <span id="viewLoaidonhang"></span></p>
                <p><strong>Dịch vụ: </strong> <span id="viewDichvu"></span></p>
                <p><strong>Gói cước: </strong> <span id="viewGoicuoc"></span></p>
              </div>
              <div>
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
              <div>
                <p><strong>Mã giao dịch: </strong> <span id="viewMagiaodich"></span></p>
                <p><strong>Mã thuê bao: </strong> <span id="viewMathuebao"></span></p>
                <p><strong>Username: </strong> <span id="viewUsername"></span></p>
                <p><strong>Số seri: </strong> <span id="viewSoseri"></span></p>
              </div>
              <div>
                <p><strong>Số hóa đơn: </strong> <span id="viewSohd"></span></p>
                <p><strong>Mã tra cứu hóa đơn: </strong> <span id="viewMatracuuhoadon"></span></p>
                <p><strong>Ngày xuất hóa đơn: </strong> <span id="viewNgayxuathoadon"></span></p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
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
                  <!-- <p class="help is-danger">{{ $errors->first('MaThue') }}</p> -->
                </div>

                <div class="field mb-3 align-items-center justify-content-between d-flex">
                  <label class="label me-2">Mã BHXH: </label>
                  <div class="control">
                    <input id="MaBHXH" class="input form-control" type="text" placeholder="Nhập mã BHXH" name="MaBHXH">
                  </div>
                </div>

                <div class="field mb-3 align-items-center justify-content-between d-flex">
                  <label class="label me-2">Địa chỉ: </label>
                  <div class="control">
                    <input id="diachi" class="input form-control" type="text" placeholder="Nhập địa chỉ" name="diachi">
                  </div>
                </div>
              </div>

              <!-- <div class="inputBox p-3">
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
                </div>

                <div class="field mb-3 align-items-center justify-content-between d-flex">
                  <label class="label me-2">Phường/ Xã: </label>
                  <div class="control">
                    <select id="wardInput" class="form-control">

                    </select>
                  </div>
                </div>

                <div class="field mb-3 align-items-center justify-content-between d-flex">
                  <label class="label me-2">Số nhà: </label>
                  <div class="control">
                    <input class="input form-control" type="text" placeholder="e.g. 123" name="sonha">
                  </div>
                </div>
              </div> -->
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
                    <input id="giathietbi" class="input form-control" disabled type="text" name="giathietbi">
                  </div>
                </div>

                <div class="field mb-3 align-items-center justify-content-between d-flex">
                  <label class="label me-2">Giá trước thuế: </label>
                  <div class="control">
                    <input id="giatruocthue" class="input form-control" disabled type="text" name="giatruocthue">
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




            <!-- <div class="form-group">
              <label for="inputTenKH">Tên khách hàng</label>
              <input type="text" class="form-control" id="inputTenKH">
            </div>
            <div class="form-group">
              <label for="inputDiaChi">Địa chỉ</label>
              <input type="text" class="form-control" id="inputDiaChi">
            </div> -->
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

  <script>
    $(document).ready(function() {
      $.ajax({
        url: "http://127.0.0.1:8000/api/contracts",
        type: "GET",
        success: function(data) {
          console.log(data)
          if (data.data) {
            var contracts = data.data
            $("#contracts").dataTable({
              data: contracts,
              ordering: true,
              select: true,
              columns: [{
                  data: "id"
                },
                {
                  data: "TenKH"
                },
                {
                  data: "DiaChi"
                },
                {
                  data: "MaThue"
                },
                {
                  data: "MaBHXH"
                },
                {
                  data: null,
                  defaultContent: '<button type="button" class="btn btn-detail btn-info">Xem chi tiết</button>'
                }
              ]
            });

            $("#contracts").on("click", ".btn-detail", function() {
              var data = $("#contracts").DataTable().row($(this).parents("tr")).data();
              $("#viewTenKH").text(data.TEN_KHACH_HANG || "Không có");
              $("#viewDiaChi").text(data.DIA_CHI || "Không có");
              $("#viewMasothue").text(data.MA_SO_THUE || "Không có");
              $("#viewBHXH").text(data.BHXH || "Không có");
              $("#viewNhanvien").text(data.NHAN_VIEN_LAP_HOP_DONG || "Không có")
              $("#viewNgaykyhd").text(data.NGAY_KY_HOP_DONG || "Không có")
              $("#viewMasohd").text(data.MA_SO_HOP_DONG || "Không có")
              $("#viewTrangthaidonhang").text(data.TRANG_THAI_DON_HANG || "Không có")
              $("#viewLoaidonhang").text(data.LOAI_DON_HANG || "Không có")
              $("#viewDichvu").text(data.DICH_VU || "Không có")
              $("#viewGoicuoc").text(data.GOI_CUOC || "Không có")
              $("#viewThoigian").text(data.THOI_GIAN || "Không có")
              $("#viewLoaithietbi").text(data.LOAI_THIET_BI || "Không có")
              $("#viewGiathietbi").text(data.LOAI_GOI || "Không có")
              $("#viewGiatruocthe").text(data.GIA_TRUOC_THUE || "Không có")
              $("#viewVAT").text(data.VAT || "Không có")
              $("#viewGiasauthe").text(data.GIA_SAU_THUE || "Không có")
              $("#viewGhichu").text(data.GHI_CHU || "Không có")
              $("#viewMagiaodich").text(data.MA_GIAO_DICH || "Không có")
              $("#viewMathuebao").text(data.MA_THUE_BAO || "Không có")
              $("#viewUsername").text(data.USERNAME || "Không có")
              $("#viewSoseri").text(data.SO_SERI || "Không có")
              $("#viewSohd").text(data.SO_HOA_DON || "Không có")
              $("#viewMatracuuhoadon").text(data.NGAY_TRA_CUU_HOA_DON || "Không có")
              $("#viewNgayxuathoadon").text(data.NGAY_XUAT_HOA_DON || "Không có")

              $("#viewDetailModal").modal("show");

              // handle edit btn
              $("#btnEdit").on("click", function() {
                var dataEdit = $("#contracts").DataTable().row($("#contracts tr.selected")).data();

                $("#TenKH").val("")
                $("#MaThue").val("")
                $("#MaBHXH").val("")
                $("#diachi").val("")
                $("#provinceInput").val("")
                $("#districtInput").val("")
                $("#wardInput").val("")
                $("#staffInput").val("")
                $("#ngaykyhd").val("")
                $("#mahd").val("")
                $("#orderStatusInput").val("")
                $("#orderTypeInput").val("")
                $("#serviceInput").val("")
                $("#packInput").val("")
                $("#timeInut").val("")
                $("#orderTypeInput").val("")
                $("#giathietbi").val("")
                $("#giatruocthue").val("")
                $("#giatruocthue").val("")
                $("#giasauthue").val("")
                $("#ghichu").val("")

                $("#editModal").modal("show");
              });

              // handle delete btn
              $("#btnDelete").on("click", function() {
                var dataDelete = $("#contracts").DataTable().row($("#contracts tr.selected")).data();
                $("#deleteConfirmationModal").modal("show");

                $("#btnConfirmDelete").on("click", function() {
                  console.log(data.id)
                  $("#deleteConfirmationModal").modal("hide");
                  $("#viewDetailModal").modal("hide");
                  var dataDeleted = $("#contracts").DataTable().row($("#contracts tr.selected")).data();
                });
              });
            });
          }
        }
      });
    });
  </script>
</body>

</html>