var mediaAvatar = false;
function setMediaAvatar(status) {
  $('.ajax-upload-dragdrop').remove();
  if(status) {
    $('#insert-into-post').hide();
    $('#insert-into-avatar').show();
    settings.multiple = false;
  } else {
    $('#insert-into-post').show();
    $('#insert-into-avatar').hide();
    settings.multiple = true;
  }
  $("#upload").uploadFile(settings);
  mediaAvatar = status;

  $('#insert-into-post').attr('disabled', true);
  $('#insert-into-avatar').attr('disabled', true);
  $('#delete-media').attr('disabled', true);

  jQuery("input[name='check_image_media[]']:checked").each(function() {
    jQuery(this).prop("checked", false);
  });
}

/*setting upload file*/
var settings = {
  url: "/medias/upload",
  method: "POST",
  allowedTypes: "jpg,png,gif,jpeg",
  fileName: "file",
  multiple: true,
  onSuccess: function (files, response, xhr) {
    $('#upload-media a').removeClass('active');
    $('#media-list a').addClass('active');

    $('#upload-files').removeClass('active');
    $('#upload-files').removeClass('in');

    $('#media-library').addClass('active');
    $('#media-library').addClass('in');

    if(response.code == 200) {
      if(mediaAvatar) {
        jQuery("input[name='check_image_media[]']:checked").each(function() {
          jQuery(this).prop("checked", false);
        });
      }
      var data = response.data;
      var html ='<li id="li-'+data.id+'">';
            html += '<input type="hidden" name="value-id" id ="value-id" value="'+data.id+'">';
            html += '<input type="checkbox" id="cb' + data.id + '" name="check_image_media[]" value="'+data.url+'" checked/>';
            html += '<label for="cb' + data.id + '"><img src="'+data.url+'"/></label>';
          html += '</li>';

      $('#list-media ul').prepend(html);
      
      $('#insert-into-post').attr('disabled', false);
      $('#insert-into-avatar').attr('disabled', false);
      $('#delete-media').attr('disabled', false);
      check_image();
    } else {
      alert(response.message);
    }
  },
  onError: function (files, status, errMsg) {
  }
}

$.ajax({
  type: "get",
  url: "/article_samples",
  beforeSend: function() {
    $('#list-article').html('<div class="loadding-media"><i class="fa fa-refresh fa-spin"></i></div>');
  },
  complete: function (response) {
    $('#list-article').html(response.responseText);
    $('.article-sample').on('click', function (e) {
      $('#use-article-sample').attr('disabled', false);
    });
  }
});

//loai bo su kien click khi chan chon ảnh
// $('#insert-into-post').unbind();

$(".img-check").click(function(){
  $(this).toggleClass("check");
});
check_image();

getMedias();

//search media 
$('#key-search-file').keyup(function(event) {
  getMedias();
});

$('#media_filter_date').change(function(event) {
  getMedias();
});

//delete media
$('#delete-media').click(function(event) {
  $('#insert-into-post').attr('disabled', true);
  $('#mediaModal .close').css({
    display: 'none',
  });
  swal({
    title: "削除しても問題がありませんか。",
    text: "このファイルは復元できません",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-danger",
    confirmButtonText: "はい、削除します。",
    cancelButtonText: "いいえ、削除しません",
    closeOnConfirm: false
  },

  function(isConfirm) {
    if (isConfirm) {
      var array_id = [];
      var array_image = [];
      jQuery("input[name='check_image_media[]']:checked").each(function(){
        var id = jQuery(this).parent('li').children('#value-id').val();
        array_id[array_id.length]= id;
        array_image[array_image.length] = jQuery(this).val();
      });

      $.ajax({
        url: '/admin/Posts/deleteAjax',
        type: 'GET',
        data: {
          'array_id': array_id,
          'array_image': array_image,
        },
        success: function( msg ) {
          if (msg == 'success') {
            jQuery("input[name='check_image_media[]']:checked").each(function(){
              var id = jQuery(this).parent('li').children('#value-id').val();
              $('#li-'+id).remove();
              $('#li-get-'+id).remove();
            });

            $('#insert-into-post').attr('disabled', true);
            $('#delete-media').attr('disabled', true);
            swal("削除完了");
          }else{
            swal("エーラで削除できません。");
          }
          
        },   
      });
    } else {
      $('#insert-into-post').attr('disabled', false);
      return false;
    }
    $('#mediaModal .close').css({
      display: 'block',
    });
  });
  
});

//check image
function check_image() {
  $("input[name='check_image_media[]']").change(function() {
    var new_check = jQuery(this);
    var check = '';
    var i = 0;
    jQuery("input[name='check_image_media[]']:checked").each(function() {
      check = check + ',' + jQuery(this).val();
      i++;
    });
    if(check.length > 1) {
      if(mediaAvatar) {
        if (i > 1) {
          jQuery("input[name='check_image_media[]']:checked").each(function() {
            jQuery(this).prop("checked", false);
          });
          new_check.prop("checked", true);
        }
      }
      $('#insert-into-post').attr('disabled', false);
      $('#insert-into-avatar').attr('disabled', false);
      $('#delete-media').attr('disabled', false);
    } else {
      $('#insert-into-post').attr('disabled', true);
      $('#insert-into-avatar').attr('disabled', true);
      $('#delete-media').attr('disabled', true);
    }
  });

  $('#insert-into-avatar').on('click',  function(event) {
    jQuery("input[name='check_image_media[]']:checked").each(function() {
      var src = jQuery(this).val();
      var data = '<img src="'+src+'" class="img-thumbnail img-check">';
      $('#avatar').html(data);
      $('#file_avatar').val(src);
      jQuery(this).prop("checked", false);
    });
  
    $('#get-media').hide();
  
    $('#remove-avatar').show();
    $('#insert-into-avatar').attr('disabled', true);
    $('#delete-media').attr('disabled', true);
    $('#mediaModal').modal('hide');
  });
  
  $('#remove-avatar').click(function(event) {
    $('#avatar').html('');
    $('#get-media').show();
    $('#remove-avatar').hide();
    $('#file_avatar').val('')
  });
}

function getMedias() {
  var key = $('#key-search-file').val();
  var media_filter_date = $('#media_filter_date').val();
  $.ajax({
    url: '/medias',
    type: 'GET',
    data: {
      'key': key,
      'media_filter_date': media_filter_date,
      'type': 'add'
    },
    beforeSend: function(){
      $('#list-media').html('<div class="loadding-media"><i class="fa fa-refresh fa-spin"></i> Loading</div>');
    },
    success: function( respose ) {
      $('#list-media').html(respose);
      check_image();
    }
  });
}
