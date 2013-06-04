<div id="mainshop" class="clearfix">
    <?php if (Notification::get('success')) Alert::success(Notification::get('success'));
        echo (
        Form::open(null, array('enctype' => 'multipart/form-data')).
        '<div class="btn-group">'.
            Form::submit('addProdct', __('Save', 'minishop'), array('class' => 'btn btn-small')).
            Html::anchor( __('Back', 'minishop'),'index.php?id=minishop',array('class' => 'btn btn-small')).
        '</div>'.
        Html::br(2).
        '<div class="span4">'.
            '<div class="row-fluid">
                <div class="span6">'.
                    Form::label('product', __('Add new category', 'minishop')).
                    Form::input('product', '', array('class'=>'input-block-level')).Html::br(2).
                '</div>
                <div class="span6">'.
                    Form::label('tag', __('Or select Category', 'minishop')).
                    Form::select('tag', $tags,null, array('class'=>'input-block-level','onChange' =>'OnDropDownChange(this);')).
                '</div>
            </div>
            <div class="row-fluid">
                <div class="span6"><div class="custom-input-file">'.
                    __('Add Image 1', 'minishop').
                    Form::file('image1',array('class'=>'input-file')).
                    '<div class="archive">...</div>'.
                '</div></div>
                <div class="span6"><div class="custom-input-file">'.
                    __('Add Image 2', 'minishop').
                    Form::file('image2',array('class'=>'input-file')).
                    '<div class="archive">...</div>'.
                '</div></div>
            </div>
            <div class="row-fluid">
                <div class="span6"><div class="custom-input-file">'.
                     __('Add Image 3', 'minishop').
                    Form::file('image3',array('class'=>'input-file')).
                    '<div class="archive">...</div>'.
                '</div></div>
                <div class="span6"><div class="custom-input-file">'.
                    __('Add Image 4', 'minishop').
                    Form::file('image4',array('class'=>'input-file')).
                    '<div class="archive">...</div>'.
                '</div></div>
            </div>

            <div class="row-fluid">
                <div class="span6">'.
                    Form::label('price', __('Price', 'minishop')).
                    Form::input('price', '', array('class'=>'input-block-level')).
                 '</div>
                 <div class="span6">'.
                    Form::label('size', __('size', 'minishop')).
                    Form::input('size', '', array('class'=>'input-block-level')).
                '</div>
            </div>'.
            Html::br(2).
            '<div class="row-fluid">
                <div class="span6">'.
                    Form::label('color', __('color', 'minishop')).
                    Form::input('color', '', array('class'=>'input-block-level')).
                '</div>
                <div class="span6">'.
                    Form::label('stock', __('Add stock', 'minishop')).
                    Form::input('stock', '', array('class'=>'input-block-level')).Html::br(2).
                '</div>
            </div>
        </div>
        <div class="span5">'.
            Form::label('title', __('Title', 'minishop')).
            Form::input('title', '', array('class'=>'input-block-level')).Html::br(2).
            Form::label('description', __('Insert description', 'minishop')).
            Form::textarea('description', '', array('class'=>'input-block-level','rows'=>'5')).Html::br(2).
            Form::hidden('csrf', Security::token()).
        '</div>'.
            Form::close());
    ?>
</div>

<script src="<?php echo Option::get('siteurl');?>plugins/minishop/lib/js/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

 <script type="text/javascript">
    // function for select category
    function OnDropDownChange(dropDown) {
        var selectedValue = dropDown.options[dropDown.selectedIndex].text;
        document.getElementById("product").value = selectedValue;
    }
 </script>