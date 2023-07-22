export let listProvince = [];
export let listWard = [];
export let listDistrict = [];
export let provinceSelected;
export let districtSelected;
export let wardSelected;

// Hàm để lấy danh sách TỈNH/THÀNH PHỐ và đổ vào dropdown #provinceInput
export function getProvinces() {
  $.ajax({
    type: "GET",
    url: "https://provinces.open-api.vn/api/p/",
    success: function (data) {
      listProvince = data;
      $.each(data, function (index, value) {
        $("#provinceInput").prepend(`<option value=${value.code}>${value.name}</option>`);
      });
    }
  });
}

// Hàm để lấy danh sách QUẬN/HUYỆN và lưu vào biến listDistrict
export function getDistricts() {
  $.ajax({
    type: "GET",
    url: "https://provinces.open-api.vn/api/d/",
    success: function (data) {
      listDistrict = data;
    }
  });
}

// Hàm để lấy danh sách XÃ/PHƯỜNG và lưu vào biến listWard
export function getWards() {
  $.ajax({
    type: "GET",
    url: "https://provinces.open-api.vn/api/w/",
    success: function (data) {
      listWard = data;
    }
  });
}

// Hàm xử lý khi thay đổi TỈNH/THÀNH PHỐ
export function handleProvinceChange() {
  $("#provinceInput").on("change", function (e) {
    const code = e.target.value;
    $("#districtInput").empty();

    for (let i = 0; i < listProvince.length; i++) {
      if (listProvince[i].code == code) {
        for (let j = 0; j < listDistrict.length; j++) {
          if (listDistrict[j].province_code == code) {
            $("#districtInput").append(`<option value=${listDistrict[j].code}>${listDistrict[j].name}</option>`);
          }
        }
        provinceSelected = listProvince[i];
        break;
      }
    }
  });
}

// Hàm xử lý khi thay đổi QUẬN/HUYỆN
export function handleDistrictChange() {
  $("#districtInput").on("change", function (e) {
    const code = e.target.value;
    $("#wardInput").empty();

    for (let i = 0; i < listDistrict.length; i++) {
      if (listDistrict[i].code == code) {
        for (let j = 0; j < listWard.length; j++) {
          if (listWard[j].district_code == code) {
            $("#wardInput").append(`<option value=${listWard[j].code}>${listWard[j].name}</option>`);
          }
        }
        districtSelected = listDistrict[i];
        break;
      }
    }
  });
}

// Hàm xử lý khi thay đổi XÃ/PHƯỜNG
export function handleWardChange() {
  $("#wardInput").on("change", function (e) {
    const code = e.target.value;

    for (let i = 0; i < listWard.length; i++) {
      if (listWard[i].code == code) {
        wardSelected = listWard[i];
        break;
      }
    }
  });
}
