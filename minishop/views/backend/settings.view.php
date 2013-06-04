<div id="mainshop" class="clearfix">
    <?php if (Notification::get('success')) Alert::success(Notification::get('success')); ?>
    <?php
    echo (
        Form::open(null).
        '<div class="btn-group">'.
            Form::submit('editJs', __('Save', 'minishop'), array('class' => 'btn btn-small')).
            Html::anchor( __('Cancel', 'minishop'),'index.php?id=minishop',array('class' => 'btn btn-small')).
        '</div>'.
        Html::br(2).
        '<div class="row-fluid">
            <div class="span4">'.
                Form::label('ms_mail', __('Email of Paypal', 'minishop')).
                Form::input('ms_mail', Option::get('ms_mail'), array('class'=>'input-block-level')).Html::br().
                Form::label('ms_currency', __('Currency', 'minishop')).
                '<select name="ms_currency" id="ms_currency" class="input-block-level">'.$current.'</select>'.
                Form::label('ms_tax', __('Tax', 'minishop')).
                Form::input('ms_tax', Option::get('ms_tax'), array('class'=>'input-block-level')).Html::br().
                Form::label('ms_afadd', __('Text after add', 'minishop')).
                Form::input('ms_afadd', Option::get('ms_afadd'), array('class'=>'input-block-level')).Html::br().
                Form::label('ms_chkfail', __('Text error', 'minishop')).
                Form::input('ms_chkfail', Option::get('ms_chkfail'), array('class'=>'input-block-level')).Html::br().
                Form::label('ms_befchk', __('Text before chekout', 'minishop')).
                Form::textarea('ms_befchk', Option::get('ms_befchk'), array('class'=>'input-block-level','rows'=>'3')).Html::br().
            '</div>
            <div class="span6">'.
                Form::label('ms_success', __('Success text', 'minishop')).
                Form::textarea('ms_success', Option::get('ms_success'), array('class'=>'input-block-level','rows'=>'8')).Html::br().
                Form::label('ms_cancel', __('Cancel text', 'minishop')).
                Form::textarea('ms_cancel', Option::get('ms_cancel'), array('class'=>'input-block-level','rows'=>'8')).Html::br().
                Form::hidden('csrf', Security::token()).
                form::close().
            '</div>
        </div>');
        ?>
</div>







