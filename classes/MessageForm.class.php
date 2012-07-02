<?php

class MessageForm extends AbstractForm {
    
    /**
     * @brief Setter for $form_fields
     * @return array | AbstractField
     */
    public function setFormFields($in_form_fields) {    
        // @TODO: add logic - if the input is a single field | is it already present? etc.
        $this->_form_fields = $in_form_fields;
        
    }
    
     /**
     * @brief Getter for $form_fields
     * @param type $in_form_fields 
     */
    public function getFormFields() {
        return $this->_form_fields;
    }
    
    /**
     * Returns current form's submitted values in a very dirty way.
     *  Just for the test purposes, and to win the time.
     */
    public function getSubmittedValues() {
        $values = array();
        
        foreach ($_POST as $key => $field) {
            if ($key == 'submit') {
                continue;
            }
            $values[$key] = $field;
        }
        
        return $values;
    }
    
    
    protected function validate() {
        
        // A simple validation for non-emptiness
        //
        $valid = true;
        foreach ($this->getSubmittedValues() as $key => $field) {
            $valid &= !empty($field);
        }
        
        return $valid;
    }

    /**
     * @brief Detect attacks and clean them.
     */
    protected function heal() {
        // @TODO: detect SQL injections, CSRF etc.
    }
    
    
    public function processSubmission() {
        
        $this->heal();
        
        $form_is_valid = $this->validate();
        
        // store to DB
        if ($form_is_valid) {

            $message_writer = new FileStorage($this->getSubmittedValues());
            $message_writer->write();
            
            print "<h3 class='feedback thank'>You're amazing!</h3>";
        }
        else {
            print "<strong class='feedback error'>Something is missing but everything is required!</strong>";
        }
    }
    
    
    /**
     * @brief: Builds a rendered form. 
     * @return string | A form, ready for sending to the client.
     *   On GET, renders a new form.
     *   On POST, process submission, and render the form.
     */
    public function render() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->processSubmission();
        }
        
        $form = '<form class="message_form" name="message_form" action="index.php" method="post">';
        $fields = $this->getFormFields();
        foreach ($fields as $field) {
            $form .= $field->render();
        }
        $form .= '</form>';
        
        return $form;
    }
}
