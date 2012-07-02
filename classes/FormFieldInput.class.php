<?php

// @TODO: Inherit this by the rendering type, eg. JSON / XML / HTML etc..
// Current implementation is HTML
        
class FormFieldInput extends AbstractFormField {
    
    /**
     * @brief Constructor
     * @param array | $field_params
     *  Holds fields attributes: Name, Type, etc. @TODO: extract to a class
     */
    public function __construct(array $in_data) {
        $this->_data = $in_data;
    }
    
    /**
     * @brief Getter for $_data
     * @return array | Form Field Data
     */
    public function getData() {
        return $this->_data;
    }
    
    /**
     * @brief Setter for $_data
     * @param type $in_data 
     */
    public function setData(array $in_data) {
        // @TODO: add logic - if the input is a single field | is it already present? etc.
        $this->_data = $in_data;
    }
    
    /**
     * 
     */
    function render() {
        
        $name = $this->_data['name'];
        $class = $this->_data['html_class'];
        $value = $this->_data['value'];
        
        return $this->decorate("<input type='input' name='$name' class='$class' value='$value' />"); 
    }
}
