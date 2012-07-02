<?php

abstract class AbstractFormField {
    private $_data = array();     // AbstractFields
    
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
     * @brief Decorates the field bor nicier representation
     * @param type $field 
     */
    protected function decorate($field) {
        $data =  $this->getData();
        $name = $data['name'];
        
        $pretty_field = '
            <div class="frame-wrapper '.$name.'">
                <div class="frame-top">
                    <div class="frame-right">
                        <div class="frame-bottom">
                            <div class="frame-left">
                                <div class="frame-tl">
                                    <div class="frame-tr">
                                        <div class="frame-br">
                                            <div class="frame-bl">
                                                <div class="frame-content">'
                                                    .$field.
                                                '</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        
        return $pretty_field;
    }
    
    
    abstract function render();
}
