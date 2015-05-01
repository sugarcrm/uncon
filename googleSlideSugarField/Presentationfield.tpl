{include file="modules/DynamicFields/templates/Fields/Forms/coreTop.tpl"}
<tr>
    <td class='mbLBL'>{sugar_translate module="DynamicFields" label="COLUMN_TITLE_DEFAULT_VALUE"}:</td>
    <td>
        {if $hideLevel < 5}
            <input type='text' name='default' id='default' value='{$vardef.default}'
                   maxlength='{$vardef.len|default:50}'>
        {else}
            <input type='hidden' id='default' name='default' value='{$vardef.default}'>{$vardef.default}
        {/if}
    </td>
</tr>
<tr>
    <td class='mbLBL'>{sugar_translate module="DynamicFields" label="COLUMN_TITLE_MAX_SIZE"}:</td>
    <td>
        {if $hideLevel < 5}
            <input type='text' name='len' id='field_len' value='{$vardef.len|default:25}'
                   onchange="forceRange(this,1,255);changeMaxLength(document.getElementById('default'),this.value);">
            <input type='hidden' id="orig_len" name='orig_len' value='{$vardef.len}'>
        {if $action=="saveSugarField"}
        <input type='hidden' name='customTypeValidate' id='customTypeValidate' value='{$vardef.len|default:25}'
               onchange="if (parseInt(document.getElementById('field_len').value) < parseInt(document.getElementById('orig_len').value)) return confirm(SUGAR.language.get('ModuleBuilder', 'LBL_CONFIRM_LOWER_LENGTH')); return true;">
        {/if}
        {literal}
            <script>
                function forceRange(field, min, max) {
                    field.value = parseInt(field.value);
                    if (field.value == 'NaN')field.value = max;
                    if (field.value > max) field.value = max;
                    if (field.value < min) field.value = min;
                }
                function changeMaxLength(field, length) {
                    field.maxLength = parseInt(length);
                    field.value = field.value.substr(0, field.maxLength);
                }
            </script>
        {/literal}
        {else}
            <input type='hidden' name='len' value='{$vardef.len}'>{$vardef.len}
        {/if}
    </td>
</tr>
<tr>
    <td class='mbLBL'>{sugar_translate module="DynamicFields" label="LBL_PRESENTATIONFIELD_URL"}:</td>
    <td>
            <input type="text" id='ext1' name='ext1' value='{$URL}'>
            {$URLNAME}
    </td>
</tr>
{include file="modules/DynamicFields/templates/Fields/Forms/coreBottom.tpl"}
