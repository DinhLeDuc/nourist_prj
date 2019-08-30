<div class="form-group">
    @php
        $name = old('name', $foodDetail->name ?? null)   
    @endphp
    <label>{{ $title_data['lable'] }} *</label>
    <input type="text" name="name" placeholder="{{ $title_data['lable'] }}" class="form-control form-custom get-slug-name {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $name }}">
    <div id="edit-slug-box" class="mt-1 {{ empty($name) ? 'hidden' : '' }}">
        <span class="font-italic text-primary">{{ __('liên kết tỉnh') }}:</span>
        <span id="sample-permalink">{{ url('') }}/{{ $title_data['slug'] }}/<span id="edit-slug-name">{{ old('slug', $foodDetail->slug ?? null) }}</span></span>
        <input type="hidden" name="slug" id="slug" value="{{ old('slug', $foodDetail->slug ?? null) }}">
        ‎<span id="edit-slug-btn-1" class="{{ empty($name) ? 'hidden' : '' }}">
            <a href="javascript:void(0)" class="slug-edit"> <i class="fa fa-pencil" aria-hidden="true"></i></a>
        </span>
        ‎<span id="edit-slug-btn-2" class="hidden">
            <a href="javascript:void(0)" class="btn btn-sm btn-light slug-save">Ok</a>
            <a href="javascript:void(0)" class="slug-edit-cancel">{{ __('hủy') }}</a>
        </span>
    </div>

    @if ($errors->has('name'))
        <span class="help-block">
            <small class="text-danger">{{ $errors->first('name') }}</small>
        </span>
    @endif
</div>

<script>
    var title_table = "{{ $title_data['table'] }}";
    $('.get-slug-name').change(function() {
        checkSlug($(this).val());
    });
    $('.slug-edit').click(function() {
        $('#edit-slug-btn-1').hide();
        $('#edit-slug-btn-2').show();
        $('#edit-slug-name').hide();
        $('#slug').attr('type', 'text');
    });
    $('.slug-edit-cancel').click(function() {
        $('#slug').attr('type', 'hidden');
        $('#slug').val($('#edit-slug-name').html())
        $('#edit-slug-btn-1').show();
        $('#edit-slug-btn-2').hide();
        $('#edit-slug-name').show();
    });
    $('.slug-save').click(function() {
        checkSlug($('#slug').val());
        $('#slug').attr('type', 'hidden');
        $('#edit-slug-btn-2').hide();
        $('#edit-slug-name').show();
    });

    function checkSlug(title) {
        $.ajax({
            type: "get",
            data: {
                title: title
            },
            url: "/api/v1/" + title_table + "/get-slug",
            beforeSend: function() {
                $('#edit-slug-box').show();
                $('#edit-slug-name').html('<i class="fa fa-refresh fa-spin"></i>');
            },
            success: function (response) {
                $('#slug').val(response.slug);
                $('#edit-slug-btn-1').show();
                $('#edit-slug-name').html(response.slug);
            }
        });
    }
</script>
