$(document).ready(function(){
    $(document).find('[data-toggle="popover"]').popover();
    $(document).on('click', function (e) {
        $('[data-toggle="popover"],[data-original-title]').each(function () {
            //the 'is' for buttons that trigger popups
            //the 'has' for icons within a button that triggers a popup
            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
                (($(this).popover('hide').data('bs.popover')||{}).inState||{}).click = false  // fix for BS 3.3.6
            }

        });
    });
});

/**
 * General ajax call with an anchor element to inject in
 *
 * @param route
 * @param anchor
 * @param formData
 * @param method
 * @param async
 */
function ajaxCallWithAnchor(route, anchor, formData, method, async){
    $.ajax({
        type: method,
        url: route,
        async: async,
        data: formData,
        success: function(response){
            anchor.html(response.render);
        },
        error: function(jqXHR){
            //reload page if user is loged out
            if(typeof(jqXHR) !== 'undefined' && typeof(jqXHR.status) !== 'undefined' && jqXHR.status === 403){
                window.location.reload();
            }
        }
    });
}
