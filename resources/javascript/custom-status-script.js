jQuery(document).ready(
    function ()
    {
        var postStatus = jQuery('#post_status');
        console.log('Custom Status List: ', customPostStatusList);
        if (customPostStatusList != null && customPostStatusList.length > 0) {
            postStatus.empty();
            for (var x = 0; x < customPostStatusList.length; x++) {
                var selected = customPostStatusList[x].selected == true ? ' selected="selected"' : '';
                var option = '<option value="' + customPostStatusList[x].value + '"' + selected + '>' + customPostStatusList[x].text + '</option>';
                postStatus.append(option);
                if (selected != '') {
                    console.log('Setting status to:' + customPostStatusList[x].text);
                    jQuery('#post-status-display').text(customPostStatusList[x].text);
                }
            }
        }
    }
);