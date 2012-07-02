<?php
    
abstract class AbstractForm {
    private $_form_fields = array();     // AbstractFields
    
    /**
     * @brief Constructor
     * @param array | $form_fields
     *  Holds fields attributes: Name, Type, etc. @TODO: extract to a class
     */
    public function __construct(array $in_form_fields) {
        $this->setFormFields($in_form_fields);
    }
    
    /**
     * @brief Getter for $form_fields
     * @param type $in_form_fields 
     */
    public function getFormFields() {
        return $this->_form_fields;
    }
    
    /**
     * @brief Setter for $form_fields
     * @return array | AbstractField
     */
    public function setFormFields($in_form_fields) {

        // @TODO: add logic - if the input is a single field | is it already present? etc.
        $this->_form_fields = $in_form_fields;
    }
    
    abstract function processSubmission();
    abstract function render();
    protected abstract function heal();     // Vulnerabilities prevention
    protected abstract function validate();
}
