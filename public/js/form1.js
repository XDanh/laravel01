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


$("#idForm").on("submit", function(e) {
    e.preventDefault(); // Avoid submitting the form in the traditional way.

    var form = $(this);
    var actionUrl = form.attr('action');

    var formData = form.serialize(); // Serialize the form data.

    // Add additional data to the formData object.
    formData += "&TINH_TP=" + provinceSelected.name;
    formData += "&QUAN_HUYEN=" + districtSelected.name;
    formData += "&XA_PHUONG=" + wardSelected.name;
    formData += "&DICH_VU=" + dichvu;
    formData += "&GOI_CUOC=" + goicuoc;
    formData += "&LOAI_GOI_CUOC=" + loaigoi;
    $.ajax({
      type: "POST",
      url: actionUrl,
      data: formData,
      success: function(data) {
        console.log(data);
        if (data.oke) {
          toastr.success(data.message); // Assuming your server sends back an "oke" property and a "message" property in the response.
        } else {
          // Handle errors if needed.
        }
      },
      error: function(error) {
        console.error("Error occurred:", error);
      }
    });
  });
