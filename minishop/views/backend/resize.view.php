<div id="mainshop" class="clearfix">
    <?php if (Notification::get('success')) Alert::success(Notification::get('success'));
    echo (
    Form::open(null).
    '<div class="btn-group">'.
        Form::submit('resizephotos', __('Save', 'minishop'), array('class' => 'btn btn-small')).
        Html::anchor( __('Back', 'minishop'),'index.php?id=minishop',array('class' => 'btn btn-small')).
    '</div>'.
    Html::br(2).
    '<div class="span6">
        <div class="row-fluid">
            <div class="span6">'.
            Form::label('wsmall', __('Insert width in px', 'minishop')).
            Form::input('wsmall', Option::get('ms_width'), array('class'=>'input-block-level')).Html::br(2).
            '</div>
            <div class="span6">'.
            Form::label('hsmall', __('Insert height in px', 'minishop')).
            Form::input('hsmall', Option::get('ms_height'), array('class'=>'input-block-level')).Html::br(2).
           '</div>
        </div>

        <div class="row-fluid">
            <div class="span6">'.
            Form::label('wlarge', __('Insert max width in px', 'minishop')).
            Form::input('wlarge', Option::get('ms_wmax'), array('class'=>'input-block-level')).Html::br(2).
            '</div>
            <div class="span6">'.
            Form::label('hlarge', __('Insert max height in px', 'minishop')).
            Form::input('hlarge', Option::get('ms_hmax'), array('class'=>'input-block-level')).Html::br(2).
            '</div>
        </div>'.
            Form::label('Resize', __('Resize options', 'minishop')).Html::nbsp(2).
            Form::select('Resize', $Resize, Option::get('ms_resize')).Html::Br().Html::br(2).
            Form::hidden('csrf', Security::token()).
            Form::close().
    '</div>');
    ?>
    </div>
</div>




