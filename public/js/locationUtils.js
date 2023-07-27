export let listProvince = [];
export let listWard = [];
export let listDistrict = [];
export let provinceSelected;
export let districtSelected;
export let wardSelected;

// Hàm để lấy danh sách TỈNH/THÀNH PHỐ và đổ vào dropdown #provinceInput
export function getProvinces(selectedProvince, selectedDistrict, selectedWard) {
  $.ajax({
    type: "GET",
    url: "https://provinces.open-api.vn/api/p/",
    success: function (data) {
      listProvince = data;
      let provinceCode
      let districtCode

      $.each(data, function (index, value) {
        if (value.name === selectedProvince) {
          provinceCode = value.code
          provinceSelected = value
        }
        const option = `<option value="${value.code}" ${value.name === selectedProvince ? 'selected' : ''}>${value.name}</option>`;
        $("#provinceInput").prepend(option);
      });

      // Hàm để lấy danh sách QUẬN/HUYỆN và lưu vào biến listDistrict
      $.ajax({
        type: "GET",
        url: "https://provinces.open-api.vn/api/d/",
        success: function (data) {
          listDistrict = data;

          if (selectedDistrict) {
            $("#districtInput").empty();
            let filteredDistricts = data.filter(district => district.province_code == provinceCode);

            // Thêm các huyện ở tỉnh tương ứng vào #districtInput
            filteredDistricts.forEach(district => {

              if (district.name === selectedDistrict && district.province_code === provinceCode) {
                districtCode = district.code
                districtSelected = district
              }
              $("#districtInput").append(`<option value="${district.code}" ${district.name === selectedDistrict ? 'selected' : ''}>${district.name} </option>`);
            });
          }

          // Hàm để lấy danh sách XÃ/PHƯỜNG và lưu vào biến listWard
          $.ajax({
            type: "GET",
            url: "https://provinces.open-api.vn/api/w/",
            success: function (data) {
              listWard = data;
              if (selectedWard) {
                $("#wardInput").empty();
                let filteredWards = data.filter(ward => ward.district_code == districtCode);
                filteredWards.forEach(ward => {
                  if (ward.name === selectedDistrict && ward.district_code === districtCode) {
                    districtCode = ward.code
                  }
                  if (ward.name === selectedWard) {
                    wardSelected = ward
                  }
                  $("#wardInput").append(`<option value="${ward.code}" ${ward.name === selectedWard ? 'selected' : ''}>${ward.name} </option>`);
                });
              }
            }
          });
        }
      });
    }
  });
}

export function handleProvinceChange() {
  $("#provinceInput").on("change", function (e) {
    let code = e.target.value;
    $("#districtInput").empty();
    $("#districtInput").append(`<option value="">---Chọn Quận/ Huyện---</option>`);

    // Lọc danh sách các huyện dựa vào trường province_code
    let filteredDistricts = listDistrict.filter(district => district.province_code == code);

    // Thêm các huyện ở tỉnh tương ứng vào #districtInput
    filteredDistricts.forEach(district => {
      $("#districtInput").append(`<option value="${district.code}">${district.name}</option>`);
    });

    // Lưu thông tin tỉnh đang được chọn (nếu cần)
    for (let i = 0; i < listProvince.length; i++) {
      if (listProvince[i].code == code) {
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
    $("#wardInput").append(`<option value="">---Chọn Phường/ Xã---</option>`);

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
