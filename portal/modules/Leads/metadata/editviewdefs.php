<?php
$viewdefs['Leads']['editview'] = array(
    'templateMeta' => array('maxColumns' => '2', 
                            'widths' => array(
                                            array('label' => '10', 'field' => '30'), 
                                            array('label' => '10', 'field' => '30'),
                                            ),
                            'formId' => 'CaseEditView',
                            'formName' => 'CaseEditView',
                            'hiddenInputs' => array('module' => 'Cases',
                                                    'returnmodule' => 'Cases',
                                                    'returnaction' => 'DetailView',
                                                    'action' => 'Save',
                                                   )
                           ),
    'data' => array(
        array('salutation'),
        array('first_name', 'last_name'),
        array('phone_work', 'phone_mobile'),
        array('phone_home', 'do_not_call'),
        array('email1', 'email2'),
        array('email_opt_out', ''),
        array('title', 'department'),
        array('account_name'),
        array(array('field' => 'primary_address_street', 'displayParams' => array('size' => 100))),
        array('primary_address_city', 'primary_address_state'),
        array('primary_address_postalcode', 'primary_address_country'),
    ),
);
?>
