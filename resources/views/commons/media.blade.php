<link href="{{ asset('css/media.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/multiupload/css/upload.css') }}" rel="stylesheet" type="text/css" />

<div id="media" class="mb-2">
    <div class="btn btn-light" data-toggle="modal" data-target="#mediaModal" onclick="setMediaAvatar(false)"><i class="fa fa-music" aria-hidden="true"></i> {{ __('media') }}</div>
    <div class="btn btn-light" data-toggle="modal" data-target="#articleModal"><i class="fa fa-file" aria-hidden="true"></i> {{ __('bài viết mẫu') }}</div>

    <!-- Modal media -->
    <div class="modal animated bounceIn" id="mediaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h4 class="modal-title">{{ __('thêm media') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li id="upload-media" class="nav-item"><a class="nav-link" data-toggle="tab" href="#upload-files">{{ __('tải lên tập tin') }}</a></li>
                        <li id="media-list" class="nav-item"><a class="nav-link active" data-toggle="tab" href="#media-library">{{ __('thư viện') }}</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="upload-files" class="tab-pane container upload-files">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div id="upload" class="btn btn-default">
                                        <span><i class="fa fa-upload" aria-hidden="true"></i> {{ __('chọn tập tin') }}<span>
                                    </div>
                                    <span id="status"></span>
                                </div>
                            </div>
                        </div>

                        <div id="media-library" class="tab-pane active">
                            <div id="filter-media">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select name="media_filter_date" id="media_filter_date" class="form-control">
                                                <option value="" selected="selected">{{ __('tất cả') }}</option>
                                                <?php $today=date( 'Y-m-1'); while (date( 'Y', strtotime($today))>= 2017) {?>
                                                <option value="<?=$today?>">
                                                    <?php echo date( 'F Y', strtotime($today));?>
                                                </option>
                                                <?php $month_plus=date( 'Y-m-d', strtotime($today . " -1 month")); $today=$month_plus; } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="key-search-file" placeholder="{{ __('tìm kiếm') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="list-media" class="list-media">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" id="delete-media" data-dismiss="modal"  class="btn btn-danger" disabled='disabled'>{{ __('xóa') }}</button>
                    <button type="button" id="insert-into-post" class="btn btn-primary" disabled='disabled'>{{ __('chèn vào bài viết') }}</button>
                    <button type="button" id="insert-into-avatar" class="btn btn-primary" disabled='disabled'>{{ __('đặt làm ảnh đại diện') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal article -->
    <div class="modal animated bounceIn" id="articleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">{{ __('bài viết mẫu') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="list-article" class="list-media"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="use-article-sample" class="btn btn-primary" disabled='disabled'>{{ __('sử dụng mẫu') }}</button>
                </div>
            </div>
            <div class="loadding-article-sample"><i class="fa fa-refresh fa-spin"></i></div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/multiupload/js/fileuploadmulti.js') }}"></script>
<script src="{{ asset('js/media.js') }}"></script>
