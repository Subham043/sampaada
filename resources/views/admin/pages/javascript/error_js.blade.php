<script>

function errorCheck(value){
    value?.map((item)=>{
        tata.error('Error', item, {
            duration: 10000,
            animate: 'slide',
        })
        return false;
    })
}

</script>