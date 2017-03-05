(function($) {
  $('#company_id').trigger('change');

  $( "#company_id" ).change(function () {
    console.log('select change');

    var companyId = 1;

    $( "#company_id option:selected" ).each(function() {
      companyId = $( this ).val();
      companyName = $( this ).text();
    });

    $.ajax({
      type : "GET",
      dataType:'json',
      url: '/api/get_departments/' + companyId,
      cache : false,
      success : function(response){
        console.log(response);

        $('#department_id').html('');
        if (response.length === 0) {
          console.log('показать модальное окно');

          $("#modalError").modal('show');
          $("#myModalLabel").html('Не добавлены отделы в компании "' + companyName + '"!');
          $("#errorModal").html('<p>Создайте отдел в компании "' + companyName + '"! <br /><a href="/admin/add_department/' + companyId + '" class="btn btn-success">Добавить отдел</a></p>');
        };

        $.each(response, function(i, value) {
          $('#department_id').append($('<option>').text(value.fullname).attr('value', value.id));
        });
        //console.log(response); alert(response)
      },
      error: function (error) {
        console.warn(error);
      }
    });

  });

})(jQuery);
