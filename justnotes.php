get page request
- check if submission
    - validate & sanitize
        -if !valid....
            set message....
            $error_fields[];
            $messages = array();
            $messages[] = "This field needs to be a number";
    
        - if valid -> going to submission page
    
    
    
    
    
    
if there are messages... print them.

print implode ('<br>', $messages);