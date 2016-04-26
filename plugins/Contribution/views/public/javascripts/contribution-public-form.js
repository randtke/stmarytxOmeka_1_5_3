function enableContributionAjaxForm(url) {
    jQuery(document).ready(function() {
        // Div that will contain the AJAX'ed form.
        var form = jQuery('#contribution-type-form');
        // Select element that controls the AJAX form.
        var contributionType = jQuery('#contribution-type');
        // Elements that should be hidden when there is no type form on the page.
        var elementsToHide = jQuery('#contribution-confirm-submit, #contribution-contributor-metadata');
        // Duration of hide/show animation.
        var duration = 400;

        // Remove the noscript-fallback type submit button.
        jQuery('#submit-type').remove();

        // When the select is changed, AJAX in the type form
        contributionType.change(function () {
            var value = this.value;
            elementsToHide.hide();
            form.hide(duration, function() {
                form.empty();
                if (value != "") {
                    jQuery.post(url, {contribution_type: value}, function(data) {
                       form.append(data); 
                       form.show(duration, function() {
                           form.trigger('contribution-form-shown');
                           elementsToHide.show();
                       });
                    });
                }
            });
        });
    });
}
