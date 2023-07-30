import {
  getProvinces,
  handleProvinceChange,
  handleDistrictChange,
  handleWardChange,
  address,
  provinceSelected,
  districtSelected,
  wardSelected,
} from "/js/locationUtils.js";
import {
  populateServices,
  dichvu,
  goicuoc,
  loaigoi,
  total,
  giathietbi,
  thoigian,
  loaitb,
  giatruoc,
} from "./ajaxHelpers.js";


$("#timeInput").select2();
$("#packTypeInput").select2();
$("#packInput").select2();
$("#serviceInput").select2();
$("#staffInput").select2();
$("#provinceInput").select2();
$("#districtInput").select2();
$("#wardInput").select2();

// Lấy danh sách TỈNH/THÀNH PHỐ và đổ vào dropdown #provinceInput
getProvinces();

// Xử lý sự kiện thay đổi TỈNH/THÀNH PHỐ
handleProvinceChange();

// Xử lý sự kiện thay đổi QUẬN/HUYỆN
handleDistrictChange();

// Xử lý sự kiện thay đổi XÃ/PHƯỜNG
handleWardChange();

populateServices();


$("#idForm").on("submit", function (e) {
  e.preventDefault();

  var form = $(this);
  var actionUrl = form.attr('action');

  var formData = form.serialize();
  formData += "&DICH_VU=" + dichvu;
  formData += "&GOI_CUOC=" + goicuoc;
  formData += "&LOAI_GOI_CUOC=" + loaigoi;
  formData += "&GIA_SAU_THUE=" + total;
  formData += "&GIA_THIET_BI=" + giathietbi;
  formData += "&LOAI_TB=" + loaitb;
  formData += "&THOI_GIAN=" + thoigian;
  formData += "&GIA_TRUOC_THUE=" + giatruoc;
  formData += "&DIA_CHI=" + address;

  var formDataObject = {};
  formData.split("&").forEach(function (item) {
    var keyValue = item.split("=");
    formDataObject[keyValue[0]] = decodeURIComponent(keyValue[1] || "");
  });

  function checkFormData(formDataObject) {
    // Đối tượng chứa các thông báo lỗi tương ứng với từng trường
    var errorMessages = {
      "TEN_KHACH_HANG": "Vui lòng nhập tên khách hàng.",
      "MA_SO_THUE": "Vui lòng nhập mã số thuế.",
      "MBHXH": "Vui lòng nhập thông tin BHXH.",
      "NV": "Vui lòng chọn nhân viên",
      "DICH_VU": "Vui lòng chọn dịch vụ",
      "GIA_SAU_THUE": "Vui lòng kiểm tra giá sau thế",
      "GIA_THIET_BI": "Vui lòng kiểm tra giá thiết bị",
      "GIA_TRUOC_THUE": "Vui lòng kiểm tra giá trước thuế",
      "GOI_CUOC": "Vui lòng chọn gói cước",
      "LOAI_GOI_CUOC": "Vui lòng chọn loại gói cước",
      "MA_SO_THUE": "Vui lòng chọn loại gói cước",
      "NGAY_KY_HD": "Vui lòng chọn ngày ký hợp đồng",
      "TRANG_THAI_DON_HANG": "Vui lòng chọn trạng thái đơn hàng",
      "THOI_GIAN": "Vui lòng chọn thời gian",
      "MA_SO_THUE": "Vui lòng nhập mã số thuế"
    };

    for (var key in formDataObject) {
      if (key === "GHI_CHU" || key === "NV" || key === "LOAI_TB" || key === "SO_LUONG") {
        continue;
      }

      if (formDataObject[key] === "" || formDataObject[key] === "undefined") {
        var errorMessage = errorMessages[key] || "Vui lòng nhập vào trường đang lỗi.";
        toastr.error(errorMessage);
        return false;
      }
    }
    return true; // Tất cả các trường đều đã được nhập, trả về true
  }

  if (checkFormData(formDataObject) && provinceSelected && districtSelected && wardSelected) {
    $.ajax({
      type: "POST",
      url: actionUrl,
      data: formData,
      success: function (data) {
        if (data.oke) {
          toastr.success("Tạo hợp đồng thành công");
          //location.reload()
          window.location.href = "/";
        } else {
          // Handle errors if needed.
        }
      },
      error: function (error) {
        console.error("Error occurred:", error);
      }
    },
    )
  }
})


