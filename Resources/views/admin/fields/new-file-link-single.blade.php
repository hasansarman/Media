<div class="form-group">
    {!! Form::label($zone, $name) !!}
    <div class="clearfix"></div>

    <a class="btn btn-primary btn-browse" onclick="openMediaWindowSingle(event, '{{ $zone }}');" <?php echo (isset($media->PATH))?'style="display:none;"':'' ?>><i class="fa fa-upload"></i>
        {{ trans('media::media.Browse') }}
    </a>

    <div class="clearfix"></div>

    <div class="jsThumbnailImageWrapper jsSingleThumbnailWrapper">
        <?php if (isset($media->PATH)): ?>
        <figure data-id="{{ $media->ID }}">
            <?php if ($media->MEDIA_TYPE === 'image'): ?>
            <img src="{{ Imagy::getThumbnail($media->PATH, (isset($thumbnailSize) ? $thumbnailSize : 'mediumThumb')) }}" alt="{{ $media->ALT_ATTRIBUTE }}"/>
          <?php elseif ($media->MEDIA_TYPE === 'video'): ?>
            <video src="{{ $media->PATH }}"  controls width="320"></video>
          <?php elseif ($media->MEDIA_TYPE === 'audio'): ?>
            <audio controls><source src="{{ $media->PATH }}" type="{{ $media->MIMETYPE }}"></audio>
            <?php else: ?>
            <i class="fa fa-file" style="font-size: 50px;"></i>
            <?php endif; ?>
            <a class="jsRemoveSimpleLink" href="#" data-id="{{ $media->pivot->id }}">
                <i class="fa fa-times-circle removeIcon"></i>
            </a>
        </figure>
        <input type="hidden" name="medias_single[{{ $zone }}]" value="{{ $media->ID}}">
        <?php else: ?>
        <input type="hidden" name="medias_single[{{ $zone }}]" value="">
        <?php endif; ?>
    </div>
</div>
