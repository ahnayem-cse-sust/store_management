<script>
  $(function() {
    setTimeout(() => {
      $('.close').trigger('click');
    }, 1000);
    let copyButtonTrans = '{{ trans('cruds.datatables.copy') }}'
    let csvButtonTrans = '{{ trans('cruds.datatables.csv') }}'
    let excelButtonTrans = '{{ trans('cruds.datatables.excel') }}'
    let pdfButtonTrans = '{{ trans('cruds.datatables.pdf') }}'
    let printButtonTrans = '{{ trans('cruds.datatables.print') }}'
    let colvisButtonTrans = '{{ trans('cruds.datatables.colvis') }}'
    let deleteSelectedButtonTrans = '{{ trans('cruds.datatables.delete') }}'

    let languages = {
      'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
    };

    $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {
      className: 'btn'
    })
    $.extend(true, $.fn.dataTable.defaults, {
      language: {
        url: languages['{{ app()->getLocale() }}']
      },
      columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
      }, {
        orderable: false,
        searchable: false,
        targets: -1
      }],
      select: {
        style: 'multi+shift',
        selector: 'td:first-child'
      },
      order: [],
      scrollX: true,
      pageLength: 100,
      dom: 'lBfrtip<"actions">',
      buttons: [{
          extend: 'copy',
          className: 'btn-default',
          text: copyButtonTrans,
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'csv',
          className: 'btn-default',
          text: csvButtonTrans,
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'excel',
          className: 'btn-default',
          text: excelButtonTrans,
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'pdf',
          className: 'btn-default',
          text: pdfButtonTrans,
          exportOptions: {
            columns: ':visible'
          }
        },
        {
          extend: 'print',
          className: 'btn-default',
          text: printButtonTrans,
          exportOptions: {
            columns: ':visible'
          }
        }
      ]
    });
  });

  function deleteSelected(route, hasPermission) {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
    if (hasPermission) {
      let deleteButtonTrans = '{{ trans('cruds.datatables.delete') }}'
      let deleteButton = {
        text: deleteButtonTrans,
        url: route,
        className: 'btn-danger',
        action: function(e, dt, node, config) {
          var ids = $.map(dt.rows({
            selected: true
          }).nodes(), function(entry) {
            return $(entry).data('entry-id')
          });

          if (ids.length === 0) {
            alert('{{ trans('cruds.datatables.zero_selected') }}')

            return
          }

          if (confirm('{{ trans('cruds.areYouSure') }}')) {
            $.ajax({
                headers: {
                  'x-csrf-token': _token
                },
                method: 'POST',
                url: config.url,
                data: {
                  ids: ids,
                  _method: 'DELETE'
                }
              })
              .done(function() {
                location.reload()
              })
          }
        }
      }
      //dtButtons.push(deleteButton)
    }
    $('.datatable').DataTable({
      buttons: dtButtons
    });
  }

  function editAction($this) {
    let table, column, value, url, response;
    table = $($this).data("table");
    column = $($this).data("column");
    value = $($this).data("value");
    url = "{{route('admin.crud.edit')}}";
    $.ajax({
        async: false,
        headers: {
          'x-csrf-token': _token
        },
        method: 'POST',
        url: url,
        beforeSend: (function() {
          $("#content").html(loader);
        }),
        data: {
          table: table,
          column: column,
          value: value
        }
      })
      .done(function(data) {
        response = data;
      })
    return response;
  }
</script>