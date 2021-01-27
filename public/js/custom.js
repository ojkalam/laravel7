
function selectImage()
{
    console.log(this);
    $("#imgsrc_14").css({"background-color": "transparent", "border": "2px solid green"});
}

$(document).ready(function (e) {

    $("#iamge_upload").on('change',(function(e) {
        e.preventDefault();
        let formData = new FormData();
        formData.append('image', $('#iamge_upload')[0].files[0]);
        formData.append('tags', 'Tipu');

        $.ajax({
            url: "/image-up",
            type: "POST",
            processData: false,
            contentType: false,
            data:formData, // { , tags: 'tipu'},
            beforeSend : function()
            {
                //$("#preview").fadeOut();
                $("#err").fadeOut();
            },
            success: function(data)
            {
                if(data.status=='success')
                {
                    // invalid file format.
                    $("#msg").html(data.msg).fadeIn();
                    $("#preview").attr('src', data.image_src).fadeIn();
                    $("#preview").show();
                }
                else
                {
                    $("#msg").html('Failed to upload').fadeIn();

                }
            }
        });
    }));


    $(".list_image").on('click',(function(e) {
        e.preventDefault();

        $.ajax({
            url: "/get-gellery",
            type: "get",
            success: function(data)
            {

                if(data.status=='success')
                {
                    let htmls = '';
                    for(let index in data.data){
                        let img = data.data[index];
                        htmls += '<div class="col-md-4">\
                            <img id="imgsrc_'+img.id+'" onclick="selectImage()" src="'+img.image_src+'" data-imageid="'+img.id+'" alt="..." width="250px" height="250px" class="img-thumbnail">\
                        </div>';
                    }

                   $(".imagelists").html(htmls).fadeIn();

                }
            }
        });
    }));

    $(document).ajaxStart(function(){
        $('#ajaxProgress').show();
    });
    $(document).ajaxStop(function(){
        $('#ajaxProgress').hide();
    });


});
