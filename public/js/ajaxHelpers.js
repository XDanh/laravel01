let temp = 0
export let dichvu = ""
export let goicuoc = ""
export let loaigoi = ""
export let total = 0
export let giathietbi = 0
export let thoigian = ""
export let loaitb = ""
export let giatruoc = 0

export let maloai1 = 0
export let magoi1 = 0

//DICH VU
function populateServices(selectedDichVu, selectedGoiCuoc, loaigoi, callPTime = true, selectedTime = 0) {
  $.ajax({
    url: "http://127.0.0.1:8000/api/dichvu",
    type: "GET",
    success: function (data) {
      $.each(data.data, function (index, value) {
        if (value.DICH_VU === selectedDichVu) {
          populatePacks(value.MaDV, selectedGoiCuoc, loaigoi, callPTime, selectedTime)
        }
        const option = `<option value="${value.MaDV}" ${value.DICH_VU === selectedDichVu ? 'selected' : ''}>${value.DICH_VU}</option>`;
        $("#serviceInput").prepend(option);
      });

      $("#serviceInput").on('change', function () {
        // Lấy giá trị mới khi option được chọn
        for (let i = 0; i < data.data.length; i++) {
          if (data.data[i].MaDV == $("#serviceInput").val()) {
            dichvu = data.data[i].DICH_VU
          }
        }
        populatePacks($("#serviceInput").val(), selectedGoiCuoc, loaigoi)
      });
    }
  });
}

//GOI CUOC
function populatePacks(selectedDichVu, contractDataGoiCuoc, loaigoi = "", callPTime = true, selectedTime) {
  $.ajax({
    url: `http://127.0.0.1:8000/api/goicuoc/${selectedDichVu}`,
    type: "GET",
    success: function (data) {
      if (data?.data.length > 0) {
        $("#packInput").empty(); // Xóa danh sách cũ trước khi đổ dữ liệu mới
        $("#packInput").prepend(`<option value="" >---Chọn gói cước---</option>`);

        $.each(data.data, function (index, value) {
          // Kiểm tra nếu giá trị trong danh sách trùng với contractData.GOI_CUOC, thì set là giá trị mặc định được chọn
          if (!contractDataGoiCuoc) {
            $("#packInput").prepend(`<option value=${value.MaGC}>${value.GOI_CUOC}</option>`);
          } else {
            const isSelected = value.GOI_CUOC.toString().trim().toLowerCase() == contractDataGoiCuoc.toString().trim().toLowerCase() ? "selected" : "";
            if (!!isSelected) {
              populatePackTypes(loaigoi, value.MaGC, callPTime, selectedTime)
            }
            $("#packInput").prepend(`<option value=${value.MaGC} ${isSelected}>${value.GOI_CUOC}</option>`);
          }

        });
        $("#packInput").on("change", function (e) {
          for (let i = 0; i < data.data.length; i++) {
            if (data.data[i].MaGC == $("#packInput").val()) {
              goicuoc = data.data[i].GOI_CUOC
            }
          }
          populatePackTypes("", e.target.value, callPTime, selectedTime)

        })
      } else {
        $("#packInput").empty();
      }
    }
  });
}

//LOAI GOI CUOC
function populatePackTypes(selectedPackType = "", selectedpackID, callPTime = true, selectedTime) {
  $.ajax({
    url: `http://127.0.0.1:8000/api/loaigoi?MaGC=${selectedpackID}`,
    type: "GET",
    success: function (data) {
      if (data.data) {
        $("#packTypeInput").empty();

        $("#packTypeInput").prepend(`<option value="" >---Chọn loại gói cước---</option>`);

        data.data.forEach(type => {
          if (type.LOAI_GOI === selectedPackType) {
            if (callPTime) {
              populateTime(type.MaLoai, selectedpackID)
            }
            maloai1 = type.MaLoai
            magoi1 = selectedpackID
          }
          $("#packTypeInput").append(`<option value="${type.MaLoai}" ${type.LOAI_GOI === selectedPackType ? 'selected' : ''}>${type.LOAI_GOI} </option>`);
        });

        if (selectedTime) {
          populateTime(maloai1, magoi1, selectedTime)
        }

        $("#packTypeInput").on("change", function (e) {
          for (let i = 0; i < data.data.length; i++) {
            if (data.data[i].MaLoai == $("#packTypeInput").val()) {
              loaigoi = data.data[i].LOAI_GOI
            }
          }
          populateTime(e.target.value, selectedpackID)
        })

      }
    }
  });
}

const formatter = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'VND',
  minimumFractionDigits: 0
})

//THOI GIAN
function populateTime(MaLoai, MaGC, selectedDeadline) {
  $.ajax({
    url: `http://127.0.0.1:8000/api/thoihan?MaGC=${MaGC}&MaLoai=${MaLoai}`,
    type: "GET",
    success: function (data) {

      if (data.data) {
        $("#timeInput").empty();
        $("#timeInput").prepend(`<option value="" >---Chọn thời gian---</option>`);

        data.data.forEach(time => {
          $("#timeInput").prepend(`<option value="${time.MaTH}" ${time?.THOI_HAN.toString() === selectedDeadline ? 'selected' : ''}>${time.THOI_HAN} </option>`);
        })
      } else {
        $("#timeInput").empty();
      }

      $("#timeInput").on("change", function (e) {
        const selectedTime = $("#timeInput").val();
        const selectedData = data.data.find(time => time.MaTH === parseInt(selectedTime));
        temp = selectedData?.GIA_TRUOC_THUE || 0
        $("#GIA_TRUOC_THUE").val(selectedData ? formatter.format(selectedData?.GIA_TRUOC_THUE) : "");
        device(MaLoai, MaGC, e.target.value)
        thoigian = selectedData?.THOI_HAN
        giatr = selectedData?.GIA_TRUOC_THUE
      });
    }
  })
}
//THIET BI
function device(MaLoai, MaGC, MaTH) {
  $.ajax({
    url: `http://127.0.0.1:8000/api/thietbi?MaGC=${MaGC}&MaLoai=${MaLoai}&MaTH=${MaTH}`,
    type: "GET",
    success: function (data) {
      loaitb = data.data[0]?.THIET_BI
      if (data.data[0]?.THIET_BI.toString().toLowerCase().trim() !== "mua") {
        $('#SO_LUONG').attr("disabled", "disabled");
        $('#SO_LUONG').val(0);
        total = Number(temp) + Number(temp) / 10
        $('#GIA_SAU_THUE').val(formatter.format(total))
        $('#Sum').text(formatter.format(0))
        giathietbi = 0


      } else {
        $('#SO_LUONG').removeAttr("disabled");
        $('#SO_LUONG').val(1);
        const giatb = Number(data.data[0]?.GIA_TB)
        $('#Sum').text(formatter.format(Number(data.data[0]?.GIA_TB)))
        total = (giatb + Number(temp)) + (giatb + Number(temp)) / 10
        $('#GIA_SAU_THUE').val(formatter.format(total))
        giathietbi = giatb

      }
      if (Number(data.data[0]?.GIA_TB)) {
        $('#GIA_TB').val(Number(data.data[0]?.GIA_TB))
      } else {
        $('#GIA_TB').val(0)
      }

      //IN TONG TIEN
      $('#SO_LUONG').on('change', function (e) {
        let DevicePrice = $('#GIA_TB').val() * e.target.value
        $('#Sum').text(formatter.format(DevicePrice))
        var sum_price = Number(DevicePrice) + Number(temp)
        total = sum_price + sum_price / 10
        $('#GIA_SAU_THUE').val(formatter.format(total))
        giathietbi = DevicePrice
      })
    }
  })
}

export { populateServices, populatePacks, populatePackTypes, populateTime };
