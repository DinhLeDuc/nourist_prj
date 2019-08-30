@include('commons.media')
@if ($errors->has('content'))
<span class="help-block">
    <small class="text-danger">{{ $errors->first('content') }}</small>
</span>
@endif
<textarea name="content" class="form-control" id="content" rows="5">{{ $editor_value }}</textarea>

<script src="{{ asset('assets/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({ 
        selector:'#content',
        height: 400,
        theme: 'modern',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
        ],
        toolbar1: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | bullist numlist blockquote hr | alignleft aligncenter alignright alignjustify | outdent indent | a11ycheck ltr rtl | link unlink pagebreak image media code | table removeformat charmap | forecolor backcolor | fullscreen preview print ',
        templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
        ],
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ],
        menubar: false,
        setup: function (editor) {
            $('#insert-into-post').on('click', function(event) {
            	jQuery("input[name='check_image_media[]']:checked").each(function() {
                    var src = jQuery(this).val();
                    var data = '<img src="'+'/../'+src+'" alt="..." class="img-thumbnail img-check">';
                    editor.insertContent(data);
                    jQuery(this).prop("checked", false);
                });
                $('#insert-into-post').attr('disabled', true);
            	$('#delete-media').attr('disabled', true);
            	$('#mediaModal').modal('hide');
            });

            $('#use-article-sample').on('click', function(event) {
                $.ajax({
                    type: "get",
                    url: "/article_samples/" + $("input[name='article-sample']:checked").val(),
                    beforeSend: function() {
                        $('.loadding-article-sample').show();
                        $('body').css('opacity', 0.6);
                    },
                    success: function (response) {
                        if(response.code == 200) {
                            editor.setContent(response.data.content);
                        }
                        $('body').css('opacity', 1);
                        $('#articleModal').modal('hide');
                        $('.loadding-article-sample').hide();
                    }
                });
            });
        },
    });
</script>
