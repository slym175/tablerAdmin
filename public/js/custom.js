jQuery(document).ready(function () {
    let _tomOptions = {
        plugins: ['remove_button'],
        copyClassesToDropdown: false,
        dropdownClass: 'dropdown-menu',
        optionClass:'dropdown-item',
        controlInput: '<input>',
        render:{
            item: function(data,escape) {
                if( data.customProperties ){
                    return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                }
                return '<div>' + escape(data.text) + '</div>';
            },
            option: function(data,escape){
                if( data.customProperties ){
                    return '<div><span class="dropdown-item-indicator">' + data.customProperties + '</span>' + escape(data.text) + '</div>';
                }
                return '<div>' + escape(data.text) + '</div>';
            },
        }
    }
    document.getElementById('gaurdTomSelector') && window.TomSelect && (new TomSelect(document.getElementById('gaurdTomSelector'), _tomOptions));
    document.getElementById('permissionsTomSelector') && window.TomSelect && (new TomSelect(document.getElementById('permissionsTomSelector'), _tomOptions));

    // Modal confirm delete table row


    jQuery('[data-bs-target="#modal-delete-row"]').click(function () {
        let _form = jQuery(this).data('form');
        let _deleteModalEl = jQuery('#modal-delete-row');
        _deleteModalEl.on('shown.bs.modal', function (event) {
            jQuery(this).find('.comfirmed').click(function () {
                console.log(_form)
                jQuery('#'+_form).find('button[type="submit"]').trigger('click');
            })
        })
    })
})

let inputId = '';
let openFileSelectorModal = (el) => {
    inputId = $(el).data('input-id');
    window.open('/file-manager/fm-button', 'fm', 'width=1200,height=720');
};
function fmSetLink($url) {
    console.log($url)
    let _iput = '[name="'+inputId+'"]';
    $(_iput).val($url);
}
window.fmSetLink = fmSetLink;
