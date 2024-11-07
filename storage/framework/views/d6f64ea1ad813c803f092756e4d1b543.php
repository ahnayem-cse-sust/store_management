<script>
window.precision = 2;

$(document).on('change', '#group_id', function() {
    let group_id, subgroup_id, ledger_id, formData, formUrl, where = [],
        model, orderBy, serialize, returnType;
    group_id = $(this).val();
    subgroup_id = $('#subgroup_id');
    subgroup_id.empty();
    item_id = $('#item_id');
    item_id.empty();
    select = "<?php echo e(__('cruds.select')); ?>";
    where.push(['group_id', '=', group_id]);
    response1 = getData("/crud/get", "SubGroup", where, 'get', []);
    subGroupOptions = `<option value=''>${select}</option>`;
    if (response1) {
        $.each(response1, function(index, value) {
            subGroupOptions +=
                `<option value='${value.id}'>${value.subgroup_name}</option>`;
        })
    }
    subgroup_id.html(subGroupOptions).trigger('change');

    response2 = getData("/crud/get", "Item", where, 'get', []);
    itemOptions = `<option value=''>${select}</option>`;
    if (response2) {
        $.each(response2, function(index, value) {
            itemOptions +=
                `<option value='${value.id}' data-item_code="${value.item_code}"  data-group_id="${value.group_id}" data-subgroup_id="${value.subgroup_id}" data-unit_id="${value.unit_id}" data-sale_price="${value.sale_price}" data-page_location="${value.page_location}">${value.item_code} - ${value.item_name}</option>`;
        })
    }
    item_id.html(itemOptions).trigger('change');
})

$(document).on('change', '#subgroup_id', function() {
    let subgroup_id, volume_location, formData, formUrl, where = [];
    subgroup_id = $('#subgroup_id').val();
    where.push(['subgroup_id', '=', subgroup_id]);
    volume_location = $('#volume_location');
    volume_location.empty();

    item_id = $('#item_id');
    item_id.empty();
    
    select = "<?php echo e(__('cruds.select')); ?>";
    options = `<option value=''>${select}</option>`;
    response = getData("/crud/get", "SubGroupVolume", where, 'get', []);
    if (response) {
        $.each(response, function(index, value) {
            options +=
            `<option value='${value.id}'>${value.item_code} - ${value.item_name}</option>`;
        })
    }
    volume_location.html(options).trigger('change');
    response2 = getData("/crud/get", "Item", where, 'get', []);
    itemOptions = `<option value=''>${select}</option>`;
    if (response2) {
        $.each(response2, function(index, value) {
            itemOptions +=
                `<option value='${value.id}' data-item_code="${value.item_code}"  data-group_id="${value.group_id}" data-subgroup_id="${value.subgroup_id}" data-unit_id="${value.unit_id}" data-sale_price="${value.sale_price}" data-page_location="${value.page_location}">${value.item_code} - ${value.item_name}</option>`;
        })
    }
    item_id.html(itemOptions).trigger('change');
})



function getData(url, model, where,
    rtn, wth) {
    let response = '';
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
                rtn: rtn,
                with: wth
            }
        })
        .done(function(data) {
            response = data;
        })
    return response;
}

function getPage(url, model, where, page) {
    let response = '';
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
                page: page
            }
        })
        .done(function(data) {
            response = data;
        })
    return response;
}

function dataExist(table, where) {
    let response = '';
    url = '/admin/crud/exist';
    $.ajax({
            async: false,
            headers: {
                'x-csrf-token': _token
            },
            method: 'POST',
            url: url,
            data: {
                table: table,
                where: where,
            }
        })
        .done(function(data) {
            response = data;
        })
    return response;
}
function presentStock(branch_id,warehouse_id,group_id,subgroup_id,item_id,from_date,to_date) {
    let response = '';
    url = '/admin/inventory_management/item/present-stock';
    $.ajax({
            async: false,
            headers: {
                'x-csrf-token': _token
            },
            method: 'POST',
            url: url,
            data: {
                branch_id: branch_id,
                warehouse_id: warehouse_id,
                group_id:group_id,
                subgroup_id:subgroup_id,
                item_id:item_id,
                from_date:from_date,
                to_date:to_date,
            }
        })
        .done(function(data) {
            response = data;
        })
    return response;
}
function presentToolsStock(branch_id,warehouse_id,group_id,subgroup_id,item_id,from_date,to_date) {
    let response = '';
    url = '/admin/inventory_management/item/present-tools-stock';
    $.ajax({
            async: false,
            headers: {
                'x-csrf-token': _token
            },
            method: 'POST',
            url: url,
            data: {
                branch_id: branch_id,
                warehouse_id: warehouse_id,
                group_id:group_id,
                subgroup_id:subgroup_id,
                item_id:item_id,
                from_date:from_date,
                to_date:to_date,
            }
        })
        .done(function(data) {
            response = data;
        })
    return response;
}
$(function() {
    checkDuplicate();
    GenerateCode();
})

function GenerateCode() {
    let element, model, prefix, field, update_id = 0,
        where = [];
    element = document.getElementsByClassName("unique_code");
    update_id = $(element).data('update_id');
    if (update_id == 0) {
        model = $(element).data('model');
        prefix = $(element).data('prefix');
        field = $(element).attr("name");
        url = '/admin/crud/generate-code';
        $.ajax({
                async: false,
                headers: {
                    'x-csrf-token': _token
                },
                method: 'POST',
                url: url,
                data: {
                    prefix: prefix,
                    field: field,
                    model: model,
                    where: where,
                }
            })
            .done(function(data) {
                $(element).val(data);
            })
    }
}

function checkDuplicate() {
    let element, model, prefix, field, update_id = 0,
        where = [];
    element = document.getElementsByClassName("unique_code")[0];
    update_id = $(element).data('update_id');
    model = $(element).data('model');
    field = $(element).attr("name");

    $(element).blur(function() {
        where = [];
        value = element.value;
        where.push([field, '=', value]);
        if (update_id !== 0) {
            where.push(['id', '!=', update_id]);
        }
        response = getData("/crud/get", model, where, 'get', []);
        if (response.length > 0) {
            $(element).css('border-color', 'red');
            $(element).val('');
        } else {
            $(element).removeAttr('style');
        }
    });
    $(element).keyup(function() {
        where = [];
        value = element.value;
        where.push([field, '=', value]);
        if (update_id !== 0) {
            where.push(['id', '!=', update_id]);
        }
        response = getData("/crud/get", model, where, 'get', []);
        if (response.length > 0) {
            $(element).css('border-color', 'red');
        } else {
            $(element).removeAttr('style');
        }
    });
}
</script>
<?php /**PATH D:\laragon\www\bitac_ims\resources\views/layouts/ajax.blade.php ENDPATH**/ ?>