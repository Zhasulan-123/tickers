$(function () {
    $.validator.setDefaults({
      submitHandler: function () {

        var bbp = $("#exampleInputBbp").val();
        var bap = $("#exampleInputBap").val();
        
        let data = [];
        data.push(
            {
                name: "_csrf",
                value: yii.getCsrfToken()
            },
            {
                name: "Tickers[bbp]",
                value: bbp
            },
            {
                name: "Tickers[bap]",
                value: bap
            }
        );
        
        $.ajax({
            type: "POST",
            url: "/tickers/create",
            data: data,
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    $(".past_up > tbody").html(response.html);
                    $('#modal-default').modal('toggle');
                    toastr.success('Тикер Добавлено на базы данных !');
                } else {
                   toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.');
                 }
            }
        });

      }
    });
    $('#quickForm').validate({
      rules: {
        bbp: {
          required: true,
          number: true,
          maxlength: 6,
          minlength: 6,
        },
        bap: {
          required: true,
          number: true,
          maxlength: 6,
          minlength: 6,
        },
      },
      messages: {
        bbp: {
          required: "Обезательно поля для зопольнение",
          number: "Ошибка должно быть число 177.77 !",
          maxlength: "Максимальный число 6 для зополнение 000.00 !",
          minlength: "Минимальный число 6 для зополнение 000.00 !",
        },
        bap: {
          required: "Обезательно поля для зопольнение",
          number: "Ошибка должно быть число 177.77 !",
          maxlength: "Максимальный число 6 для зополнение 000.00 !",
          minlength: "Минимальный число 6 для зополнение 000.00 !",
        }
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

  $("body").on("click", ".delete_one", function(e) {
    e.preventDefault();
    var id = $(this).data("id");
    if (confirm("Вы действительно хотите удалить ?")) {
      $.ajax({
        type: "POST",
        url: "/tickers/delete",
        data: {
          _csrf: yii.getCsrfToken(),
          id: id
        },
        dataType: "json",
        success: function(response) {
          if (response.success) {
             $(".past_up > tbody").html(response.html);
             toastr.success('Тикер было удалено из базы данных !');
          } else {
            toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.');
          }
        }
      });
    }
  });

setInterval(function(){
    $.ajax({
        type: "POST",
        url: "/tickers/add",
        data: {
          _csrf: yii.getCsrfToken()
        },
        success: function() {
            window.location.reload();
        }
    });
}, 5000);