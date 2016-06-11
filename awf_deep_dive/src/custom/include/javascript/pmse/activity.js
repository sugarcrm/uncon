/**
 * Gets custom action context menu addition
 * @return {object} Action definition for a context menu
 */
AdamActivity.prototype.customContextMenuActions = function() {
    return [{
        name: 'CAPITALIZE_NAME',
        text: 'Capitalize Record Name'
    }]
}

/**
 * Gets a custom action definition for rendering
 * @param {string} type The action type
 * @param {object} w Window definition
 * @return {object} Definition for the custom action
 */
AdamActivity.prototype.customGetAction = function(type, w) {
    switch (type) {
        case 'CAPITALIZE_NAME':
            // We should really use translate here for i18n
            var actionText = 'Capitalize Record Name';
            var actionCSS = 'adam-menu-icon-configure';
            var disabled = true;
            return {actionText: actionText, actionCSS: actionCSS, disabled: disabled};
    }
}

/**
 * Needed to define the modal that pops up with a form
 * @param {string} type The action type
 * @return {object} Definition needed for a modal
 */
AdamActivity.prototype.customGetWindowDef = function(type) {
    switch(type) {
        case 'CAPITALIZE_NAME':
            var wWidth = 500;
            var wHeight = 140;
            var wTitle = 'Capitalize Record Name';
            return {wWidth: wWidth, wHeight: wHeight, wTitle: wTitle};
    }
}