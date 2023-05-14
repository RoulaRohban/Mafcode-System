<a class="nav-link float-right" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            <span class="nav-icon">
                                <i class="flaticon2-gear"></i>
                            </span>
</a>
<div class="dropdown-menu">
    <a class="dropdown-item" onclick="generateTranslationInput('ar','{{ $id }}')" >@lang('languages.ar')</a>
</div>


<script>
    let key = 1;
    function generateTranslationInput(local,elementId)
    {

        let element = $('#'+elementId);
        let clonedElement = element.clone();
        let oldName = clonedElement.attr('name');
        let newName = 'translations['+oldName+']['+key+'][value]';
        clonedElement.removeAttr('id');
        clonedElement.val('');

        let hiddenElement = clonedElement.clone();
        hiddenElement.attr('type','hidden');
        hiddenElement.attr('name','translations['+oldName+']['+key+'][local]');
        hiddenElement.val(local);

        clonedElement.attr('name',newName);
        clonedElement.attr('placeholder','set the ' + local + ' translation');
        clonedElement.insertAfter(element);
        hiddenElement.insertAfter(clonedElement);
        key++;


    }
</script>
