<script>

function textValidation(value, message) {
    if(value=='' || value.length==0 || value==null || value==undefined || value=='null'){
        tata.error('Error', 'Please enter '+ message, {
            duration: 10000,
            animate: 'slide',
        })
        return false;
    }

    return true;
}

function numberValidation(value, message) {
    if(value=='' || value.length==0 || value==null || value==undefined || value=='null'){
        tata.error('Error', 'Please enter '+ message, {
            duration: 10000,
            animate: 'slide',
        })
        return false;
    }

    return true;
}

function selectValidation(value, message) {
    if(value=='' || value.length==0 || value==null || value==undefined || value=='null'){
        tata.error('Error', 'Please select '+ message, {
            duration: 10000,
            animate: 'slide',
        })
        return false;
    }

    return true;
}

function contentValidation(value, message) {
    if(value=='' || value.length==0 || value== '<p><br></p>' || value==null || value==undefined){
        tata.error('Error', 'Please enter '+ message, {
            duration: 10000,
            animate: 'slide',
        })
        return false;
    }
    return true;
}

function imageValidation(value, message) {
    if( image==null || image==undefined){
        tata.error('Error', 'Please enter '+ message, {
            duration: 10000,
            animate: 'slide',
        })
        return false;
    }
    return true;
}
</script>