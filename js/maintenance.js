/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


 $(document).ready(function() {
    
            if ($('.ab_subscribe_form').length > 0) {
        // validate form
        $('.ab_subscribe_form').validate({
            submitHandler: function(form) {
                $.post(wpmm_vars.ajax_url, {
                    action: 'wpab_add_subscriber',
                    email: $('.email_input', $('.ab_subscribe_form')).val()
                }, function(response) {
                    if (!response.success) {
                        alert(response.data);
                        return false;
                    }
                    
                    $('.ab_subscribe_wrapper').html(response.data);
                }, 'json');

                return false;
            }
        });}
    console.log("prout!!!!");
            $('#ab_submit')[0].onclick =  function () { 
                $('.ab_subscribe_form').submit();        
            };
        });