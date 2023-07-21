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
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewDetailModalLabel">Chi tiết khách hàng</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p><strong>Tên khách hàng:</strong> <span id="viewTenKH"></span></p>
            <p><strong>Địa chỉ:</strong> <span id="viewDiaChi"></span></p>
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
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Chỉnh sửa khách hàng</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Place your form elements here for editing customer details -->
            <!-- For contracts: -->
            <div class="form-group">
              <label for="inputTenKH">Tên khách hàng</label>
              <input type="text" class="form-control" id="inputTenKH">
            </div>
            <div class="form-group">
              <label for="inputDiaChi">Địa chỉ</label>
              <input type="text" class="form-control" id="inputDiaChi">
            </div>
            <!-- Add other form fields as needed -->
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
        url: "http://127.0.0.1:8000/api/customer",
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
              $("#viewTenKH").text(data.TenKH);
              $("#viewDiaChi").text(data.DiaChi);
              $("#viewDetailModal").modal("show");

              // handle edit btn
              $("#btnEdit").on("click", function() {
                var dataEdit = $("#contracts").DataTable().row($("#contracts tr.selected")).data();

                $("#inputTenKH").val("tên khách hàng");
                $("#inputDiaChi").val("địa chỉ");
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