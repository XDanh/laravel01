import {
  getProvinces,
  handleProvinceChange,
  handleDistrictChange,
  handleWardChange,
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
  formData += "&TINH_TP=" + provinceSelected?.name;
  formData += "&QUAN_HUYEN=" + districtSelected?.name;
  formData += "&XA_PHUONG=" + wardSelected?.name;
  formData += "&DICH_VU=" + dichvu;
  formData += "&GOI_CUOC=" + goicuoc;
  formData += "&LOAI_GOI_CUOC=" + loaigoi;
  formData += "&GIA_SAU_THUE=" + total;
  formData += "&GIA_THIET_BI=" + giathietbi;
  formData += "&LOAI_TB=" + loaitb;
  formData += "&THOI_GIAN=" + thoigian;
  formData += "&GIA_TRUOC_THUE=" + giatruoc;

  console.log(formData)
  var formDataObject = {};
  formData.split("&").forEach(function (item) {
    var keyValue = item.split("=");
    formDataObject[keyValue[0]] = decodeURIComponent(keyValue[1] || "");
  });
  console.log(formDataObject)

  function checkFormData(formDataObject) {
    // Đối tượng chứa các thông báo lỗi tương ứng với từng trường
    var errorMessages = {
      "TEN_KHACH_HANG": "Vui lòng nhập tên khách hàng.",
      "MA_SO_THUE": "Vui lòng nhập mã số thuế.",
      "MBHXH": "Vui lòng nhập thông tin BHXH.",
      "SO_NHA": "Vui lòng nhập số nhà.",
      "NV": "Vui lòng chọn nhân viên",
      "DICH_VU": "Vui lòng chọn dịch vụ",
      "GIA_SAU_THUE": "Vui lòng kiểm tra giá sau thế",
      "GIA_THIET_BI": "Vui lòng kiểm tra giá thiết bị",
      "GIA_TRUOC_THUE": "Vui lòng kiểm tra giá trước thuế",
      "GOI_CUOC": "Vui lòng chọn gói cước",
      "LOAI_DON_HANG": "Vui lòng chọn loại đơn hàng",
      "LOAI_GOI_CUOC": "Vui lòng chọn loại gói cước",
      "MA_SO_THUE": "Vui lòng chọn loại gói cước",
      "NGAY_KY_HD": "Vui lòng chọn ngày ký hợp đồng",
      "QUAN_HUYEN": "Vui lòng chọn quận/ huyện",
      "TINH_TP": "Vui lòng chọn tỉnh/ thành phố",
      "TRANG_THAI_DON_HANG": "Vui lòng chọn trạng thái đơn hàng",
      "THOI_GIAN": "Vui lòng chọn thời gian",
      "XA_PHUONG": "Vui lòng chọn xã/ phường",
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

  if (checkFormData(formDataObject)) {
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


