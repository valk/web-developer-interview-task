<?php

/**
 * Should be abstracted for multiple formats etc.. but not for the test purposes.
 */
class FileStorage {
    
    private $_form_submission = array();
    
    /**
     * @brief Takes a form submission stores it to a file.
     * @param AbstractForm | $form
     */
    public function __construct(array $form_submission) {
        $this->_form_submission = $form_submission;
    }
    
    /**
     * @brief Masks comma, because it's a special separator-character
     * @param string | $str
     * @returns string |
     */
    public function encode($str) {
        return str_replace(',', '{comma}', $str);
    }
    
    /**
     * @brief Converts masked comma to a real one.
     * @param string | $str
     * @returns string |
     */
    public function decode($str) {
        return str_replace('{comma}', ',', $str);
    }
    
    public function write() {
//        print exec('pwd');
        
        $data = sprintf("%s, %s, %s, %s\n", 
                date("m-j-Y G:i:s"),
                $this->encode($this->_form_submission['full_name']), 
                $this->encode($this->_form_submission['recipient']), 
                $this->encode($this->_form_submission['message'])
                );
        file_put_contents('./form_submissions.txt', $data, FILE_APPEND);
    }
    
}