$(function () {

    $('.select2').select2()

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $('[data-mask]').inputmask();

    //date
    $('#datetimepicker9').datetimepicker({
        format: 'DD/MM/YYYY'
    });

    $('#datetimepicker10').datetimepicker({
      format: 'DD/MM/YYYY'
    });

    $('#datetimepicker11').datetimepicker({
      format: 'DD/MM/YYYY'
    });

    $('#timepicker').datetimepicker({
      use24hours: true,
      format: 'HH:mm',
    });

    $('#timepicker2').datetimepicker({
      use24hours: true,
      format: 'HH:mm',
    });

    $('#timepicker3').datetimepicker({
      use24hours: true,
      format: 'HH:mm',
    });

    $('#timepicker4').datetimepicker({
      use24hours: true,
      format: 'HH:mm',
    });

  })