(function($) {
    
    $(document).ready(function() {
        init_clear_input_text();
        init_submit();
    });

    /* Clear the default text when user clicks an input field, and, if nothing
     * was entered, replace with initial text. 
     **/
    function init_clear_input_text() {
        $('.name, .password').focus(function() {
           
           if ($(this).val() == this.defaultValue) {
                $(this).val('');
           }
        });
        
        $('.name, .password').blur(function() {

           if ($(this).val() == '') {
                $(this).val(this.defaultValue);   
           }
        });    
    }
    
    // Clean default values on submission
    //
    function init_submit() {
        $('.submit').click(function() {
            $('input').each(function() {
                if ($(this).val() == this.defaultValue) {
                    $(this).val('');   
               }
            });
        }); 
    }

})(jQuery);



