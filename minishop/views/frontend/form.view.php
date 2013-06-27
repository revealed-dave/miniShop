<?php echo
    Form::open(null ,array('id' =>'ms_formCheckout','class' => 'form-horizontal')).


  '<div class="control-group">'.
    Form::label('ms_name',__('Name *', 'minishop'),array('class'=>'control-label')).
    '<div class="controls">'.
      Form::input('ms_name','',array('class','span4')).Html::nbsp(2).
      '<span id="ms_errorName" style="display:none"><br>'.__('Error empty fields *', 'minishop').'</span>'.
    '</div>
  </div>'.


  '<div class="control-group">'.
    Form::label('ms_email',__('Email *','minishop'),array('class'=>'control-label')).
    '<div class="controls">'.
    Form::input('ms_email','',array('class','span4')).Html::nbsp(2).
    '<span id="ms_errorEmail" style="display:none"><br>'.__('Error empty fields or wrong email', 'minishop').'</span>'.
    '</div>
  </div>'.



  '<div class="control-group">'.
    Form::label('ms_adress1',__('Adress 1','minishop'),array('class'=>'control-label')).
    '<div class="controls">'.
    Form::input('ms_adress1','',array('class','span4')).Html::nbsp(2).
    '</div>
  </div>'.



  '<div class="control-group">'.
    Form::label('ms_adress2',__('Adress 2','minishop'),array('class'=>'control-label')).
    '<div class="controls">'.
    Form::input('ms_adress2','',array('class','span4')).Html::nbsp(2).
    '</div>
  </div>'.



  '<div class="control-group">'.
    Form::label('ms_locality',__('Locality','minishop'),array('class'=>'control-label')).
    '<div class="controls">'.
    Form::input('ms_locality','',array('class','span4')).Html::nbsp(2).
    '</div>
  </div>'.




  '<div class="control-group">'.
    Form::label('ms_country',__('Country','minishop'),array('class'=>'control-label')).
    '<div class="controls">'.
    Form::input('ms_country','',array('class','span4')).Html::nbsp(2).
    '</div>
  </div>'.




  '<div class="control-group">'.
    Form::label('ms_phone',__('Phone','minishop'),array('class'=>'control-label')).
    '<div class="controls">'.
    Form::input('ms_phone','',array('class','span4')).Html::nbsp(2).
    '</div>
  </div>'.




  '<div class="control-group">'.
    Form::label('ms_comment',__('Comments','minishop'),array('class'=>'control-label')).
    '<div class="controls">'.
    Form::textarea('ms_comment','',array('rows'=>'5','class'=>'span6')).Html::br(2).
    '<b>'.__('Items','minishop').':</b><span id="items" class="simpleCart_quantity"></span>'.Html::br().
    '<b>'.__('Total','minishop').': </b><span id="total" class="simpleCart_grandTotal"></span>'.
    '</div>
  </div>'.




  '<div class="control-group">'.
    '<div class="controls">'.
      '<label class="checkbox">'.
        Form::checkbox('imnotarobot').__('Check if are not a robot *','minishop').
      '</label>'.
        Form::hidden('ms_purchased').
        Form::hidden('ms_total').
        Form::hidden('csrf', Security::token()).Html::br().
        Form::submit('ms_submit',__('Save', 'minishop'), array('class' => 'btn','onclick' => 'validate();')).
    '</div>'.
  '</div>'.
  Form::close();
?>


<script>
    var checkForm = document.getElementById('ms_formCheckout');
    if(checkForm){checkForm.onsubmit = function(){return validate();}};

    function validate(){
        var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        var errorName = document.getElementById('ms_errorName');
        var thisName  = document.getElementById('ms_name');
        if (thisName.value == '') {thisName.focus();errorName.style.display='inline-block';return false;}
        else if(thisName.value > '') {errorName.style.display='none';}

        var errorEmail  = document.getElementById('ms_errorEmail');
        var thisEmail   = document.getElementById('ms_email');
        if (reg.test(thisEmail.value) == '') {thisEmail.focus();errorEmail.style.display='inline-block';return false;}

        getAttr();
        return true;
    }


    function getAttr(){
      var items = document.getElementById('items').textContent;
      var total = document.getElementById('total').textContent;
      document.getElementById('ms_purchased').value = items;
      document.getElementById('ms_total').value = total;
    }
</script>