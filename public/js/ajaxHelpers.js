
//DICH VU
function populateServices(selectedDichVu, selectedGoiCuoc, loaigoi) {
  $.ajax({
    url: "http://127.0.0.1:8000/api/dichvu",
    type: "GET",
    success: function (data) {
      $.each(data.data, function (index, value) {
        console.log(value.DICH_VU === selectedDichVu)
        if (value.DICH_VU === selectedDichVu) {
          populatePacks(value.MaDV, selectedGoiCuoc)
        }
        const option = `<option value="${value.MaDV}" ${value.DICH_VU === selectedDichVu ? 'selected' : ''}>${value.DICH_VU}</option>`;
        $("#serviceInput").prepend(option);
      });

      $("#serviceInput").on('change', function () {
        // Lấy giá trị mới khi option được chọn
        populatePacks($("#serviceInput").val(), selectedGoiCuoc, loaigoi)
      });
    }
  });
}

//GOI CUOC
function populatePacks(selectedDichVu, contractDataGoiCuoc, loaigoi = "") {
  $.ajax({
    url: `http://127.0.0.1:8000/api/goicuoc/${selectedDichVu}`,
    type: "GET",
    success: function (data) {
      if (data?.data.length > 0) {
        $("#packInput").empty(); // Xóa danh sách cũ trước khi đổ dữ liệu mới
        $.each(data.data, function (index, value) {
          // Kiểm tra nếu giá trị trong danh sách trùng với contractData.GOI_CUOC, thì set là giá trị mặc định được chọn

          const isSelected = value.GOI_CUOC.toString().trim().toLowerCase() == contractDataGoiCuoc.toString().trim().toLowerCase() ? "selected" : "";

          if (!!isSelected) {
            populatePackTypes(loaigoi, value.MaGC)
          }
          $("#packInput").prepend(`<option value=${value.MaGC} ${isSelected}>${value.GOI_CUOC}</option>`);
        });
      } else {
        $("#packInput").empty(); // Xóa danh sách cũ trước khi đổ dữ liệu mới
      }
    }
  });
}


function populatePackTypes(selectedPackType = "", selectedpackID) {
  console.log(selectedPackType)
  $.ajax({
    url: `http://127.0.0.1:8000/api/loaigoi?MaGC=${selectedpackID}`,
    type: "GET",
    success: function (data) {
      console.log(data.data)
      data.data.forEach(type => {
        $("#packTypeInput").prepend(`<option value="${type.MaLoai}" ${type.LOAI_GOI === selectedPackType ? 'selected' : ''}>${type.LOAI_GOI} </option>`);
      });
    }
  });
}

export { populateServices, populatePacks, populatePackTypes };