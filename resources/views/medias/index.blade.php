@if (empty($medias))
    <div class="media-empty" style="font-weight: bold; text-align: center; margin-top: 40px;">{{ __('không có tệp tin nào') }}</div>
@else
    <ul>
        @foreach ($medias as $key => $media)
            <li id="li-{{ $media->id }}?>">
                <input type="hidden" name="value-id" id ="value-id" value="{{ $media->id }}">
                <input type="checkbox" id="cb{{ $media->id }}" name="check_image_media[]" value="{{ $media->url }}"/>
                <label for="cb{{ $media->id }}"><img src="{{ $media->url }}" /></label>
            </li>
        @endforeach
    </ul>
@endif
