// validate form cat
$(document).ready(function() {
    $("#dieuchuyentaisannhieu").validate({
        rules: {
            khoanhan: {
                required: true,

            },
            nguoinhan: {
                required: true,
            },
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        messages: {
            khoanhan: {
                required: "<span class='validate'>Hãy chọn khoa nhận !</span>",

            },
            nguoinhan: {
                required: "<span class='validate'>Hãy chọn người nhận!</span>",
            },
        }
    });
    $("#send_mail").validate({
        rules: {
            khoa: {
                required: true,

            },
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        messages: {
            khoa: {
                required: "<span class='validate'>Hãy chọn khoa nhận !</span>",

            },
        }
    });
    $("#chitietdanhgia").validate({
        rules: {
            soluong: {
                required: true,
                number: true,

            },
            dongia: {
                required: true,
                number: true,
            },
            thoigian_sd: {
                required: true,
                number: true,
            },
            nguyengia: {
                number: true,
            },
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        messages: {
            soluong: {
                required: "<span class='validate'>Hãy nhập số lượng !</span>",
                number: "<span class='validate'>Bạn chỉ được nhập số</span>",
            },
            dongia: {
                required: "<span class='validate'>Hãy nhập đơn giá!</span>",
                number: "<span class='validate'>Bạn chỉ được nhập số</span>",
            },
            thoigian_sd: {
                required: "<span class='validate'>Hãy nhập thời gian sử dụng / dv: năm !</span>",
                number: "<span class='validate'>Bạn chỉ được nhập số</span>",
            },
            nguyengia: {
                number: "<span class='validate'>Bạn chỉ được nhập số</span>",
            },
        }
    });
});
// validate form cat
$(document).ready(function() {
    $.validator.addMethod("check_tendm", function(value, element) {
        var result = false;
        var id_dm_cha = $("#id_dm_cha").val();
        $.ajax({
            type: "POST",
            async: false,
            url: "/admin/admin_cat/check_tendm",
            data: {
                namecat: value,
                id_dm_cha: id_dm_cha,
            },
            success: function(data) {
                console.log(data);
                if (data == true) {
                    result = false;
                } else {
                    result = true;
                }
            }
        }); 
        
        return result;
    }, "Danh mục");
    $("#index_cat").validate({
        rules: {
            tendm: {
                required: true,
                minlength: 3,
                maxlength: 36,
                check_tendm: true,
            },
            madm: {
                minlength: 3,
                maxlength: 36,
            },
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        messages: {
            tendm: {
                required: "<span class='validate'>Hãy nhập danh mục của bạn !</span>",
                minlength: "<span class='validate'>Ít nhất là 3 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
                check_tendm: "<span class='validate'>Tên danh mục đã tồn tại</span>"
            },
            madm: {
                minlength: "<span class='validate'>Ít nhất là 3 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
            },
        }
    });
});
// validate form cat
$(document).ready(function() {
    $.validator.addMethod("check_soluongnhap", function(value, element) {
        var result = false;
        var soluong = Number($("#soluong").val());
        var input = Number(value);
        console.log(input);
        console.log(soluong);

        if (input > soluong) {
            result = false;
        } else {
            result = true;
        }
        return result;
        console.log(result);

    }, "Số lượng phải nhỏ hơn " + $("#soluong").val());
    $("#thanhlytaisan").validate({
        rules: {
            ngaythanhly: {
                required: true,
            },
            lydo: {
                required: true,
                minlength: 3,
                maxlength: 36,
            },
            soluong: {
                required: true,
                number: true,
                check_soluongnhap: true,
            },
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        messages: {
            ngaythanhly: {
                required: "<span class='validate'>Hãy chọn ngày thanh lý !</span>",
            },
            lydo: {
                required: "<span class='validate'>Hãy nhập lý do !</span>",
                minlength: "<span class='validate'>Ít nhất là 3 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
            },
            soluong: {
                required: "<span class='validate'>Hãy nhập số lượng thanh lý !</span>",
                number: "<span class='validate'>Bạn chỉ được nhập số</span>",

            },
        }
    });
});
// index_dmcha
$(document).ready(function() {
    $.validator.addMethod("check_tendmcha", function(value, element) {
        var result = false;
        $.ajax({
            type: "POST",
            async: false,
            url: "/admin/admin_cat/check_tendmcha",
            data: {
                namecat: value,
            },
            success: function(data) {
                console.log(data);
                if (data == true) {
                    result = false;
                } else {
                    result = true;
                }
            }
        });
        return result;
    }, "Danh mục");
    $("#index_dmcha").validate({
        rules: {
            tendm: {
                required: true,
                minlength: 3,
                maxlength: 36,
                check_tendmcha: true,
            },
            madm: {
                minlength: 3,
                maxlength: 36,
            },
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        messages: {
            tendm: {
                required: "<span class='validate'>Hãy nhập danh mục của bạn !</span>",
                minlength: "<span class='validate'>Ít nhất là 3 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
                check_tendmcha: "<span class='validate'>Tên danh mục đã tồn tại</span>"
            },
            madm: {
                minlength: "<span class='validate'>Ít nhất là 3 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
            },
        }
    });
});
$(document).ready(function() {
    $.validator.addMethod("check_tenlop", function(value, element) {
        var result = false;
        $.ajax({
            type: "POST",
            async: false,
            url: "/admin/admin_khoa/check_tenlop",
            data: {
                tenlop: value,
            },
            success: function(data) {
                console.log(data);
                if (data == true) {
                    result = false;
                } else {
                    result = true;
                }
            }
        });
        return result;
    }, " Tên lớp đã tồn tại ");
    $("#index_lop").validate({
        rules: {
            tenlop: {
                required: true,
                minlength: 3,
                maxlength: 36,
                check_tenlop: true,
            },

        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        messages: {
            tenlop: {
                required: "<span class='validate'>Hãy nhập tên lớp !</span>",
                minlength: "<span class='validate'>Ít nhất là 3 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
            },

        }
    });
});
// nguonkinhphi add
$(document).ready(function() {
    $.validator.addMethod("check_tennguonkinhphi", function(value, element) {
        var result = false;
        $.ajax({
            type: "POST",
            async: false,
            url: "/admin/admin_kinhphi/check_tennguonkinhphi",
            data: {
                tennguonkinhphi: value,
            },
            success: function(data) {
                if (data == true) {
                    result = false;
                } else {
                    result = true;
                }
            }
        });
        return result;
    }, "Danh mục");
    $("#index_kinhphi").validate({
        rules: {
            tennguonkinhphi: {
                required: true,
                minlength: 3,
                maxlength: 36,
                check_tennguonkinhphi: true,
            },
            manguonkinhphi: {
                minlength: 3,
                maxlength: 36,
            },
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        messages: {
            tennguonkinhphi: {
                required: "<span class='validate'>Hãy nhập tên nguồn kinh phí của bạn !</span>",
                minlength: "<span class='validate'>Ít nhất là 3 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
                check_tennguonkinhphi: "<span class='validate'>Tên nguồn kinh phí đã tồn tại</span>"
            },
            manguonkinhphi: {
                minlength: "<span class='validate'>Ít nhất là 3 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
            },
        }
    });
});
// index nuoc
$(document).ready(function() {
    $.validator.addMethod("check_tennuoc", function(value, element) {
        var result = false;
        $.ajax({
            type: "POST",
            async: false,
            url: "/admin/admin_nuoc/check_tennuoc",
            data: {
                tennuoc: value,
            },
            success: function(data) {
                if (data == true) {
                    result = false;
                } else {
                    result = true;
                }
            }
        });
        return result;
    }, "Danh mục");
    $("#index_nuoc").validate({
        rules: {
            tennuoc: {
                required: true,
                minlength: 3,
                maxlength: 36,
                check_tennuoc: true,
            },
            manuoc: {
                minlength: 3,
                maxlength: 36,
            },
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        messages: {
            tennuoc: {
                required: "<span class='validate'>Hãy nhập tên nước !</span>",
                minlength: "<span class='validate'>Ít nhất là 3 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
                check_tennuoc: "<span class='validate'>Tên nước đã tồn tại</span>"
            },
            manuoc: {
                minlength: "<span class='validate'>Ít nhất là 3 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
            },
        }
    });
});
// nguonkinhphi add
$(document).ready(function() {
    $.validator.addMethod("check_tencongty", function(value, element) {
        var result = false;
        $.ajax({
            type: "POST",
            async: false,
            url: "/admin/admin_ncc/check_tencongty",
            data: {
                tencongty: value,
            },
            success: function(data) {
                if (data == true) {
                    result = false;
                } else {
                    result = true;
                }
            }
        });
        return result;
    }, "Danh mục");
    $("#index_ncc").validate({
        rules: {
            tencongty: {
                required: true,
                minlength: 3,
                maxlength: 36,
                check_tencongty: true,
            },
            macongty: {
                minlength: 3,
                maxlength: 36,
            },
            diachi: {
                required: true,
                minlength: 3,
                maxlength: 36,
            },
            sdt: {
                required: true,
                minlength: 10,
                maxlength: 11,
                number: true,
            },
            email: {
                required: true,
                email: true
            },
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        messages: {
            tencongty: {
                required: "<span class='validate'>Hãy nhập tên coong ty !</span>",
                minlength: "<span class='validate'>Ít nhất là 3 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
                check_tencongty: "<span class='validate'>Tên công ty đã tồn tại</span>"
            },
            macongty: {
                minlength: "<span class='validate'>Ít nhất là 3 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
            },
            diachi: {
                required: "<span class='validate'>Hãy nhập địa chỉ của bạn !</span>",
                minlength: "<span class='validate'>Ít nhất là 3 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
            },
            sdt: {
                required: "<span class='validate'>Hãy nhập SĐT của bạn !</span>",
                minlength: "<span class='validate'>Ít nhất là 10 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 11 ký tự</span>",
                number: "<span class='validate'>Bạn chỉ được nhập số</span>",
            },
            email: {
                required: "<span class='validate'>Hãy nhập email của bạn !</span>",
                email: "<span class='validate'> Email đúng định dạng abc@example.com!</span>",
            },
        }
    });
});
$(document).ready(function() {
    $.validator.addMethod("check_tentaisan", function(value, element) {
        var result = false;
        $.ajax({
            type: "POST",
            async: false,
            url: "/admin/admin_assets/check_tentaisan",
            data: {
                tentaisan: value,
            },
            success: function(data) {
                if (data == true) {
                    result = false;
                } else {
                    result = true;
                }
            }
        });
        return result;
    }, "Danh mục");
    $.validator.addMethod("check_soluong", function(value, element) {
        var result = false;
        var dongia = $("#dongia").val();
        var nguonkinhphi = $("#nguonkinhphi").val();
        if (nguonkinhphi == 0) {
            return result;
        }
        var tongtien = dongia * value;
        $.ajax({
            type: "POST",
            async: false,
            url: "/admin/admin_kinhphi/check_soluong",
            data: {
                tongtien: tongtien,
                nguonkinhphi: nguonkinhphi
            },
            success: function(data) {
                if (data == true) {
                    result = false;
                } else {
                    result = true;
                }
            }
        });
        return result;
    }, "Số lượng quá lớn, không đủ ngân sách để mua hoặc chưa chọn nguồn kinh phí");

    $("#index_assets").validate({
        rules: {
            tentaisan: {
                required: true,
                minlength: 5,
                check_tentaisan: true,
            },
            nhacungcap: {
                required: true,
            },
            nuocsanxuat: {
                required: true,
            },
            mota: {
                required: true,
            },
            sothe: {
                required: true,
                number: true,
            },
            sochungtu: {
                minlength: 5,
                number: true,
            },

            loaitaisan: {
                required: true,
            },
            muctaisan: {
                required: true,
            },
            dongia: {
                required: true,
            },
            namsanxuat: {
                required: true,
                number: true,
            },
            soluong: {
                required: true,
                number: true,
                check_soluong: true,
            },
            nguyengia: {
                number: true,
            },
            nguonkinhphi: {
                required: true,
            },
            thoigiansudung: {
                required: true,
                number: true,
            },
            ngaymua: {
                required: true,
            },
            namsudung: {
                required: true,
                number: true,
            },
            tylehaomon: {
                required: true,
                number: true,
            },
            giatrihaomon: {
                required: true,
                number: true,
            },
            haomonluyke: {
                required: true,
                number: true,
            },
            giatrihaomon: {
                required: true,
                number: true,
            },
            giatriconlai: {
                required: true,
                number: true,
            },
            ghichu: {
                minlength: 5
            },


        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        messages: {
            tentaisan: {
                required: "<span class='validate'>Hãy nhập tên tài sản</span>",
                minlength: "<span class='validate'>Ít nhất là 5 ký tự</span>",
                check_tentaisan: "<span class='validate'>Tên tài sản đã tồn tại</span>",
            },
            nhacungcap: {
                required: "<span class='validate'>Hãy chọn tên nhà cung cấp </span>",
            },
            nuocsanxuat: {
                required: "<span class='validate'>Hãy chọn nước</span>",
            },
            sothe: {
                required: "<span class='validate'>Hãy chọn số thẻ </span>",
                number: "<span class='validate'>Bạn chỉ được nhập số</span>",
            },
            sochungtu: {
                minlength: "<span class='validate'>Ít nhất là 5 ký tự</span>",
                number: "<span class='validate'>Bạn chỉ được nhập số</span>",
            },

            loaitaisan: {
                required: "<span class='validate'>Hãy chọn loại tài sản </span>",
            },
            muctaisan: {
                required: "<span class='validate'>Hãy chọn mục tài sản</span>",
            },
            namsanxuat: {
                required: "<span class='validate'>Hãy nhập năm sản xuất </span>",
                number: "<span class='validate'>Bạn chỉ được nhập số</span>",
            },
            dongia: {
                required: "<span class='validate'>Hãy nhập đơn giá </span>",
            },
            soluong: {
                required: "<span class='validate'>Hãy nhập số lượng </span>",
                number: "<span class='validate'>Bạn chỉ được nhập số</span>",
            },
            nguyengia: {
                number: "<span class='validate'>Bạn chỉ được nhập số</span>",
            },
            nguonkinhphi: {
                required: "<span class='validate'>Hãy chọn nguồn kinh phí </span>",
            },
            thoigiansudung: {
                required: "<span class='validate'>Hãy nhập thời gian sử dụng </span>",
                number: "<span class='validate'>Bạn chỉ được nhập số</span>",
            },
            ngaymua: {
                required: "<span class='validate'>Hãy chọn ngày mua </span>",
            },
            namsudung: {
                required: "<span class='validate'>Hãy nhập năm sử dụng </span>",
                number: "<span class='validate'>Bạn chỉ được nhập số</span>",
            },
            tylehaomon: {
                required: "<span class='validate'>Hãy nhập tỷ lệ hao mòn </span>",
                number: "<span class='validate'>Bạn chỉ được nhập số</span>",
            },
            giatrihaomon: {
                required: "<span class='validate'>Hãy nhập giá trị hao mòn </span>",
                number: "<span class='validate'>Bạn chỉ được nhập số</span>",
            },
            haomonluyke: {
                required: "<span class='validate'>Hãy nhập giá trị hao mòn lũy kế </span>",
                number: "<span class='validate'>Bạn chỉ được nhập số</span>",
            },
            giatriconlai: {
                required: "<span class='validate'>Hãy nhập giá trị còn lại </span>",
                number: "<span class='validate'>Bạn chỉ được nhập số</span>",
            },
            ghichu: {
                minlength: "<span class='validate'>Ít nhất là 5 ký tự</span>",
            },
        }
    });

});
$("#edit_assets").validate({
    rules: {
        tentaisan: {
            required: true,
            minlength: 5,
        },
        nhacungcap: {
            required: true,
        },
        nuocsanxuat: {
            required: true,
        },
        mota: {
            required: true,
        },
        sothe: {
            required: true,
            number: true,
        },
        sochungtu: {
            minlength: 5,
            number: true,
        },

        loaitaisan: {
            required: true,
        },
        muctaisan: {
            required: true,
        },
        dongia: {
            required: true,
        },
        namsanxuat: {
            required: true,
            number: true,
        },
        soluong: {
            required: true,
            number: true,
        },
        nguyengia: {
            number: true,
        },
        nguonkinhphi: {
            required: true,
        },
        thoigiansudung: {
            required: true,
            number: true,
        },
        ngaymua: {
            required: true,
        },
        namsudung: {
            required: true,
            number: true,
        },
        tylehaomon: {
            required: true,
            number: true,
        },
        giatrihaomon: {
            required: true,
            number: true,
        },
        haomonluyke: {
            required: true,
            number: true,
        },
        giatrihaomon: {
            required: true,
            number: true,
        },
        giatriconlai: {
            required: true,
            number: true,
        },
        ghichu: {
            minlength: 5
        },


    },
    highlight: function(element) {
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
    },
    messages: {
        tentaisan: {
            required: "<span class='validate'>Hãy nhập tên tài sản</span>",
            minlength: "<span class='validate'>Ít nhất là 5 ký tự</span>",
        },
        nhacungcap: {
            required: "<span class='validate'>Hãy chọn tên nhà cung cấp </span>",
        },
        nuocsanxuat: {
            required: "<span class='validate'>Hãy chọn nước</span>",
        },
        sothe: {
            required: "<span class='validate'>Hãy chọn số thẻ </span>",
            number: "<span class='validate'>Bạn chỉ được nhập số</span>",
        },
        sochungtu: {
            minlength: "<span class='validate'>Ít nhất là 5 ký tự</span>",
            number: "<span class='validate'>Bạn chỉ được nhập số</span>",
        },

        loaitaisan: {
            required: "<span class='validate'>Hãy chọn loại tài sản </span>",
        },
        muctaisan: {
            required: "<span class='validate'>Hãy chọn mục tài sản</span>",
        },
        namsanxuat: {
            required: "<span class='validate'>Hãy nhập năm sản xuất </span>",
            number: "<span class='validate'>Bạn chỉ được nhập số</span>",
        },
        dongia: {
            required: "<span class='validate'>Hãy nhập đơn giá </span>",
        },
        soluong: {
            required: "<span class='validate'>Hãy nhập số lượng </span>",
            number: "<span class='validate'>Bạn chỉ được nhập số</span>",
        },
        nguyengia: {
            number: "<span class='validate'>Bạn chỉ được nhập số</span>",
        },
        nguonkinhphi: {
            required: "<span class='validate'>Hãy chọn nguồn kinh phí </span>",
        },
        thoigiansudung: {
            required: "<span class='validate'>Hãy nhập thời gian sử dụng </span>",
            number: "<span class='validate'>Bạn chỉ được nhập số</span>",
        },
        ngaymua: {
            required: "<span class='validate'>Hãy nhập số lượng </span>",
        },
        namsudung: {
            required: "<span class='validate'>Hãy nhập năm sử dụng </span>",
            number: "<span class='validate'>Bạn chỉ được nhập số</span>",
        },
        tylehaomon: {
            required: "<span class='validate'>Hãy nhập tỷ lệ hao mòn </span>",
            number: "<span class='validate'>Bạn chỉ được nhập số</span>",
        },
        giatrihaomon: {
            required: "<span class='validate'>Hãy nhập giá trị hao mòn </span>",
            number: "<span class='validate'>Bạn chỉ được nhập số</span>",
        },
        haomonluyke: {
            required: "<span class='validate'>Hãy nhập giá trị hao mòn lũy kế </span>",
            number: "<span class='validate'>Bạn chỉ được nhập số</span>",
        },
        giatriconlai: {
            required: "<span class='validate'>Hãy nhập giá trị còn lại </span>",
            number: "<span class='validate'>Bạn chỉ được nhập số</span>",
        },
        ghichu: {
            minlength: "<span class='validate'>Ít nhất là 5 ký tự</span>",
        },
    }
});
// funtion danhmuctin validate edit_cat
function danhmuctin() {
        if ($("#edit_cat").length) {
            $.validator.addMethod("check_tendm", function(value, element) {
                var result = false;
                var id_cat = $("#id_cat_edit").val();
                var id_dm_cha = $("#id_dm_cha").val();
                $.ajax({
                    type: "POST",
                    async: false,
                    url: "/admin/admin_cat/check_tendm_edit",
                    data: {
                        namecat: value,
                        id_cat: id_cat,
                        id_dm_cha: id_dm_cha,
                    },
                    success: function(data) {
                        if (data == true) {
                            result = false;
                        } else {
                            result = true;
                        }
                    }
                });
                return result;
            }, "Tên danh mục đã tồn tại, Vui lòng nhập tên khác");
            $("#edit_cat").validate({
                rules: {
                    tendm: {
                        required: true,
                        minlength: 3,
                        maxlength: 36,
                        check_tendm: true,
                    },
                    madm: {
                        minlength: 1,
                        maxlength: 36,
                    },
                },
                highlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                },
                messages: {
                    tendm: {
                        required: "<span class='validate'>Hãy nhập tên danh mục của bạn !</span>",
                        minlength: "<span class='validate'>Ít nhất là 3 ký tự</span>",
                        maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
                        check_tendm: "<span class='validate'>Tên danh mục đã tồn tại</span>"
                    },
                    madm: {
                        minlength: "<span class='validate'>Ít nhất là 1 ký tự</span>",
                        maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
                    },
                }
            });
        }
    }
    // function danhmuccha()
function danhmuccha() {
        if ($("#edit_dmcha").length) {
            $.validator.addMethod("check_tendmcha", function(value, element) {
                var result = false;
                var id_cat = $("#id_dmcha_edit").val();
                $.ajax({
                    type: "POST",
                    async: false,
                    url: "/admin/admin_cat/check_tendmcha_edit",
                    data: {
                        namecat: value,
                        id_cat: id_cat,
                    },
                    success: function(data) {
                        if (data == true) {
                            result = false;
                        } else {
                            result = true;
                        }
                    }
                });
                return result;
            }, "Tên danh mục đã tồn tại, Vui lòng nhập tên khác");
            $("#edit_dmcha").validate({
                rules: {
                    tendm: {
                        required: true,
                        minlength: 3,
                        maxlength: 36,
                        check_tendmcha: true,
                    },
                    madm: {
                        minlength: 3,
                        maxlength: 36,
                    },
                },
                highlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                },
                messages: {
                    tendm: {
                        required: "<span class='validate'>Hãy nhập tên danh mục của bạn !</span>",
                        minlength: "<span class='validate'>Ít nhất là 3 ký tự</span>",
                        maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
                        check_tendmcha: "<span class='validate'>Tên danh mục đã tồn tại</span>"
                    },
                    madm: {
                        minlength: "<span class='validate'>Ít nhất là 3 ký tự</span>",
                        maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
                    },
                }
            });
        }
    }
    // validate index_introduce
$(document).ready(function() {
    $("#index_introduce").validate({
        ignore: [], // ckeditor
        debug: false,
        rules: {
            tieude: {
                required: true,
                minlength: 6,
            },
            chitiet: {
                required: function() {
                    CKEDITOR.instances.chitiet.updateElement();
                },
                minlength: 15,
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        messages: {
            tieude: {
                required: "<span class='validate'>Vui lòng nhập tiêu đề giới thiệu</span>",
                minlength: "<span class='validate'>Giới thiệu phải có ít nhất 6 ký tự</span>",
            },
            chitiet: {
                required: "<span class='validate'>Giới thiệu về bạn bạn</span>",
                minlength: "<span class='validate'>Bạn phải nhập ít nhất 15 ký tự</span>",
            }
        }
    });
});
// validate edit_produce
function edit_nuoc() {
        if ($("#edit_nuoc").length) {
            $("#edit_nuoc").validate({
                ignore: [],
                debug: false,
                rules: {
                    tennuoc: {
                        required: true,
                        minlength: 3,
                        maxlength: 36,

                    },
                    manuoc: {
                        minlength: 3,
                        maxlength: 36,
                    },
                },
                highlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                },
                messages: {
                    tennuoc: {
                        required: "<span class='validate'>Hãy nhập tên nước !</span>",
                        minlength: "<span class='validate'>Ít nhất là 3 ký tự</span>",
                        maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",

                    },
                    manuoc: {
                        minlength: "<span class='validate'>Ít nhất là 3 ký tự</span>",
                        maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
                    },
                }
            });
        }
        // body...
    }
    // validate form index_project
$(document).ready(function() {
    $("#themkinhphi").validate({
        ignore: [],
        debug: false,
        rules: {
            tong_tien: {
                required: true,
                number: true,
            },
            nguonkinhphi: {
                required: true,
            },
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        messages: {
            tong_tien: {
                required: "<span class='validate'>Hãy nhập tổng số tiền cần bổ sung!</span>",
                number: "<span class='validate'>Bạn chỉ được nhập số !</span>",
            },
            nguonkinhphi: {
                required: "<span class='validate'>Hãy chonj nguồn kinh phí cần bổ sung !</span>",
            },

        }
    });
});

function edit_user() {
        if ($("#edit_users").length) {
            $("#edit_users").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 8,
                        maxlength: 36,
                        checkUserName: true,
                    },
                    password: {
                        minlength: 8,
                        maxlength: 36
                    },
                    fullname: {
                        required: true,
                        minlength: 8,
                        maxlength: 36
                    },
                    hinhanh: {
                        required: true,
                        accept: "image/jpeg, image/pjpeg"
                    }
                },
                highlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
                    $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
                },
                messages: {
                    username: {
                        required: "<span class='validate'>Hãy nhập Tên Đăng Nhập của bạn !</span>",
                        minlength: "<span class='validate'>Ít nhất là 8 ký tự</span>",
                        maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
                        checkUserName: "<span class='validate'>Tên đăng nhập đã tồn tại</span>"
                    },
                    password: {
                        minlength: "<span class='validate'>Ít nhất là 8 ký tự</span>",
                        maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>"
                    },
                    fullname: {
                        required: "<span class='validate'>Hãy nhập Họ Tên của bạn !</span>",
                        minlength: "<span class='validate'>Ít nhất là 8 ký tự</span>",
                        maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>"
                    },
                    hinhanh: {
                        required: "<span class='validate'>Chọn một hình ảnh !</span>",
                    }
                }
            });
        }
        // body...
    }
    // method checkUsername
$(document).ready(function() {
    $.validator.addMethod("letters", function(value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z_0-9]+$/);
    }, "Letters and underscore only.");
    $.validator.addMethod("checkUserName", function(value, element) {
        var result = false;
        $.ajax({
            type: "POST",
            async: false,
            url: "/admin/admin_user/check_user",
            data: {
                username: value
            },
            success: function(data) {
                console.log(data)
                if (data == true) {
                    result = false;
                } else {
                    result = true;
                }
            }
        });
        return result;
    }, "Tên đăng nhập đã tồn tại, Vui lòng nhập tên khác");
    $("#index_users").validate({
        rules: {
            username: {
                required: true,
                minlength: 8,
                maxlength: 36,
                checkUserName: true,
                letters: true,
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 36
            },
            fullname: {
                required: true,
                minlength: 8,
                maxlength: 36
            },
            phone: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 11
            },
            chucvu: {
                required: true,
            },
            khoa: {
                required: true,
            },
            lop: {
                required: true,
            },
            hinhanh: {
                required: true,
                accept: "image/jpeg, image/pjpeg"
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        messages: {
            username: {
                required: "<span class='validate'>Hãy nhập Tên Đăng Nhập của bạn !</span>",
                minlength: "<span class='validate'>Ít nhất là 8 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
                checkUserName: "<span class='validate'>Tên đăng nhập đã tồn tại</span>",
                letters: "<span class='validate'>Tên đăng nhập chỉ được nhập ký tự, số và dấu gạch dưới</span>"
            },
            password: {
                required: "<span class='validate'>Hãy nhập Mật khẩu của bạn !</span>",
                minlength: "<span class='validate'>Ít nhất là 8 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>"
            },
            fullname: {
                required: "<span class='validate'>Hãy nhập Họ Tên của bạn !</span>",
                minlength: "<span class='validate'>Ít nhất là 8 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>"
            },
            phone: {
                required: "<span class='validate'>Hãy nhập số điện thoại !</span>",
                minlength: "<span class='validate'>Ít nhất 10 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 11 ký tự</span>",
                number: "<span class='validate'>Bạn chỉ được nhập số</span>",
            },
            chucvu: {
                required: "<span class='validate'>Hãy chọn chức vụ !</span>"
            },
            khoa: {
                required: "<span class='validate'>Hãy chọn khoa !</span>"
            },
            lop: {
                required: "<span class='validate'>Hãy chọn lớp của khoa !</span>"
            },
            hinhanh: {
                required: "<span class='validate'>Chọn một hình ảnh !</span>",
            }
        }
    });
});
$("#edit_users").validate({
        rules: {
           
            password: {
               
                minlength: 8,
                maxlength: 36
            },
            fullname: {
                required: true,
                minlength: 8,
                maxlength: 36
            },
            phone: {
                required: true,
                number: true,
                minlength: 10,
                maxlength: 11
            },
            chucvu: {
                required: true,
            },
            khoa: {
                required: true,
            },
            lop: {
                required: true,
            },
            hinhanh: {
                required: true,
                accept: "image/jpeg, image/pjpeg"
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },
        messages: {
           
            password: {
                
                minlength: "<span class='validate'>Ít nhất là 8 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>"
            },
            fullname: {
                required: "<span class='validate'>Hãy nhập Họ Tên của bạn !</span>",
                minlength: "<span class='validate'>Ít nhất là 8 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>"
            },
            phone: {
                required: "<span class='validate'>Hãy nhập số điện thoại !</span>",
                minlength: "<span class='validate'>Ít nhất 10 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 11 ký tự</span>",
                number: "<span class='validate'>Bạn chỉ được nhập số</span>",
            },
            chucvu: {
                required: "<span class='validate'>Hãy chọn chức vụ !</span>"
            },
            khoa: {
                required: "<span class='validate'>Hãy chọn khoa !</span>"
            },
            lop: {
                required: "<span class='validate'>Hãy chọn lớp của khoa !</span>"
            },
            hinhanh: {
                required: "<span class='validate'>Chọn một hình ảnh !</span>",
            }
        }
    });

function send_mail_once() {
    if ($("#send_mail_once").length) {
        $("#send_mail_once").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 5,
                    maxlength: 50
                },
                email: {
                    required: true,
                    email: true,
                    minlength: 5,
                    maxlength: 50
                },
                title: {
                    required: true,
                    minlength: 5,
                    maxlength: 50
                },
                message: {
                    required: true,
                    minlength: 20,
                },
            },
            messages: {
                name: {
                    required: "<span class='validate'>Hãy nhập tên người liên hệ !</span>",
                    minlength: "<span class='validate'>Ít nhất là 5 ký tự</span>",
                    maxlength: "<span class='validate'>Bạn đã nhập quá 50 ký tự</span>"
                },
                email: {
                    required: "<span class='validate'>Hãy nhập email !</span>",
                    minlength: "<span class='validate'>Ít nhất là 5 ký tự</span>",
                    maxlength: "<span class='validate'>Bạn đã nhập quá 50 ký tự</span>",
                    email: "<span class='validate'>Email phải đúng định dạng abc@abc.xyz</span>",
                },
                title: {
                    required: "<span class='validate'>Hãy nhập tiêu đề mail !</span>",
                    minlength: "<span class='validate'>Ít nhất là 5 ký tự</span>",
                    maxlength: "<span class='validate'>Bạn đã nhập quá 50 ký tự</span>"
                },
                message: {
                    required: "<span class='validate'>Hãy nhập nội dung !</span>",
                    minlength: "<span class='validate'>Ít nhất là 20 ký tự</span>",
                }
            }
        });
    }

}

function suanhacungcap() {
    if ($("#edit_ncc").length) {
        $("#edit_ncc").validate({
            rules: {
                tencongty: {
                    required: true,
                    minlength: 3,
                    maxlength: 36,
                },
                macongty: {
                    minlength: 3,
                    maxlength: 36,
                },
                diachi: {
                    required: true,
                    minlength: 3,
                    maxlength: 36,
                },
                sdt: {
                    required: true,
                    minlength: 10,
                    maxlength: 11,
                },
                email: {
                    required: true,
                    email: true
                },
            },
            highlight: function(element) {
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error')
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
            },
            unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
            },
            messages: {
                tencongty: {
                    required: "<span class='validate'>Hãy nhập tên nguồn kinh phí của bạn !</span>",
                    minlength: "<span class='validate'>Ít nhất là 3 ký tự</span>",
                    maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
                },
                macongty: {
                    minlength: "<span class='validate'>Ít nhất là 3 ký tự</span>",
                    maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
                },
                diachi: {
                    required: "<span class='validate'>Hãy nhập địa chỉ của bạn !</span>",
                    minlength: "<span class='validate'>Ít nhất là 3 ký tự</span>",
                    maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
                },
                sdt: {
                    required: "<span class='validate'>Hãy nhập SĐT của bạn !</span>",
                    minlength: "<span class='validate'>Ít nhất là 10 ký tự</span>",
                    maxlength: "<span class='validate'>Bạn đã nhập quá 11 ký tự</span>",
                },
                email: {
                    required: "<span class='validate'>Hãy nhập email của bạn !</span>",
                    email: "<span class='validate'> Email đúng định dạng abc@example.com!</span>",
                },
            }
        });
    }
}

function isImage(file) {
    file = file.split(".").pop();
    switch (file) {
        case "jpg":
        case "png":
        case "gif":
        case "bimap":
        case "jpeg":
        case "ico":
            return true;
        default:
            return false;
    }
    return false;
}

function convertToBase64(input) {
    if (input.files && input.files[0]) {
        if (isImage(input.files[0].name)) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(input).parent().find("img").attr("src", e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            input = $(input);
            input.replaceWith(input.val('').clone(true));
            input.parent().find(".removefile").hide();
            alert("vui lòng chọn 1 hình ảnh");
        }
    }
}
$(document).ready(function() {
    $('.uploadimg .removefile').click(function() {
        var file = $(this).parent().find("input[type='file']");
        file.replaceWith(file.val('').clone(true));
        $(this).parent().find("img").attr("src", $(this).parent().find("img").attr("data-img"));
        $(this).hide();
        return false;
    });
    $(".uploadimg input[type='file']").on("change", function(event) {
        event.preventDefault();
        console.log(123);
        if (this.files) {
            convertToBase64(this);
            $(this).parent().find(".removefile").show();
        }
    });
});

function test(x) {
        if (x.files) {
            convertToBase64(x);
            $(x).parent().find(".removefile").show();
        }
    }
    // edit project
$(document).ready(function() {
    edit_nuoc();
    $('.edit_nuoc').click(function() {
        var id = $(this).closest("tr").data("id");
        $.ajax({
            url: '/admin/admin_nuoc/edit',
            method: 'POST',
            data: {
                id: id
            },
            success: function(data) {
                $('#edit').html(data);
                edit_nuoc();
            }
        });
    })
})

$(document).ready(function() {
    danhmuctin();
    $('.edit_cat').click(function() {
        var id = $(this).closest("tr").data("id");
        var id_dm_cha = $("#id_dm_cha").val();
        $.ajax({
            url: '/admin/admin_cat/edit_cat',
            method: 'POST',
            data: {
                id: id,
                id_dm_cha: id_dm_cha
            },
            success: function(data) {
                $('#edit').html(data);
                danhmuctin();
            }
        });
    })
})
$(document).ready(function() {
        danhmuccha();
        $('.edit_dmcha').click(function() {
            var id = $(this).closest("tr").data("id");
            $.ajax({
                url: '/admin/admin_cat/edit_dmcha',
                method: 'POST',
                data: {
                    id: id,
                },
                success: function(data) {
                    $('#edit').html(data);
                    danhmuccha();
                }
            });
        })
    })
    //edit adv
$(document).ready(function() {
        suanhacungcap()
        $('.edit_ncc').click(function() {
            var id = $(this).closest("tr").data("id");
            $.ajax({
                url: '/admin/admin_ncc/edit',
                method: 'POST',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#edit').html(data);
                    suanhacungcap();
                }
            });
        })
    })
    //edit slide
$(document).ready(function() {
    $('.edit_lop').click(function() {
        var id = $(this).closest("tr").data("id");
        $.ajax({
            url: '/admin/admin_khoa/edit',
            method: 'POST',
            data: {
                id: id
            },
            success: function(data) {
                $('#edit').html(data);
            }
        });
    })
})
$(document).ready(function() {
        $('.show_danhgia').click(function() {
            var id = $(this).closest("tr").data("id");
            $.ajax({
                url: '/admin/admin_assets/showdanhgia',
                method: 'POST',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#edit').html(data);
                }
            });
        })
    })
    //edit_user
$(document).ready(function() {
        $('.edit_users').click(function() {
            var id = $(this).closest("tr").data("id");
            $.ajax({
                url: '/admin/admin_user/edit',
                method: 'POST',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#edit').html(data);
                    edit_user()
                }
            });
        });
         $('.xem_users').click(function() {
            var id = $(this).closest("tr").data("id");
            $.ajax({
                url: '/admin/admin_user/xem',
                method: 'POST',
                data: {
                    id: id
                },
                success: function(data) {
                    $('#edit').html(data);
                    edit_user()
                }
            });
        })
    })
    //edit user
    //edit profile
$(document).ready(function() {
    edit_profile_user()
    $('.edit_profile').click(function() {
        var id = $("#id_user").val();
        $.ajax({
            url: '/admin/admin_user/edit_profile',
            method: 'POST',
            data: {
                id: id
            },
            success: function(data) {
                $('#edit').html(data);
                edit_profile_user()
                    // CKEDITOR.replace("skill");
                    // CKEDITOR.replace("ability");
                    // CKEDITOR.replace("target");
            }
        });
    })
})

function get(id) {
    var is_active = $("#news_" + id).val();
    $.ajax({
        url: '/admin/admin_news/is_active',
        method: 'POST',
        data: {
            id: id,
            is_active: is_active
        },
        success: function(data) {
            //   document.getElementById("#news_"+id).innerHTML = data;
            $("#news_" + id).val(data);
        }
    });
}

function active_users(id) {
    var is_active = $("#user_" + id).val();
    $.post("/admin/admin_user/active", {
        id: id,
        is_active: is_active
    }, function(data) {
        $("#user_" + id).val(data);
    });
}

function active_assets(id) {
    var is_active = $("#assets_" + id).val();
    $.post("/admin/admin_assets/active", {
        id: id,
        is_active: is_active
    }, function(data) {
        $("#assets_" + id).val(data);
    });
}
$('#check_all_email').click(function(e) {
    var table = $(e.target).closest('table');
    $('td input[id="check_email[]"]', table).prop('checked', this.checked);
});
$(document).ready(function() {
    $('#delAll').click(function(e) {
        var table = $(e.target).closest('table');
        $('td input[name="del_news[]"]', table).prop('checked', this.checked);
    });
})
$(document).ready(function() {
    $('#check-all_assets').click(function(e) {
        var table = $(e.target).closest('table');
        $('td input[type="checkbox"]', table).prop('checked', this.checked);
    });
})
$(document).ready(function() {
    $('#send_mail_all').click(function() {
        var name_mail = $("input[id='check_email[]']:checked").map(function() {
            return this.value;
        }).toArray();
        $("#email").val(name_mail);
    })
})
$(document).ready(function() {
    $('#del_mail_all').click(function() {
        var name_mail = $("input[id='check_email[]']:checked").map(function() {
            return this.value;
        }).toArray();
        $.ajax({
            url: '/admin/admin_contact/del_all',
            method: 'POST',
            data: {
                name_mail: name_mail
            },
            success: function(data) {
                window.location.reload();
            }
        });
    })
})
$(document).ready(function() {
    $("#send_email_all").validate({
        rules: {
            email: {
                required: true,
            },
            title: {
                required: true,
                minlength: 5,
                maxlength: 50
            },
            message: {
                required: true,
                minlength: 20,
            },
        },
        messages: {
            email: {
                required: "<span class='validate'>Hãy nhập email !</span>",
            },
            title: {
                required: "<span class='validate'>Hãy nhập tiêu đề mail !</span>",
                minlength: "<span class='validate'>Ít nhất là 5 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 50 ký tự</span>"
            },
            message: {
                required: "<span class='validate'>Hãy nhập nội dung !</span>",
                minlength: "<span class='validate'>Ít nhất là 20 ký tự</span>",
            }
        }
    });
});

function edit_profile_user() {
    if ($("#edit_profile_user").lenght) {
        $("#edit_profile_user").validate({
            ignore: [],
            debug: false,
            rules: {
                fullname: {
                    required: true,
                    minlength: 5,
                },
                password: {
                    minlength: 8,
                },
                address: {
                    required: true,
                },
                workplace: {
                    required: true,
                },
            },
            messages: {
                fullname: {
                    required: "<span class='validate'>Hãy nhập tên tài sản</span>",
                    minlength: "<span class='validate'>Ít nhất là 5 ký tự</span>",
                },
                password: {
                    minlength: "<span class='validate'>Ít nhất là 8 ký tự</span>",
                },
                address: {
                    required: "<span class='validate'>Hãy nhập mô tả</span>",
                },
                workplace: {
                    required: "<span class='validate'>Hãy nhập địa chỉ làm việc</span>",
                },
            }
        });
    }
}

function idloaitaisan() {
    // body...
    var idloaitaisan = $('#loaitaisan').val();
    $.ajax({
        url: '/admin/admin_assets/get_idloaidanhmuc',
        type: 'POST',
        cache: false,
        data: {
            idloaitaisan: idloaitaisan
        },
        success: function(data) {
            $('#muctaisan').html(data);
            console.log(data);
        },
        error: function() {
            alert('Đã có lỗi xảy ra');
        }
    });
    return false;
}

function idkhoa() {
    // body...
    var idkhoa = $('#khoa').val();
    $.ajax({
        url: '/admin/admin_assets/get_idkhoa',
        type: 'POST',
        cache: false,
        data: {
            idkhoa: idkhoa
        },
        success: function(data) {
            $('#lop').html(data);
            console.log(data);
        },
        error: function() {
            alert('Đã có lỗi xảy ra');
        }
    });
    return false;
}

function idkhoa_user() {
    // body...
    var idkhoa = $('#khoa_user').val();
    $.ajax({
        url: '/admin/admin_assets/get_idkhoa',
        type: 'POST',
        cache: false,
        data: {
            idkhoa: idkhoa
        },
        success: function(data) {
            $('#lop_user').html(data);
            console.log(data);
        },
        error: function() {
            alert('Đã có lỗi xảy ra');
        }
    });
    return false;
}

function check_kinhphi(id) {
    $.post("/admin/admin_kinhphi/check_kinhphi", {
        id: id
    })
}

function xoa_user($id) {
    var r = confirm("Bạn chắc chắn muốn xóa");
    if (r == true) {
        window.location.href = '/admin/admin_user/del/' + $id;
    }
}

function xoa_danhmuc($id) {
    var r = confirm("Bạn chắc chắn muốn xóa");
    if (r == true) {
        window.location.href = '/admin/admin_kinhphi/del/' + $id;
    }
}

function edit_kinhphi(id) {
    $.ajax({
        url: '/admin/admin_kinhphi/edit',
        method: 'POST',
        data: {
            id: id
        },
        success: function(data) {
            $('#edit').html(data);
        }
    });

}

function xoa_danhmuc($id) {
    var r = confirm("Bạn chắc chắn muốn xóa");
    if (r == true) {
        window.location.href = '/admin/admin_cat/del_dmcha/' + $id;
    }

}

function huy_kinhphi(id) {
    $.post("/admin/admin_kinhphi/huy_kinhphi", {
        id: id
    })
}

function read_mail(id) {
    $.post("/admin/admin_contact/check_read", {
        id: id
    })
}



function reply(id) {
    $.ajax({
        url: '/admin/admin_contact/reply',
        type: 'POST',
        cache: false,
        data: {
            id: id
        },
        success: function(data) {
            $('#reply_mail').html(data);
            console.log(data);
        },
        error: function() {
            alert('Đã có lỗi xảy ra');
        }
    });
    return false;
}
$(document).ready(function() {
    $('.ngay').daterangepicker({
        date: {
            format: 'DD-MM-YYYY'
        },
        singleDatePicker: true,
        calender_style: "picker_1"
    }, function(start, end, label) {
        console.log(start.toISOString(), end.toISOString(), label);
    });
});

$(document).ready(function() {
    $('#example').DataTable( {
      "lengthMenu": [
        [10, 15, 20, -1],
        [10, 15, 20, "All"]
    ],
    "ordering": false,
    "language": {
        "lengthMenu": "Show _MENU_ ",
        "zeroRecords": "Không tìm thấy kết quả",
        "info": "Hiển thị _PAGE_ của _PAGES_ trang",
        "infoEmpty": "Trống",
        "infoFiltered": "(tìm kiếm từ  _MAX_ dòng)"
    },
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value="">All</option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
     $('#thongke').DataTable( {
      "lengthMenu": [
        [10, 15, 20, -1],
        [10, 15, 20, "All"]
    ],
    "ordering": false,
    "language": {
        "lengthMenu": "Show _MENU_ ",
        "zeroRecords": "Không tìm thấy kết quả",
        "info": "Hiển thị _PAGE_ của _PAGES_ trang",
        "infoEmpty": "Trống",
        "infoFiltered": "(tìm kiếm từ  _MAX_ dòng)"
    },
    dom: "lBfrtip",
    buttons: [{
        extend: "copy",
        className: "btn-sm"
    },
     {
        extend: "excel",
        className: "btn-sm",
        text: 'Save to Excel',
        exportOptions: {
            modifier: {
                page: 'current'
            }
        },
        customize: function (xlsx) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];
                var numrows = 2;
                var clR = $('row', sheet);

                //update Row
                clR.each(function () {
                    var attr = $(this).attr('r');
                    var ind = parseInt(attr);
                    ind = ind + numrows;
                    $(this).attr("r",ind);
                });

                // Create row before data
                $('row c ', sheet).each(function () {
                    var attr = $(this).attr('r');
                    var pre = attr.substring(0, 1);
                    var ind = parseInt(attr.substring(1, attr.length));
                    ind = ind + numrows;
                    $(this).attr("r", pre + ind);
                });

                function Addrow(index,data) {
                    msg='<row r="'+index+'">'
                    for(i=0;i<data.length;i++){
                        var key=data[i].key;
                        var value=data[i].value;
                        msg += '<c t="inlineStr" r="' + key + index + '">';
                        msg += '<is>';
                        msg +=  '<t>'+value+'</t>';
                        msg+=  '</is>';
                        msg+='</c>';
                    }
                    msg += '</row>';
                    return msg;
                }

                //insert
                var r1 = Addrow(1, [{ key: 'A', value: 'Trường Đại Học Quảng Nam' }, { key: 'B', value: ' Cộng hòa xã hội chủ nghĩa Việt Nam' }]);
                var r2 = Addrow(2, [{ key: 'A', value: 'QuangNam University' }, { key: 'B', value: ' Độc lập - Tụ do - Hạnh phúc' }]);
                var r3 = Addrow(3, [{ key: 'A', value: 'ssssss' }, { key: 'B', value: 'ssssssss' }]);

                sheet.childNodes[0].childNodes[1].innerHTML = r1 + r2+ r3+ sheet.childNodes[0].childNodes[1].innerHTML;
            },
    },
    {
        extend: "excel",
        className: "btn-sm",
        text: 'Save All to Excel',
    },  ],
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value="">All</option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
  $('#cat_table').dataTable({
    "lengthMenu": [
        [10, 15, 20, -1],
        [10, 15, 20, "All"]
    ],
    "ordering": false,
    "language": {
        "lengthMenu": "Show _MENU_ ",
        "zeroRecords": "Không tìm thấy kết quả",
        "info": "Hiển thị _PAGE_ của _PAGES_ trang",
        "infoEmpty": "Trống",
        "infoFiltered": "(tìm kiếm từ  _MAX_ dòng)"
    },
    dom: "lBfrtip",
    buttons: [{
        extend: "copy",
        className: "btn-sm"
    }, {
        extend: "excel",
        className: "btn-sm",
        text: 'Save to Excel',
        exportOptions: {
            modifier: {
                page: 'current'
            }
        }
    }, {
        extend: "excel",
        className: "btn-sm",
        text: 'Save All to Excel',
    },  ],
    //responsive: true,
});
$('#index_cat_table').dataTable({
    
});
$('#index_danhgia').dataTable({
    "lengthMenu": [
        [10, 15, 20, -1],
        [10, 15, 20, "All"]
    ],
    "ordering": false,
    "language": {
        "lengthMenu": "Show _MENU_ ",
        "zeroRecords": "Không tìm thấy kết quả",
        "info": "Hiển thị _PAGE_ của _PAGES_ trang",
        "infoEmpty": "Trống",
        "infoFiltered": "(tìm kiếm từ  _MAX_ dòng)"
    },
});

$(document).ready(function() {
    $('#index_translate').DataTable({
        "lengthMenu": [
            [10, 15, 20, -1],
            [10, 15, 20, "All"]
        ],
        "ordering": false,
        "language": {
            "lengthMenu": "Show _MENU_ ",
            "zeroRecords": "Không tìm thấy kết quả",
            "info": "Hiển thị _PAGE_ của _PAGES_ trang",
            "infoEmpty": "Trống",
            "infoFiltered": "(tìm kiếm từ  _MAX_ dòng)"
        },
        initComplete: function() {
            this.api().columns([3, 4]).every(function() {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        }
    });
});
$('#user_table').dataTable({
    "lengthMenu": [
        [5, 10, 15, -1],
        [5, 10, 15, "All"]
    ],

    "ordering": false,
    "language": {
        "lengthMenu": "Show _MENU_ ",
        "zeroRecords": "Không tìm thấy kết quả",
        "info": "Hiển thị _PAGE_ của _PAGES_ trang",
        "infoEmpty": "Trống",
        "infoFiltered": "(tìm kiếm từ  _MAX_ dòng)"
    },
});

$('#check_all_cat').click(function(e) {
    var table = $(e.target).closest('table');
    $('td input[id="check_cat"]', table).prop('checked', this.checked);
});
$('#check_all_assets').click(function(e) {
    var table = $(e.target).closest('table');
    $('td input[name="assets[]"]', table).prop('checked', this.checked);
});
$('#translate_ts').click(function(e) {
    var table = $(e.target).closest('table');
    $('td input[name="chuyentaisan[]"]', table).prop('checked', this.checked);
});
$('#thanhly_ts').click(function(e) {
    var table = $(e.target).closest('table');
    $('td input[name="thanhly[]"]', table).prop('checked', this.checked);
});
// end datetimpiker and dataTable 
//  // autoNumbernic
$(".gia").autoNumeric('init', {
    aSep: '.',
    aDec: ',',
    aForm: true,
    vMax: '99999999999',
    vMin: '-99999999999'
});
// end autonumber

$('#search').keydown(function(e) {
    if (e.keyCode == 13) {
      var searchtext =$("#search").val()
      if (searchtext=="") {
        alert("Bạn chưa nhập từ khóa");
      }else{
        
        $(this).closest('form').submit();
      }
    }
});

$('#chuyents').click(function() {
    var id = [],
    name = [];
    $('#taisandieuchuyen:checked').each(function(i) {
      id[i] = $(this).closest("tr").data("id");
      name[i] = $(this).closest("tr").data("name");
    });
    $("#tentaisan").val(name);
    $("#id_dieuchuyen").val(id);
    $('#tentaisan').tagsInput({
      width: 'auto'
    });

    
  });
  $('#thanhlyts').click(function() {
    var id = [],
    name = [];
    $('#thanhly:checked').each(function(i) {
      id[i] = $(this).closest("tr").data("id");
      name[i] = $(this).closest("tr").data("name");
    });
    $("#tentaisan").val(name);
    $("#id_dieuchuyen").val(id);
    $('#tentaisan').tagsInput({
      width: 'auto'
    });
     

    });

  $(document).ready(function() {
    $('.danhgiatong').rating({
    displayOnly: true,
  });
  $('.danhgia').rating();
    var check;
    $(".checkboxassets").on("click", function() {
      check = $(".checkboxassets").is(":checked");
      if (check) {
        $("#del_assets ").removeAttr('style');
         $("#andi").css("display", "none")
      } else {
        $("#del_assets").css("display", "none");
        $("#andi ").removeAttr('style');
      }
    });
    var check1;
    $(".chuyentaisan").on("click", function() {
      check1 = $(".chuyentaisan").is(":checked");
      if (check1) {
        $("#chuyents ").removeAttr('style');
         $("#andi").css("display", "none")
      } else {
        $("#chuyents").css("display", "none");
        $("#andi ").removeAttr('style');
      }
    });
    var check2;
    $(".thanhly").on("click", function() {
      check2 = $(".thanhly").is(":checked");
      if (check2) {
        $("#thanhlyts ").removeAttr('style');$("#andi").css("display", "none")
      } else {
        $("#thanhlyts").css("display", "none"); $("#andi ").removeAttr('style');
      }
    });
    $(document).on('click', '.paginate_button', function() {
      var check;
      $(".checkboxassets").on("click", function() {
        check = $(".checkboxassets").is(":checked");
        if (check) {
          $("#del_assets ").removeAttr('style');$("#andi").css("display", "none");
        } else {
          $("#del_assets").css("display", "none"); $("#andi ").removeAttr('style');;
        }
      });
      var check1;
      $(".chuyentaisan").on("click", function() {
        check1 = $(".chuyentaisan").is(":checked");
        if (check1) {
          $("#chuyents ").removeAttr('style');$("#andi").css("display", "none")
        } else {
          $("#chuyents").css("display", "none"); $("#andi ").removeAttr('style');
        }
      });
      $('.danhgiatong').rating({
        displayOnly: true,
      });
      $('.danhgia').rating();

    });
    $(document).on('click', '.input-sm', function() {
      var check;
      $(".checkboxassets").on("click", function() {
        check = $(".checkboxassets").is(":checked");
        if (check) {
          $("#del_assets ").removeAttr('style')
        } else {
          $("#del_assets").css("display", "none")
        }
      });
      var check1;
      $(".chuyentaisan").on("click", function() {
        check1 = $(".chuyentaisan").is(":checked");
        if (check1) {
          $("#chuyents ").removeAttr('style')
        } else {
          $("#chuyents").css("display", "none")
        }
      });
      $('.danhgiatong').rating({
        displayOnly: true,
      });
      $('.danhgia').rating();
    });

  });
  


  setTimeout(function() {
    $("#message").fadeOut(300);
  }, 5000)
  $('#compose, .compose-close').click(function() {
    $('.compose').slideToggle();
  });
  $('#reply, .reply-close').click(function() {
    $('.compose').slideToggle();
  });

  $(".select2_single").select2({
    placeholder: "Vui lòng chọn",
    allowClear: true
  });
  $(".select2_single").select2().change(function() {
    $(this).valid();
  });
  // $(".select2_multiple").select2({
  //   maximumSelectionLength: 4,
  //   placeholder: "With Max Selection limit 4",
  //   allowClear: true
  // });


  $("#index_assets > div:nth-child(2) > div > span").removeAttr('style').css("width", "100%");
  $("#index_assets > div:nth-child(3) > div > span").removeAttr('style').css("width", "100%");
  $("#index_assets > div:nth-child(5) > div:nth-child(1) > div > span").removeAttr('style').css("width", "100%");
  $("#index_assets > div:nth-child(5) > div:nth-child(2) > div > span").removeAttr('style').css("width", "100%");
  $("#index_assets > div:nth-child(6) > div:nth-child(1) > div > span").removeAttr('style').css("width", "100%");
  $("#index_assets > div:nth-child(6) > div:nth-child(2) > div > span").removeAttr('style').css("width", "100%");
  $("#index_assets > div:nth-child(9) > div:nth-child(1) > div > span").removeAttr('style').css("width", "100%");
  $("#index_assets > div:nth-child(7) > div:nth-child(1) > div > span").removeAttr('style').css("width", "100%");
  $("#index_assets > div:nth-child(9) > div:nth-child(2) > div > span").removeAttr('style').css("width", "100%");
  $("#index_assets > div:nth-child(10) > div:nth-child(2) > div > span").removeAttr('style').css("width", "100%");
  $("#index_assets > div:nth-child(11) > div:nth-child(2) > div > span").removeAttr('style').css("width", "100%");
  $("#index_assets > div:nth-child(9) > div:nth-child(2) > span").removeAttr('style').css("width", "100%");
  $("#index_users > div:nth-child(6) > div > span").removeAttr('style').css("width", "100%");
  $("#index_users > div:nth-child(7) > div > span").removeAttr('style').css("width", "100%");
  $("#index_users > div:nth-child(8) > div > span").removeAttr('style').css("width", "100%");
  $("#tab_content2 > form > div:nth-child(2) > div > span").removeAttr('style').css("width", "100%");
  $("#dieuchuyentaisannhieu > div:nth-child(2) > div > span").removeAttr('style').css("width", "100%");
  $("#dieuchuyentaisannhieu > div:nth-child(3) > div > span").removeAttr('style').css("width", "100%");


  $(document).ready(function() {
    function initToolbarBootstrapBindings() {
      var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
      'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
      'Times New Roman', 'Verdana'
      ],
      fontTarget = $('[title=Font]').siblings('.dropdown-menu');
      $.each(fonts, function(idx, fontName) {
        fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
      });
      $('a[title]').tooltip({
        container: 'body'
      });
      $('.dropdown-menu input').click(function() {
        return false;
      })
      .change(function() {
        $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
      })
      .keydown('esc', function() {
        this.value = '';
        $(this).change();
      });

      $('[data-role=magic-overlay]').each(function() {
        var overlay = $(this),
        target = $(overlay.data('target'));
        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
      });

      if ("onwebkitspeechchange" in document.createElement("input")) {
        var editorOffset = $('#editor').offset();

        $('.voiceBtn').css('position', 'absolute').offset({
          top: editorOffset.top,
          left: editorOffset.left + $('#editor').innerWidth() - 35
        });
      } else {
        $('.voiceBtn').hide();
      }
    }

    function showErrorAlert(reason, detail) {
      var msg = '';
      if (reason === 'unsupported-file-type') {
        msg = "Unsupported format " + detail;
      } else {
        console.log("error uploading file", reason, detail);
      }
      $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
        '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
    }

    initToolbarBootstrapBindings();

    $('#editor').wysiwyg({
      fileUploadError: showErrorAlert
    });

    prettyPrint();
  });
  function message() {
   var message = $("#editor").html()
   $("#noidungmail").val(message)
 }

  $(document).on('ready', function(){
    $('.kv-ltr-theme-svg-star').rating({
      hoverOnClear: false,
      theme: 'krajee-svg'
    });
  });
function update() {
      $('#clock').html(moment().format('DD/MM/YYYY. H:mm:ss'));
    }
    setInterval(update, 1000);
    $('#clock').removeAttr("style");
    $('#clock').css("font-size","16px");
    function showchucvu() {
    // body...
    var idchucvu = $('#chucvu').val();
    if (idchucvu==3) {
      $('#khoa').removeAttr("style");
      $('#lop').css("display","none");
    }else if (idchucvu==4) {
      $('#khoa').removeAttr("style");
      $('#lop').removeAttr("style");
    }else {
      $('#khoa').css("display","none");
      $('#lop').css("display","none");
    }

  }
  if ($("#anHT").val()==1) {
    $("#chucvu").find("#chucvu_1").attr("disabled", true);
  }

   $('#del_assets').click(function() {
    var id = [];
    $('#xoa:checked').each(function(i) {
      id[i] = $(this).val();
    });
    $.post("/admin/admin_assets/xoanhieu", {id: id})
  });