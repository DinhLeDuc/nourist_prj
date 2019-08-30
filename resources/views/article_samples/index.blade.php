@if (empty($article_samples))
    <div class="media-empty" style="font-weight: bold; text-align: center; margin-top: 40px;">{{ __('không có tệp tin nào') }}</div>
@else
    <ul>
        @foreach ($article_samples as $key => $data)
            <li id="article-li-{{ $data->id }}?>">
                <input type="radio" id="article-{{ $data->id }}" class="article-sample hidden" name="article-sample" value="{{ $data->id }}"/>
                <label for="article-{{ $data->id }}"><img src="{{ $data->avatar }}" /></label>
            </li>
        @endforeach
    </ul>
@endif