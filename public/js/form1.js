import {
  getProvinces,
  handleProvinceChange,
  handleDistrictChange,
  handleWardChange
} from "/js/locationUtils.js";
import { populateServices } from "./ajaxHelpers.js";


// Lấy danh sách TỈNH/THÀNH PHỐ và đổ vào dropdown #provinceInput
getProvinces();

// Xử lý sự kiện thay đổi TỈNH/THÀNH PHỐ
handleProvinceChange();

// Xử lý sự kiện thay đổi QUẬN/HUYỆN
handleDistrictChange();

// Xử lý sự kiện thay đổi XÃ/PHƯỜNG
handleWardChange();

populateServices();


$("#idForm").on('submit',function(e)){
    
} {
  e.preventDefault(); // avoid to execute the actual submit of the form.

  var form = $(this);
  var actionUrl = form.attr('action');

  $.ajax({
    type: "POST",
    url: actionUrl,
    data: form.serialize(), // serializes the form's elements.
    success: function (data) {
      console.log(data.oke)
      if (data.oke) {
        toastr.success(data.oke)
      } else {
        $.each(data, function (index, value) {

        });
      }

    }
  });
});
