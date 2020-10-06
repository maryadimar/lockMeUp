$(document).ready(function () {
  /*$.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });*/
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      bagian: {
        required: true,
      },
      r_meeting: {
        required: true,
      },
      tanggal: {
        required: true,
      },
      waktu: {
        required: true,
      },
      nohp: {
        required: true,
        minlength: 11
      },
    },
    messages: {
      tanggal: {
        required: "Silahkan masukan tanggal meeting",
      },
      waktu: {
        required: "Silahkan masukan waktu meeting",
      },
      email: {
        required: "Silahkan masukan email anda",
        email: "Masukan email valid"
      },
      bagian: {
        required: "Silahkan pilih",
      },
      r_meeting: {
        required: "Silahkan isi ruangan meeting",
      },
      nohp: {
        required: "Silahkan masukan nohp anda",
        minlength: "Minimal 11 digit"
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});