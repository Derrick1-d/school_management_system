<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form enctype='multipart/form-data'>
<input type='file' name='img'>
<button name='submit'>Submit</button>
</form>



<script>

$document.ready(function(){

    $('form').submit(function(){
        var form=new FormData(this);
        
        $.ajax({
            url:'processSingle.php',
            method:"POST",
            data:form,
            beforeUpload:function(){
                console.log('sending')
            },
            complete:function(){
                console.log('Process done')
            },
            success:function(){
                console.log('success')
            },
            error:function(err){
                console.log(err)
            },
            dataType:'text',
            contentType:false,
            processData:false

        })
    })

})

</script>

</body>
</html>