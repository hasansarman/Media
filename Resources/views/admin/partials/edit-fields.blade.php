<?php $altAttribute = isset($file->translate($lang)->ALT_ATTRIBUTE) ? $file->translate($lang)->alt_attribute : '' ?>
<div class='form-group{{ $errors->has("{$lang}[ALT_ATTRIBUTE]") ? ' has-error' : '' }}'>
    {!! Form::label("{$lang}[ALT_ATTRIBUTE]", trans('media::media.form.alt_attribute')) !!}
    {!! Form::text("{$lang}[ALT_ATTRIBUTE]", old("{$lang}[ALT_ATTRIBUTE]", $altAttribute), ['class' => 'form-control', 'placeholder' => trans('media::media.form.alt_attribute')]) !!}
    {!! $errors->first("{$lang}[ALT_ATTRIBUTE]", '<span class="help-block">:message</span>') !!}
</div>
<?php $description = isset($file->translate($lang)->DESCRIPTION) ? $file->translate($lang)->DESCRIPTION : '' ?>
<div class='form-group{{ $errors->has("{$lang}[DESCRIPTION]") ? ' has-error' : '' }}'>
    {!! Form::label("{$lang}[DESCRIPTION]", trans('media::media.form.description')) !!}
    {!! Form::textarea("{$lang}[DESCRIPTION]", old("{$lang}[DESCRIPTION]", $description), ['class' => 'form-control', 'placeholder' => trans('media::media.form.description')]) !!}
    {!! $errors->first("{$lang}[DESCRIPTION]", '<span class="help-block">:message</span>') !!}
</div>
<?php $keywords = isset($file->translate($lang)->KEYWORDS) ? $file->translate($lang)->KEYWORDS : '' ?>
<div class='form-group{{ $errors->has("{$lang}[KEYWORDS]") ? ' has-error' : '' }}'>
    {!! Form::label("{$lang}[KEYWORDS]", trans('media::media.form.keywords')) !!}
    {!! Form::text("{$lang}[KEYWORDS]", old("{$lang}[KEYWORDS]", $keywords), ['class' => 'form-control', 'placeholder' => trans('media::media.form.keywords')]) !!}
    {!! $errors->first("{$lang}[KEYWORDS]", '<span class="help-block">:message</span>') !!}
</div>
