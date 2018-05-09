/*
 * Main set common settings of the application
 */
/* All message will be declared here */
var CONST = {
  MSGTIMEOUT: 10000,
}


$(document).ready(function () {
  /* Hide server side header messages */
  setTimeout(function () {
    $('div').removeClass('has-error');
    $('.form-group').find('.help-block').hide();
  }, 10000);

  setTimeout(function () {
    $('.flash-message').remove();
  }, 10000);

  /* On submit form Disable submit button */
  $(".form-submit").on('submit', function(e){
    if ($(this).parsley().isValid()) {
      $(':submit').prop("disabled", "disabled");
    }
  });

})

/* show image preview on select image*/
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#image-preview').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#image").change(function(){
  readURL(this);
});


/* parsley file upload velidation */
window.Parsley
  .addValidator('maxFileSize', {
    validateString: function (_value, maxSize, parsleyInstance) {
      if (!window.FormData) {
        alert('You are making all developpers in the world cringe. Upgrade your browser!');
        return true;
      }
      var files = parsleyInstance.$element[0].files;
      return files.length != 1 || files[0].size <= maxSize * 1024;
    },
    requirementType: 'integer',
    messages: {
      en: 'File should not be larger than 4 Mb',
    }
  })
  .addValidator('filemimetypes', {
    requirementType: 'string',
    validateString: function (_value, requirement, parsleyInstance) {
      var file = parsleyInstance.$element[0].files;
      if (file.length == 0) {
        return true;
      }
      var allowedMimeTypes = requirement.replace(/\s/g, "").split(',');
      return allowedMimeTypes.indexOf(file[0].type) !== -1;
    },
    messages: {
      en: 'Please upload only csv or excel file'
    }
  });


/* Declare all helper functions here */
var helper = {
  /*
   * @method: checkResponse
   * @desc: CHeck error messages in response
   */
  checkResponse: function (response) {
    if (response.status == false && typeof response.errors != 'undefined' && response.errors.length > 0) {
      var message = '';
      response.errors.forEach(function (val) {
        message += val + '\n';
      })
      $.notify(message, "error");
    }
    return response;
  },
  /*
   * @method: showLoader
   * @desc: Show loader
   */
  showLoader: function () {
    $(".splash").show();
  },
  /*
   * @method: hideLoader
   * @desc: hide loader
   */
  hideLoader: function () {
    $(".splash").hide();
  },
}

$("body").on("click", ".delete-action", function () {
  if (confirm($(this).attr('data-alert-message'))) {
    helper.showLoader();
    var url = $(this).attr('data-url');
    var id = $(this).attr('data-id');
    if (id != '' && url != '') {
      var formData = {
        id: id
      };
      $.ajax({
        type: "POST",
        url: url,
        data: formData,
        success: function (result) {
          location.reload();
        },
        error: function (textStatus, errorThrown) {
          helper.hideLoader();
          $(".alert-danger").css("display", "block");
          $(".alert-danger").html(textStatus);
        }
      });
    }
  }
});


$(document).ready(function () {
    /*DataTable call if user list*/
    if ($('#customer-table').length > 0) {
        table = $('#customer-table').DataTable({
            processing: true,
            serverSide: true,
            order: [],
            ajax: BASE_URL + '/admin/user-data',
            columns: [
                {data: 'code', name: 'code'},
                {data: 'name', name: 'name'},
                {data: 'phone_number', name: 'phone_number', className: 'td-numerical'},
                {data: 'email', name: 'email'},
                {data: 'user_type', name: 'user_type'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', className: 'td-action', searchable: false, orderable: false},
            ]
        });
    }

    /*DataTable call if user list*/
    if ($('#campaign-table').length > 0) {
        table = $('#campaign-table').DataTable({
            processing: true,
            serverSide: true,
            order: [],
            ajax: BASE_URL + '/admin/campaign-data',
            columns: [
                {data: 'name', name: 'name'},
                {data: 'name', name: 'name'},
                {data: 'type', name: 'type'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', className: 'td-action', searchable: false, orderable: false},
            ]
        });
    }
})