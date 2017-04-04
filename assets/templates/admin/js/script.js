// validate form cat
$(document).ready(function() {
    $.validator.addMethod("check_tendm", function(value, element) {
        var result = false;
        $.ajax({
            type: "POST",
            async: false,
            url: "/admin/admin_cat/check_tendm", // script to validate in server side
            data: {
                namecat: value
            },
            success: function(data) {
                console.log(data);
                //result = (data===true)?true:false;
                if (data == true) {
                    result = false;
                } else {
                    result = true;
                }
            }
        });
        // return true if username is exist in database
        return result;
    }, "Danh mục");
    // validete form index_cat
    $("#index_cat").validate({
        rules: {
            tendm: {
                required: true,
                minlength: 1,
                maxlength: 36,
                check_tendm: true,
            }
        },
        messages: {
            tendm: {
                required: "<span class='validate'>Hãy nhập danh mục của bạn !</span>",
                minlength: "<span class='validate'>Ít nhất là 1 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
                check_tendm: "<span class='validate'>Tên danh mục đã tồn tại</span>"
            }
        }
    });
});
// funtion danhmuctin validate edit_cat
function danhmuctin() {
        if ($("#edit_cat").length) {
            $.validator.addMethod("check_tendm", function(value, element) {
                var result = false;
                $.ajax({
                    type: "POST",
                    async: false,
                    url: "/admin/admin_cat/check_tendm", // script to validate in server side
                    data: {
                        namecat: value
                    },
                    success: function(data) {
                        console.log(data);
                        //result = (data===true)?true:false;
                        if (data == true) {
                            result = false;
                        } else {
                            result = true;
                        }
                    }
                });
                // return true if username is exist in database
                return result;
            }, "Tên danh mục đã tồn tại, Vui lòng nhập tên khác");
            $("#edit_cat").validate({
                rules: {
                    tendm: {
                        required: true,
                        minlength: 1,
                        maxlength: 36,
                        check_tendm: true,
                    },
                },
                messages: {
                    tendm: {
                        required: "<span class='validate'>Hãy nhập tên danh mục của bạn !</span>",
                        minlength: "<span class='validate'>Ít nhất là 1 ký tự</span>",
                        maxlength: "<span class='validate'>Bạn đã nhập quá 36 ký tự</span>",
                        check_tendm: "<span class='validate'>Tên danh mục đã tồn tại</span>"
                    },
                }
            });
        }
    }
    // validate form produce
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
function edit_project() {
        if ($("#edit_project").length) {
            $("#edit_project").validate({
                ignore: [],
                debug: false,
                rules: {
                    ten: {
                        required: true,
                    },
                    link: {
                        required: true,
                    },
                    mota: {
                        required: function() {
                            CKEDITOR.instances.mota.updateElement();
                        },
                        minlength: 20,
                    },
                },
                messages: {
                    ten: {
                        required: "<span class='validate'>Hãy nhập tên dự án !</span>",
                    },
                    link: {
                        required: "<span class='validate'>Hãy nhập link liên kết !</span>",
                    },
                    mota: {
                        required: "<span class='validate'>Hãy nhập mô tả tin tức !</span>",
                        minlength: "<span class='validate'>Ít nhất là 20 ký tự</span>",
                    },
                }
            });
        }
        // body...
    }
    // validate form index_project
$(document).ready(function() {
    $("#index_project").validate({
        ignore: [],
        debug: false,
        rules: {
            ten: {
                required: true,
            },
            link: {
                required: true,
            },
            hinhanh: {
                required: true,
                minlength: 5,
            },
            mota: {
                required: function() {
                    CKEDITOR.instances.mota.updateElement();
                },
                minlength: 20,
            },
        },
        messages: {
            ten: {
                required: "<span class='validate'>Hãy nhập tên dự án !</span>",
            },
            link: {
                required: "<span class='validate'>Hãy nhập link liên kết !</span>",
            },
             hinhanh: {
                required: "<span class='validate'>Hãy chọn một ảnh !</span>",
            },
            mota: {
                required: "<span class='validate'>Hãy nhập mô tả tin tức !</span>",
                minlength: "<span class='validate'>Ít nhất là 20 ký tự</span>",
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
            url: "/admin/admin_user/check_user", // script to validate in server side
            data: {
                username: value
            },
            success: function(data) {
                // console.log(data);
                //result = (data===true)?true:false;
                if (data == true) {
                    result = false;
                } else {
                    result = true;
                }
            }
        });
        // return true if username is exist in database
        return result;
    }, "Tên đăng nhập đã tồn tại, Vui lòng nhập tên khác");
    // validete form index_user
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
            hinhanh: {
                required: true,
                accept: "image/jpeg, image/pjpeg"
            }
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
            hinhanh: {
                required: "<span class='validate'>Chọn một hình ảnh !</span>",
            }
        }
    });
});

function caunoihay() {
        $("#edit_say").validate({
            rules: {
                author: {
                    required: true,
                    minlength: 5,
                    maxlength: 50
                },
                content: {
                    required: function() {
                        CKEDITOR.instances.content.updateElement();
                    },
                    minlength: 20,
                },
            },
            messages: {
                author: {
                    required: "<span class='validate'>Hãy nhập tên tác giả !</span>",
                    minlength: "<span class='validate'>Ít nhất là 5 ký tự</span>",
                    maxlength: "<span class='validate'>Bạn đã nhập quá 50 ký tự</span>"
                },
                content: {
                    required: "<span class='validate'>Hãy nhập nội dung !</span>",
                    minlength: "<span class='validate'>Ít nhất là 20 ký tự</span>",
                }
            }
        });
    }
    // validate form index_say
$(document).ready(function() {
    $("#index_say").validate({
        rules: {
            author: {
                required: true,
                minlength: 5,
                maxlength: 50
            },
            content: {
                required: function() {
                    CKEDITOR.instances.content.updateElement();
                },
                minlength: 20,
            },
        },
        messages: {
            author: {
                required: "<span class='validate'>Hãy nhập tên tác giả !</span>",
                minlength: "<span class='validate'>Ít nhất là 5 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 50 ký tự</span>"
            },
            content: {
                required: "<span class='validate'>Hãy nhập nội dung !</span>",
                minlength: "<span class='validate'>Ít nhất là 20 ký tự</span>",
            }
        }
    });
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
                        email:true,
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
        // body...
    }

// validate form index_adv
$(document).ready(function() {
    $("#index_adv").validate({
        rules: {
            ten: {
                required: true,
                minlength: 5,
                maxlength: 50
            },
            link: {
                required: true,
                url:true
            },
            hinhanh: {
                required: true,
            },
        },
        messages: {
            ten: {
                required: "<span class='validate'>Hãy nhập tên ảnh !</span>",
                minlength: "<span class='validate'>Ít nhất là 5 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 50 ký tự</span>"
            },
            link: {
                required: "<span class='validate'>Hãy nhập link quảng cáo !</span>",
                url: "<span class='validate'>Url bắt đầu bằng http://</span>",
            },
            hinhanh: {
                required: "<span class='validate'>Hãy nhập link quảng cáo !</span>",
            }
        }
    });
});
function suaquangcao() {
   if ($("#edit_adv").length){
    $("#edit_adv").validate({
        rules: {
            ten: {
                required: true,
                minlength: 5,
                maxlength: 50
            },
            link: {
                required: true,
                url:true
            },
            hinhanh: {
                required: true,
            },
        },
        messages: {
            ten: {
                required: "<span class='validate'>Hãy nhập tên ảnh !</span>",
                minlength: "<span class='validate'>Ít nhất là 5 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 50 ký tự</span>"
            },
            link: {
                required: "<span class='validate'>Hãy nhập link quảng cáo !</span>",
                url: "<span class='validate'>Url bắt đầu bằng http://</span>",
            },
            hinhanh: {
                required: "<span class='validate'>Hãy nhập link quảng cáo !</span>",
            }
        }
        });
    }
}
// validate from index_slide
$(document).ready(function() {
    $("#index_slide").validate({
        rules: {
            ten: {
                required: true,
                minlength: 5,
                maxlength: 50
            }
        },
        messages: {
            ten: {
                required: "<span class='validate'>Hãy nhập tên ảnh !</span>",
                minlength: "<span class='validate'>Ít nhất là 5 ký tự</span>",
                maxlength: "<span class='validate'>Bạn đã nhập quá 50 ký tự</span>"
            }
        }
    });
});
$(document).ready(function() {
    $("#index_news").validate({
        ignore:[],
        debug:false,
        rules: {
            tentin: {
                required: true,
                minlength: 5,

            },
            danhmuctin: {
                required: true,
            },
            mota: {
                required: true,
            },
            mota: {
                required: true,
            },
            chitiet: {
                required: function() {
                    CKEDITOR.instances.chitiet.updateElement();
                },
                minlength: 20,
            },
        },
        messages: {
            tentin: {
                required: "<span class='validate'>Hãy nhập tên tin</span>",
                minlength: "<span class='validate'>Ít nhất là 5 ký tự</span>",

            },
            danhmuctin: {
                required: "<span class='validate'>Hãy chọn tên danh mục</span>",
            },
            mota: {
                required: "<span class='validate'>Hãy nhập mô tả</span>",
            },
            chitiet: {
                required: "<span class='validate'>Hãy nhập chi tiết tin</span>",
            },
        }
    });
});
function edit_news() {
    if($("#edit_news").lenght){
        $("#edit_news").validate({
        ignore:[],
        debug:false,
        rules: {
            tentin: {
                required: true,
                minlength: 5,

            },
            danhmuctin: {
                required: true,
            },
            mota: {
                required: true,
            },
            mota: {
                required: true,
            },
            chitiet: {
                required: function() {
                    CKEDITOR.instances.chitiet.updateElement();
                },
                minlength: 20,
            },
        },
        messages: {
            tentin: {
                required: "<span class='validate'>Hãy nhập tên tin</span>",
                minlength: "<span class='validate'>Ít nhất là 5 ký tự</span>",

            },
            danhmuctin: {
                required: "<span class='validate'>Hãy chọn tên danh mục</span>",
            },
            mota: {
                required: "<span class='validate'>Hãy nhập mô tả</span>",
            },
            chitiet: {
                required: "<span class='validate'>Hãy nhập chi tiết tin</span>",
            },
        }
    });
    }
}



setTimeout(function() {
    $("#message").fadeOut(300);
}, 5000)
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
function xoaanh_project() {
    var id = $('#id_projects').val();
    var name = $('#namepic_project').val();
    $('#datafile_project').remove();
    $.ajax({
        url: '/admin/Admin_project/removefile',
        type: 'POST',
        cache: false,
        data: {
            id: id,
            name: name
        },
        success: function(data) {
            $('#anhxoa_project').html(data);
            $('#anhxoa_project').css('display', 'block');
        },
        error: function() {
            alert('Có lỗi xảy ra');
        }
    });
}

function xoaanh_news() {
    var id = $('#id_news').val();
    var name = $('#namepic_news').val();
    $('#datafile_news').remove();
    $.ajax({
        url: '/admin/Admin_news/removefile',
        type: 'POST',
        cache: false,
        data: {
            id: id,
            name: name
        },
        success: function(data) {
            $('#anhxoa_news').html(data);
            $('#anhxoa_news').css('display', 'block');
        },
        error: function() {
            alert('Có lỗi xảy ra');
        }
    });
}

function xoaanh_user() {
    var id = $('#id_user').val();
    var name = $('#namepic_user').val();
    alert(name);
    alert(id);
    $('#datafile_user').remove();
    $.ajax({
        url: '/admin/Admin_user/removefile',
        type: 'POST',
        cache: false,
        data: {
            id: id,
            name: name
        },
        success: function(data) {
            $('#anhxoa_user').html(data);
            $('#anhxoa_user').css('display', 'block');
        },
        error: function() {
            alert('Có lỗi xảy ra');
        }
    });
}

// function xoaanh_adv() {
//     var id = $('#id_advs').val();
//     var name = $('#namepic_banner').val();
//     $('#datafile_advs').remove();
//     $.ajax({
//         url: '/admin/Admin_adv/removefile',
//         type: 'POST',
//         cache: false,
//         data: {
//             id: id,
//             name: name
//         },
//         success: function(data) {
//             $('#anhxoa_advs').html(data);
//             $('#anhxoa_advs').css('display', 'block');
//         },
//         error: function() {
//             alert('Có lỗi xảy ra');
//         }
//     });
// }
// edit project
$(document).ready(function() {
    edit_project();
    $('.edit_projects').click(function() {
        var id = $(this).closest("tr").data("id");
        $.ajax({
            url: '/admin/admin_project/edit',
            method: 'POST',
            data: {
                id: id
            },
            success: function(data) {
                $('#edit').html(data);
                edit_project();
                CKEDITOR.replace('mota_edit');
            }
        });
    })
})
//edit say
$(document).ready(function() {
    $('.edit_say').click(function() {
        caunoihay()
        var id = $(this).closest("tr").data("id");
        $.ajax({
            url: '/admin/admin_say/edit_say',
            method: 'POST',
            data: {
                id: id
            },
            success: function(data) {
                $('#edit').html(data);
                caunoihay()
                CKEDITOR.replace('mota');
            }
        });
    })
})
//sendmail
$(document).ready(function() {
    $('.send_mail').click(function() {
        var id = $(this).closest("tr").data("id");
        $.ajax({
            url: '/admin/admin_contact/send_mail',
            method: 'POST',
            data: {
                id: id
            },
            success: function(data) {
                $('#edit').html(data);
               send_mail_once();
            }
        });
    })
})
//del project
$(document).ready(function() {
    $('.del_projects').click(function() {
        var id = $(this).closest("tr").data("id");
        $.ajax({
            url: '/admin/admin_project/del',
            method: 'POST',
            data: {
                id: id
            },
            success: function(data) {
                $('#add').html(data);
            }
        });
    })
})
//edit cat
$(document).ready(function() {
    danhmuctin();
    $('.edit_cat').click(function() {
        var id = $(this).closest("tr").data("id");
        $.ajax({
            url: '/admin/admin_cat/edit_cat',
            method: 'POST',
            data: {
                id: id
            },
            success: function(data) {
                $('#edit').html(data);
                danhmuctin();
            }
        });
    })
})
//edit adv
$(document).ready(function() {
    suaquangcao()
    $('.edit_adv').click(function() {
        var id = $(this).closest("tr").data("id");
        $.ajax({
            url: '/admin/admin_adv/edit_adv',
            method: 'POST',
            data: {
                id: id
            },
            success: function(data) {
                $('#edit').html(data);
                suaquangcao();
            }
        });
    })
})
//edit slide
$(document).ready(function() {
    $('.edit_slide').click(function() {
        var id = $(this).closest("tr").data("id");
        $.ajax({
            url: '/admin/admin_slide/edit',
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
$(document).ready(function() {
    $('.edit_news').click(function() {
         edit_news();
        var id = $(this).closest("tr").data("id_news");
        $.ajax({
            url: '/admin/admin_news/edit_news',
            method: 'POST',
            data: {
                id: id
            },
            success: function(data) {
                $('#edit').html(data);
                edit_news();
               //CKEDITOR.replace('chitiet');
            }
        });
    })
})

function get(id) {
    var is_active=$("#news_"+id).val();
    $.ajax({
        url: '/admin/admin_news/is_active',
        method: 'POST',
        data: {
           id: id,
            is_active: is_active
        },
        success: function(data) {
     //   document.getElementById("#news_"+id).innerHTML = data;
            $("#news_"+id).val(data);
        }
    });
}
function active_user(id) {
    var is_active=$("#user_"+id).val();
    $.post("/admin/admin_user/active",{id:id,is_active:is_active},function(data){$("#user_"+id).val(data);});
}
$('#check_all_email').click(function(e) {
    var table = $(e.target).closest('table');
    $('td input[id="check_email[]"]', table).prop('checked', this.checked);
});

 $(document).ready(function() {
    $('#delAll').click(function(e){
        var table= $(e.target).closest('table');
        $('td input[name="del_news[]"]',table).prop('checked',this.checked);
    });
})
$(document).ready(function(){
    $('#send_mail_all').click(function(){
    var name_mail = $("input[id='check_email[]']:checked").map(function(){
        return this.value;
    }).toArray();
    $("#email").val(name_mail);
  })
})
$(document).ready(function(){
    $('#del_mail_all').click(function(){
    var name_mail = $("input[id='check_email[]']:checked").map(function(){
        return this.value;
    }).toArray();
    $.ajax({
        url: '/admin/admin_contact/del_all',
        method: 'POST',
        data: {
           name_mail:name_mail
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
    if($("#edit_profile_user").lenght){
        $("#edit_profile_user").validate({
        ignore:[],
        debug:false,
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
                required: "<span class='validate'>Hãy nhập tên tin</span>",
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
