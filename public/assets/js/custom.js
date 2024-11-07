$(document).ready(function() {
    window._token = $('meta[name="csrf-token"]').attr('content')
    window.loader = '<div class="lds-roller"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>';
    window.rolling = '<span class="rolling"></span>' ;
    window.lds_ellipsis='<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>';
    window.spinner = '<i class="fa fa-spinner fa-spin"></i>';
    window.check = '<i class="fas fa-check"></i>';
    window.times = '<i class="fas fa-times"></i>';
    window.proccessing = "<div class='loader'> <div class='loader--dot'></div><div class='loader--dot'></div><div class='loader--dot'></div><div class='loader--dot'></div><div class='loader--dot'></div><div class='loader--dot'></div><div class='loader--text'></div></div>";
    window.no_image = "/assets/images/no_image.png";
    window.no_of_loading_block = 10;
    window.select = $('#hdSelect').val();
    window.required_field_message = $('#hdRequiredField').val();
    window.SWAL = function ($message,$class) {
        return Swal.fire({
            title: $message,
            icon: $class,
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        })
    }
    window.SWAL_ALERT = function($message,$class){
        $message = $message?$message:required_field_message ;
        $class = $class?$class:"info";
        return Swal.fire({
            title: $message,
            icon: $class
        })
    }
    window.NOTIFY = function($message,$class){
        return notif({
            msg: $message,
            type: $class
        });
    }
    window.TOAST = function($message,$class){
        return $.toast({
            text: $message,
            position: 'top-right',
            stack: false,
            icon: $class
        }) 
    }
    window.select2 = function(){
        $('.select2').select2({
            placeholder: select,
            closeOnSelect: true,
            allowClear: true,
            closeOnSelect: true,
            theme: "classic"
        })
    }
    window.select2_multiple = function(){
        $('.select2-multiple').select2({
            placeholder: select,
            allowClear: true,
            closeOnSelect: false
        })
    }
    changeSubmitButtonCaption();
    $('[data-toggle="tooltip"]').tooltip();
    $(".datepicker-date").bootstrapdatepicker({ format: "yyyy-mm-dd", viewMode: "date", autoclose: !0 , multidateSeparator: "-" }).on('keypress', function() {
        return false;
    }),
    $(".datepicker-month").bootstrapdatepicker({ format: "MM", viewMode: "months", minViewMode: "months", multidate: !0, multidateSeparator: "-" }).on('keypress', function() {
        return false;
    }),
    $(".datepicker-year").bootstrapdatepicker({ format: "yyyy", viewMode: "year", minViewMode: "years", multidate: !0, multidateSeparator: "-" }).on('keypress', function() {
        return false;
    }),
    $(".datetimepicker").datetimepicker({ format: "yyyy-mm-dd hh:ii:ss", autoclose: !0 }).on('keypress', function() {
        return false;
    });

    $('.select-all').click(function() {
        let $select2 = $(this).parent().siblings('.select2-multiple')
        $select2.find('option').prop('selected', 'selected')
        $select2.trigger('change')
    })
    $('.deselect-all').click(function() {
        let $select2 = $(this).parent().siblings('.select2-multiple')
        $select2.find('option').prop('selected', '')
        $select2.trigger('change')
    })

    $('.select2').select2({
        placeholder: select,
        closeOnSelect: true,
        allowClear: true,
        closeOnSelect: true,
        theme: "classic"
    })
    $('.select2-multiple').select2({
        placeholder: select,
        allowClear: true,
        closeOnSelect: false
    })

    $(".mobile-number").intlTelInput();

    /*$('.summernote').summernote({
        focus: true                  // set focus to editable area after initializing summernote
    }); */
    $('.treeview').each(function() {
        var shouldExpand = false
        $(this).find('li').each(function() {
            if ($(this).hasClass('active')) {
                shouldExpand = true
            }
        })
        if (shouldExpand) {
            $(this).addClass('active')
        }
    })

    $(document).on('change', '.options', function(e) {
        let objects, where, valueColumn, displayColumn, targetHTML;
        objects = $('.options');
        where = [];
        for (var obj of objects) {
            ele = obj.id
            val = obj.value
            if (val) where.push([ele, '=', val])
        }
        valueColumn = $('#valueColumn').val();
        displayColumn = $('#displayColumn').val().split(',');
        targetHTML = $('#targetHTML').val();
        model = $('#model').val();
        formUrl = $('#url-load').val();
        formData = {
            model: model,
            where: where,
            valueColumn: valueColumn,
            displayColumn: displayColumn
        };
        $.ajax({
            headers: {
                'x-csrf-token': _token
            },
            method: 'POST',
            data: formData,
            url: formUrl
        }).done(function(response) {
            $('#' + targetHTML).html(response);
        })
    })
    $(document).on('click', '.img_prev', function() {
        $('input[type=file').trigger('click');
    })
})

function getData(model, url, where) {
    $.ajax({
            async: false,
            headers: {
                'x-csrf-token': _token
            },
            method: 'POST',
            url: url,
            data: {
                model: model,
                where: where,
            }
        })
        .done(function(data) {
            response = data;
        })
    return response;
}

function getAge(dateString1, datestring2 = '') {
    var yearNow, monthNow, dateNow, now = new Date();

    yearNow = now.getFullYear();
    monthNow = now.getMonth();
    dateNow = now.getDate();
    //date must be mm/dd/yyyy
    /* var dob = new Date(dateString.substring(6, 10),
        dateString.substring(0, 2) - 1,
        dateString.substring(3, 5)
    ); */

    if (datestring2 != '') {
        var date2 = new Date(datestring2);
        yearNow = date2.getFullYear();
        monthNow = date2.getMonth();
        dateNow = date2.getDate();
    }

    var dob = new Date(dateString1);

    var yearDob = dob.getFullYear();
    var monthDob = dob.getMonth();
    var dateDob = dob.getDate();
    var age = {};
    var ageString = "";
    var yearString = "";
    var monthString = "";
    var dayString = "";


    yearAge = yearNow - yearDob;

    if (monthNow >= monthDob)
        var monthAge = monthNow - monthDob;
    else {
        yearAge--;
        var monthAge = 12 + monthNow - monthDob;
    }

    if (dateNow >= dateDob)
        var dateAge = dateNow - dateDob;
    else {
        monthAge--;
        var dateAge = 31 + dateNow - dateDob;

        if (monthAge < 0) {
            monthAge = 11;
            yearAge--;
        }
    }

    age = {
        years: yearAge,
        months: monthAge,
        days: dateAge
    };

    if (age.years > 1) yearString = " years";
    else yearString = " year";
    if (age.months > 1) monthString = " months";
    else monthString = " month";
    if (age.days > 1) dayString = " days";
    else dayString = " day";


    if ((age.years > 0) && (age.months > 0) && (age.days > 0))
        ageString = age.years + yearString + ", " + age.months + monthString + ", and " + age.days + dayString + " old.";
    else if ((age.years == 0) && (age.months == 0) && (age.days > 0))
        ageString = "Only " + age.days + dayString + " old!";
    else if ((age.years > 0) && (age.months == 0) && (age.days == 0))
        ageString = age.years + yearString + " old. Happy Birthday!!";
    else if ((age.years > 0) && (age.months > 0) && (age.days == 0))
        ageString = age.years + yearString + " and " + age.months + monthString + " old.";
    else if ((age.years == 0) && (age.months > 0) && (age.days > 0))
        ageString = age.months + monthString + " and " + age.days + dayString + " old.";
    else if ((age.years > 0) && (age.months == 0) && (age.days > 0))
        ageString = age.years + yearString + " and " + age.days + dayString + " old.";
    else if ((age.years == 0) && (age.months > 0) && (age.days == 0))
        ageString = age.months + monthString + " old.";
    else ageString = "";

    return ageString;
}

window.summationTd = function (className) {
    let tds,total = 0 ;
    tds = $('td.'+className);
    $.each(tds,function(index,ele) {
        value = $(ele).text();
        value = +value;
        total += value ;
    })
    return total.toFixed(window.precision);
}

function readURL(input, img_prev) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function(e) {
            $('.' + img_prev).closest('div').addClass('img-thumbnail');
            $('.' + img_prev).attr('src', e.target.result);
            console.log(input.files[0].name);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function setPhoto(input, img_prev = '') {
    let div = $(input).closest('div');
    let img = div.find('img');
    let img_class = img.attr('class');
    img_class = img_prev != '' ? img_prev : img_class;
    readURL(input, img_class);
}

function changeSubmitButtonCaption() {
     let href = location.href;
    let update_id = $('#update_id').val();
    if (~href.indexOf("edit") || update_id > 0) {
        let text = $('#hdUpdateBtn').val();
        $('input[type=submit]').val(text);
        $('.update').text(text);

    } 
    $("html, body").animate({ scrollTop: 0 }, "slow");
}
function setSerial(table_class) {
    $('table.'+table_class).find('td.serial').each(function() {
        var $tr = $(this).closest('tr');
        var myRow = $tr.index();
        $(this).text((myRow + 1));
    });
}
function ImageExist(url) 
{
   var img = new Image();
   img.src = url;
   return img.height != 0;
}
function IsEmail(email) {
    var regex =
        /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!regex.test(email)) {
        return false;
    } else {
        return true;
    }
}
function isUserExist(model,url,column,value) {
    let bool = 0;
    $.ajax({
            async: false,
            headers: {
                'x-csrf-token': _token
            },
            method: 'POST',
            url: url,
            data: {
                table: model,
                column: column,
                value: value
            }
        })
        .done(function(data) {
            bool = data;
        })
    return bool;
}
function pad (str, max) {
    str = str.toString();
    return str.length < max ? pad("0" + str, max) : str;
}
function decimalPointCheck(element, event) {
    result = (event.charCode >= 48 && event.charCode <= 57) || event.charCode === 46;
    if (result) {
        let t = element.value;
        if (t === '' && event.charCode === 46) {
            return false;
        }
        let dotIndex = t.indexOf(".");
        let valueLength = t.length;
        if (dotIndex > 0) {
            if (dotIndex + 2 < valueLength) {
                return false;
            } else {
                return true;
            }
        } else if (dotIndex === 0) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}