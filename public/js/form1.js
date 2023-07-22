import {
  listProvince,
  listWard,
  listDistrict,
  provinceSelected,
  districtSelected,
  wardSelected,
  getProvinces,
  getDistricts,
  getWards,
  handleProvinceChange,
  handleDistrictChange,
  handleWardChange
} from "/js/locationUtils.js";
import { populateServices, populatePacks } from "./ajaxHelpers.js";


// Lấy danh sách TỈNH/THÀNH PHỐ và đổ vào dropdown #provinceInput
getProvinces();

// Lấy danh sách QUẬN/HUYỆN và lưu vào biến listDistrict
getDistricts();

// Lấy danh sách XÃ/PHƯỜNG và lưu vào biến listWard
getWards();

// Xử lý sự kiện thay đổi TỈNH/THÀNH PHỐ
handleProvinceChange();

// Xử lý sự kiện thay đổi QUẬN/HUYỆN
handleDistrictChange();

// Xử lý sự kiện thay đổi XÃ/PHƯỜNG
handleWardChange();

populateServices();

$("#serviceInput").on("change", function (e) {
  populatePacks(e.target.value);
})


$("#idForm").submit(function (e) {
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
          toastr.error(value)
        });
      }

    }
  });
});