
//DICH VU
function populateServices(selectedDichVu, selectedGoiCuoc, loaigoi) {
  $.ajax({
    url: "http://127.0.0.1:8000/api/dichvu",
    type: "GET",
    success: function (data) {
      $.each(data.data, function (index, value) {
        if (value.DICH_VU === selectedDichVu) {
          populatePacks(value.MaDV, selectedGoiCuoc, loaigoi)
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
          if (!contractDataGoiCuoc) {
            $("#packInput").prepend(`<option value=${value.MaGC}>${value.GOI_CUOC}</option>`);
          } else {
            const isSelected = value.GOI_CUOC.toString().trim().toLowerCase() == contractDataGoiCuoc.toString().trim().toLowerCase() ? "selected" : "";
            if (!!isSelected) {
              console.log(loaigoi)
              populatePackTypes(loaigoi, value.MaGC)
            }
            $("#packInput").prepend(`<option value=${value.MaGC} ${isSelected}>${value.GOI_CUOC}</option>`);
          }

        });
        $("#packInput").on("change", function (e) {
          populatePackTypes("", e.target.value)
        })
      } else {
        $("#packInput").empty();
      }
    }
  });
}

//LOAI GOI CUOC
function populatePackTypes(selectedPackType = "", selectedpackID) {
  $.ajax({
    url: `http://127.0.0.1:8000/api/loaigoi?MaGC=${selectedpackID}`,
    type: "GET",
    success: function (data) {
      data.data.forEach(type => {
        if (type.LOAI_GOI === selectedPackType) {
          populateTime(type.MaLoai, selectedpackID)
        }
        $("#packTypeInput").prepend(`<option value="${type.MaLoai}" ${type.LOAI_GOI === selectedPackType ? 'selected' : ''}>${type.LOAI_GOI} </option>`);
      });

      $("#packTypeInput").on("change", function (e) {
        populateTime(e.target.value, selectedpackID)
      })
    }
  });
}

//THOI GIAN
function populateTime(MaLoai, MaGC, selectedTime) {
  $.ajax({
    url: `http://127.0.0.1:8000/api/thoihan?MaGC=${MaGC}&MaLoai=${MaLoai}`,
    type: "GET",
    success: function (data) {
      if (data.data) {
        $("#timeInput").empty();
        data.data.forEach(time => {
          $("#timeInput").prepend(`<option value="${time.MaTH}" ${time.THOI_HAN === selectedTime ? 'selected' : ''}>${time.THOI_HAN} </option>`);
        })
      } else {
        $("#timeInput").empty();
      }
    }
  })
}
export { populateServices, populatePacks, populatePackTypes, populateTime };
