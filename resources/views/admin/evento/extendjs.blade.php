$("#btn-save-ponente").click(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    e.preventDefault();
    var formData = {
        ponente: $('#ponente').val(),
        tema:    $('#tema-ponente').val(),
        fecha:   $('#fecha-ponente').val(),
        hora:    $('#hora-ponente').val(),
        id:      $('#id-ponente').val(),
    };
    $.ajax({
        type     : 'POST',
        url      : '{{ route('evento.ponente_add') }}',
        data     : formData,
        dataType : 'json',
        success: function (data) {
            $('#selectID-ponente').empty();
            for (var key in data) {
                $("#selectID-ponente").append('<option value="' + key + '">' + data[key] + '</option>');
            }
            $('#tema-ponente').val('');
            $('#fecha-ponente').val('');
            $('#hora-ponente').val('');
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

$("#btn-delete-ponente").click(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    e.preventDefault();
    var formData = {
        eponentes: $('#selectID-ponente').val(),
        id:        $('#id-ponente').val(),
    };
    $.ajax({
        type     : 'POST',
        url      : '{{ route('evento.ponente_del') }}',
        data     : formData,
        dataType : 'json',
        success: function (data) {
            $('#selectID-ponente').empty();
            for (var key in data) {
                $("#selectID-ponente").append('<option value="' + key + '">' + data[key] + '</option>');
            }
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

$("#btn-save-aval").click(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    e.preventDefault();
    var formData = {
        instituto: $('#instituto').val(),
        id:        $('#id-aval').val(),
    };
    $.ajax({
        type     : 'POST',
        url      : '{{ route('evento.aval_add') }}',
        data     : formData,
        dataType : 'json',
        success: function (data) {
            $('#selectID-aval').empty();
            for (var key in data) {
                $("#selectID-aval").append('<option value="' + key + '">' + data[key] + '</option>');
            }
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});

$("#btn-delete-aval").click(function (e) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    e.preventDefault();
    var formData = {
        avales: $('#selectID-aval').val(),
        id:     $('#id-aval').val(),
    };
    $.ajax({
        type     : 'POST',
        url      : '{{ route('evento.aval_del') }}',
        data     : formData,
        dataType : 'json',
        success: function (data) {
            $('#selectID-aval').empty();
            for (var key in data) {
                $("#selectID-aval").append('<option value="' + key + '">' + data[key] + '</option>');
            }
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
});