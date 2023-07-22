//DICH VU
function populateServices() {
  $.ajax({
    url: "http://127.0.0.1:8000/api/dichvu",
    type: "GET",
    success: function (data) {
      $.each(data.data, function (index, value) {
        $("#serviceInput").prepend(`<option value=${value.MaDV}>${value.DICH_VU}</option>`);
      });
    }
  });
}

//GOI CUOC
function populatePacks(selectedDichVu, contractDataGoiCuoc) {
  $.ajax({
    url: `http://127.0.0.1:8000/api/goicuoc/${selectedDichVu}`,
    type: "GET",
    success: function (data) {
      if (data?.data.length > 0) {
        $("#packInput").empty(); // Xóa danh sách cũ trước khi đổ dữ liệu mới
        $.each(data.data, function (index, value) {
          // Kiểm tra nếu giá trị trong danh sách trùng với contractData.GOI_CUOC, thì set là giá trị mặc định được chọn
          const isSelected = value.GOI_CUOC === contractDataGoiCuoc ? "selected" : "";
          $("#packInput").prepend(`<option value=${value.MaGC} ${isSelected}>${value.GOI_CUOC}</option>`);
        });
      } else {
        $("#packInput").empty(); // Xóa danh sách cũ trước khi đổ dữ liệu mới
      }
    }
  });
}

export { populateServices, populatePacks };