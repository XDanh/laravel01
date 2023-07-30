import {
  populateServices, dichvu,
  goicuoc,
  loaigoi,
  total,
  giathietbi,
  thoigian,
  loaitb,
  giatruoc,
} from "./ajaxHelpers.js";
import {
  getProvinces,
  handleProvinceChange,
  handleDistrictChange,
  handleWardChange,
  address,
} from "./locationUtils.js";

var contractData
const formatter = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'VND',
  minimumFractionDigits: 0
})

$("#timeInput").select2({
  dropdownParent: $('#editModal')
});
$("#packTypeInput").select2({
  dropdownParent: $('#editModal')
});
$("#packInput").select2({
  dropdownParent: $('#editModal')
});
$("#serviceInput").select2({
  dropdownParent: $('#editModal')
});
$("#staffInput").select2({
  dropdownParent: $('#editModal')
});
$("#provinceInput").select2({
  dropdownParent: $('#editModal')
});
$("#districtInput").select2({
  dropdownParent: $('#editModal')
});
$("#wardInput").select2({
  dropdownParent: $('#editModal')
});

//DATA TABLE VIEW
$(document).ready(function () {
  $.ajax({
    url: "http://127.0.0.1:8000/api/contracts",
    type: "GET",
    success: function (data) {
      if (data) {
        var contracts = data
        $("#contracts").dataTable({
          data: contracts,
          searching: true,
          searchPlugins: true,
          columns: [{
            data: "MA_HOP_DONG" || null,
            searchable: true,
            orderable: true
          },
          {
            data: "TEN_KHACH_HANG" || null
          },
          {
            data: "NV" || null
          },
          {
            data: "MA_SO_THUE" || null
          },
          {
            data: "NGAY_KY_HD" || null
          },
          {
            data: "DICH_VU" || null
          },
          {
            data: "GIA_SAU_THUE" || null
          },
          {
            data: "TRANG_THAI_DON_HANG" || null
          },
          {
            data: null,
            defaultContent: '<button type="button" class="btn-detail inline-flex items-center font-semibold text-xs uppercase tracking-widest text-blue">Xem chi tiết</button>'
          }
          ]
        });
      }
    }
  });
});

$("#closeEditModal").on("click", function () {
  $("#editModal").modal("hide");
})
$("#closeUpdateModal").on("click", function () {
  $("#updateModal").modal("hide");
})
$("#closeDetailModal").on("click", function () {
  $("#viewDetailModal").modal("hide");
})
$("#closeDeleteModal").on("click", function () {
  $("#deleteConfirmationModal").modal("hide");
})

// SHOW DETAIL
$("#contracts").on("click", ".btn-detail", function () {
  var data = $("#contracts").DataTable().row($(this).parents("tr")).data();
  $.ajax({
    url: `http://127.0.0.1:8000/api/contract?id=${data.id}`,
    type: "GET",
    success: function (contract) {
      contractData = contract.data.thongtinhopdong[0]
      $("#staffInput").append(`<option value=${contractData?.NV}>${contractData?.NV}</option>`);
      $("#viewTenKH").text(contract.data.thongtinhopdong[0]?.TEN_KHACH_HANG || "Không có");
      $("#viewDiaChi").text(contract.data.thongtinhopdong[0]?.DIA_CHI || "Không có");
      $("#viewMasothue").text(contract.data.thongtinhopdong[0]?.MA_SO_THUE || "Không có");
      $("#viewBHXH").text(contract.data.thongtinhopdong[0]?.MBHXH || "Không có");
      $("#viewNhanvien").text(contract.data.thongtinhopdong[0]?.NV || "Không có")
      $("#viewNgaykyhd").text(contract.data.thongtinhopdong[0]?.NGAY_KY_HD || "Không có")
      $("#viewMasohd").text(contract.data.thongtinhopdong[0]?.MA_HOP_DONG || "Không có")
      $("#viewTrangthaidonhang").text(contract.data.thongtinhopdong[0]?.TRANG_THAI_DON_HANG || "Không có")
      $("#viewLoaidonhang").text(contract.data.thongtinhopdong[0]?.LOAI_DON_HANG || "Không có")
      $("#viewDichvu").text(contract.data.thongtinhopdong[0]?.DICH_VU || "Không có")
      $("#viewGoicuoc").text(contract.data.thongtinhopdong[0]?.GOI_CUOC || "Không có")
      $("#viewLoaigoicuoc").text(contract.data.thongtinhopdong[0]?.LOAI_GOI_CUOC || "Không có")
      $("#viewThoigian").text(contract.data.thongtinhopdong[0]?.THOI_GIAN || "Không có")
      $("#viewLoaithietbi").text(contract.data.thongtinhopdong[0]?.LOAI_TB || "Không có")
      $("#viewSoluong").text(contract.data.thongtinhopdong[0]?.SO_LUONG || "Không có")
      $("#viewGiathietbi").text(formatter.format(Number(contract.data.thongtinhopdong[0]?.GIA_THIET_BI)) || "Không có")
      $("#viewGiatruocthe").text(formatter.format(Number(contract.data.thongtinhopdong[0]?.GIA_TRUOC_THUE)) || "Không có")
      $("#viewGiasauthe").text(formatter.format(Number(contract.data.thongtinhopdong[0]?.GIA_SAU_THUE)) || "Không có")
      $("#viewGhichu").text(contract.data.thongtinhopdong[0]?.GHI_CHU || "Không có")
      $("#viewMagiaodich").text(contract.data.thongtinhopdong[0]?.MA_GD || "Không có")
      $("#viewMathuebao").text(contract.data.thongtinhopdong[0]?.MA_THUE_BAO || "Không có")
      $("#viewUsername").text(contract.data.thongtinhopdong[0]?.USERNAME || "Không có")
      $("#viewSoseri").text(contract.data.thongtinhopdong[0]?.SO_SERI || "Không có")
      $("#viewSohd").text(contract.data.thongtinhopdong[0]?.SO_HD || "Không có")
      $("#viewMatracuuhoadon").text(contract.data.thongtinhopdong[0]?.MA_TRA_CUU || "Không có")
      $("#viewNgayxuathoadon").text(contract.data.thongtinhopdong[0]?.NGAY_XUAT_HOA_DON || "Không có")
      contract.data.PDF.forEach(item => {
        $("#pdfLink").append(`<a class="me-2" href="http://127.0.0.1:8000/api/pdf/${item.PDF}" target="_blank">${item.PDF}</a>`);
      })
      $("#viewDetailModal").modal("show");

    }
  })
})


$('#btnConfirmDelete').on('click', function (e) {
  e.preventDefault();

  $.ajax({
    url: `http://127.0.0.1:8000/api/contracts/${contractData.id}`,
    type: 'DELETE',
    success: function (data) {
      toastr.success("Xóa thành công");
      setTimeout(function () {
        location.reload();
      }, 500);
      console.log(data);
    }
  })
})

// handle edit btn
function populateFields(contractData) {
  console.log(contractData)
  $("#TEN_KHACH_HANG").val(contractData.TEN_KHACH_HANG);
  $("#MA_SO_THUE").val(contractData.MA_SO_THUE);
  $("#MBHXH").val(contractData.MBHXH);
  $("#staffInput").val(contractData.NV);
  $("#NGAY_KY_HD").val(contractData.NGAY_KY_HD);
  $("#mahd").val(contractData.MA_HOP_DONG);
  $("#orderStatusInput").val(contractData.TRANG_THAI_DON_HANG);
  $("#GIA_TB").val(formatter.format(Number(contractData.GIA_THIET_BI)));
  $("#GHI_CHU").val(contractData.GHI_CHU);
  $("#SO_LUONG").val(contractData.SO_LUONG);
  $("#DIA_CHI").text(contractData.DIA_CHI);
  $("#GIA_TRUOC_THUE").val(formatter.format(Number(contractData.GIA_TRUOC_THUE)));
  $("#GIA_SAU_THUE").val(formatter.format(Number(contractData.GIA_SAU_THUE)));
}


// Sự kiện khi click vào nút #btnEdit
$("#btnEdit").on("click", function () {

  const arr = contractData?.DIA_CHI.split(" - ");
  const [num, ward, city, province] = arr;
  console.log("num:", num, "ward: ", ward, "city: ", city, "province: ", province)

  if (num && ward && city && province) {
    $("#SO_NHA").val(num);
    // Lấy danh sách TỈNH/THÀNH PHỐ và đổ vào dropdown #provinceInput
    getProvinces(province, city, ward);
  }
  // Xử lý sự kiện thay đổi TỈNH/THÀNH PHỐ
  handleProvinceChange();

  // Xử lý sự kiện thay đổi QUẬN/HUYỆN
  handleDistrictChange();

  // Xử lý sự kiện thay đổi XÃ/PHƯỜNG
  handleWardChange();

  populateFields(contractData);

  populateServices(contractData.DICH_VU, contractData.GOI_CUOC, contractData.LOAI_GOI_CUOC, false, contractData.THOI_GIAN);

  $("#editModal").modal("show");
});

//Nút lưu thay đổi
$("#idFormSave").on("submit", function (e) {
  e.preventDefault();

  var form = $(this);

  var formData = form.serialize();

  formData += "&DICH_VU=" + dichvu;
  formData += "&GOI_CUOC=" + goicuoc;
  formData += "&LOAI_GOI_CUOC=" + loaigoi;
  formData += "&GIA_SAU_THUE=" + total;
  formData += "&GIA_THIET_BI=" + giathietbi;
  formData += "&LOAI_TB=" + loaitb;
  formData += "&THOI_GIAN=" + thoigian;
  formData += "&GIA_TRUOC_THUE=" + giatruoc;
  formData += "&id=" + contractData.id;
  formData += "&DIA_CHI=" + address;

  $.ajax({
    url: `http://127.0.0.1:8000/api/contracts/${contractData.id}`,
    type: "PUT",
    data: formData,
    success: function (response) {
      if (response.mess == "oke") {
        toastr.success("Chỉnh sửa thành công");
        setTimeout(function () {
          location.reload();
        }, 500);

      }
    },
    error: function (xhr, status, error) {
      console.error(error);
    }
  });
});


// nút cập nhật đơn hàng
$("#btnUpdateOrder").on("click", function () {
  if (contractData?.MA_GD) {
    $("#magd").val(contractData?.MA_GD)
  }
  if (contractData?.MA_THUE_BAO) {
    $("#mathuebao").val(contractData?.MA_THUE_BAO)
  }
  if (contractData?.USERNAME) {
    $("#username").val(contractData?.USERNAME)
  }
  if (contractData?.SO_SERI) {
    $("#seri").val(contractData?.SO_SERI)
  }
  if (contractData?.SO_HD) {
    $("#sohd").val(contractData?.SO_HD)
  }
  if (contractData?.MA_TRA_CUU) {
    $("#matracuuhd").val(contractData?.MA_TRA_CUU)
  }
  if (contractData?.NGAY_XUAT_HOA_DON) {
    $("#ngayxuathd").val(contractData?.NGAY_XUAT_HOA_DON)
  }

  $("#updateModal").modal("show");
})

// handle delete btn
$("#btnDelete").on("click", function () {
  var dataDelete = $("#contracts").DataTable().row($("#contracts tr.selected")).data();
  $("#deleteConfirmationModal").modal("show");

  $("#btnConfirmDelete").on("click", function () {
    console.log(data.id)
    $("#deleteConfirmationModal").modal("hide");
    $("#viewDetailModal").modal("hide");
    var dataDeleted = $("#contracts").DataTable().row($("#contracts tr.selected")).data();
  });
});


//CẬP NHẬT ĐƠN HÀNG
$(document).ready(function () {
  $("#idFormUpdate").on('submit', function (event) {
    event.preventDefault();
    let formData = new FormData(this);
    formData.append("id", contractData.id);

    /*       console.log(formData)
     */
    $.ajax({
      url: `http://127.0.0.1:8000/api/upload`,
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        console.log(response);
        setTimeout(function () {
          location.reload();
        }, 500);

      },
      error: function (xhr, status, error) {

        console.error(error);
      }
    });
  });
})



