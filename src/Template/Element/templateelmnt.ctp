<style>
	.mptlflft{float: left;}
</style>
<?php
  $myTemplates = [
 	
    'inputContainer' => '<div class="col-lg-3 mptlflft"><div class="form-group {{type}}">{{content}}</div></div>',
    'label' => '<label class="form-label" {{attrs}}>{{text}}</label>',
    'input' => '{{opentag}}<div class="form-control-wrapper form-control-icon-left"><input class="form-control" type="{{type}}" name="{{name}}"{{attrs}}/>{{icon}}</div>{{closetag}}',
    'select' => '<div class="input-group">{{icon}}<select style="width:1px;" class="select2 form-control select2-hidden-accessible mptlw1" name="{{name}}"{{attrs}}>{{content}}</select></div>',
    'selectMultiple' => '<select name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select>',
    'dateContainer' => '<div class="col-md-4"><div class="form-group">{{content}}</div></div>',
];
$this->Form->templates($myTemplates);

?>