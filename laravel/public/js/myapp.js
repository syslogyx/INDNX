baseUrl = "";
 // baseUrl = "/app/public";

$(function () {
    // onSizeSelection();

    $('#declaration').change(function () {
        // this.value = this.checked ? 1 : 0;
        if($(this). prop("checked") == true){
            this.value = 1;
        }else{
            this.value = 0;
            $('#declaration').valid();
        }
    });
    
});

var documentFileTypes = {
    1: 'Aadhar Card',
    2: 'Pan Card',
    3: 'College Id'
};



function onSizeSelection() {
    console.log(documentFileTypes);
    var teamSectionCount = $("#team_size").val();
    var divNumberElement = '';
    for (var i = 1; i <= teamSectionCount; i++) {
        divNumberElement +=
                '<div id="repeat_number" repeatCount="' + i + '">' +
                '<div class="row" style="margin-bottom: 0px;">' +
                '<div class="col s6">' +
                '<span><b>Team Member ' + i + '</b></span>' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="input-field col s6">' +
                '<input id="team_members_name' + i + '" name="team_members_name[]" type="text" class="validate" required>' +
                '<label for="team_members_name' + i + '">Name <span class="mandatory">*</span></label>' +
                '</div>' +
                '<div class="input-field col s6">' +
                '<input id="team_department' + i + '" name="team_department[]" type="text" class="validate" required>' +
                '<label for="team_department' + i + '">Department <span class="mandatory">*</span></label>' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="input-field col s6">' +
                '<input id="team_mobileno' + i + '" name="team_mobileno[]" type="text" class="validate" required>' +
                '<label for="team_mobileno' + i + '">Mobile No. <span class="mandatory">*</span></label>' +
                '</div>' +
                '<div class="input-field col s6">' +
                '<input id="team_emailId' + i + '" name="team_emailId[]" type="text" class="validate" required>' +
                '<label for="team_emailId' + i + '">Email Id <span class="mandatory">*</span></label>' +
                '</div>' +
                '</div>' +
                '<div class="row">' +
                '<div class="col s4">' +
                '<label for="name="team_file_type_id' + i + '">File Type (Max 1 MB)<span class="mandatory">*</span></label>' +
                '<select class="browser-default" id="team_file_type_id' + i + '" name="team_file_type_id[]" required>' +
                '<option value="" selected disabled>Choose File Type</option>' +
                '<option value="1">Aadhar Card</option>' +
                '<option value="2">Pan Card</option>' +
                '<option value="3">College Id</option>' +
                '</select>' +
                '</div>' +
                '<div class="col s4" style="margin-top: 35px;">' +
                '<a class="waves-effect waves-light btn uploaderBtn" data-index="'+i +'"><i class="material-icons right">file_upload</i>Upload File</a>' +
                '</div>' +
                '<div class="input-field col s4">' +
                '<input id="file_name' + i + '" name="file_name[]" value=""  type="hidden" class="validate" disabled>' +
                '<label for="file_name" style="margin-top: 15px;"></label>' +
                '<input id="file_id' + i + '" name="file_id[]" value="" type="hidden">' +
                '</div>' +
                '</div>' +
                '</div>';
    }
    $("#parent_Div").html('').html(divNumberElement);
}


var form = $("#fileUploadForm");
var formData = new FormData(form[0]);

var lastUploadCalled = null;
$("form#fileUploadForm").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: baseUrl+"/file/upload",
        type: 'POST',
        dataType:"json",
        data: formData,
        success: function (data) {  
            // console.log(data);         
            // console.log(data.id);         
            $ele = $("#file_name"+ lastUploadCalled);
            $("#file_id"+ lastUploadCalled).val(data.id);
            // console.log($("#file_name"+ lastUploadCalled));         
            $ele.val(data.id);
            $ele.next("label").text("1 File Selected");
            $("#fileUploadModal").modal("close");
            
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            swal("File is too large or invalid.", "", "error");
            
  },
        cache: false,
        contentType: false,
        processData: false
    });
});


jQuery.extend(jQuery.validator.messages, {    
    remote: "This Team name should be unique."
    
});

$("body").on("click",".uploaderBtn",function(){
    
    lastUploadCalled = $(this).attr("data-index");
    $("#fileUploadModal").modal("open");
    $("#fileUploadForm")[0].reset();
});

// $('#profileForm').on('change', function(event) {  // when the value changes
//     var t= event.target.id;
//     var validator = $( "#profileForm").validate();
//     validator.element( '#'+t );

// });

// var errorClass = "invalid";
// var validClass = "valid";
// $( "#profileForm" ).validate({
//   rules: {
//     team_name: {
//       required: true,
//        remote: {
//                 type: 'get',
//                 url: baseUrl + '/team/validate-name',                
//                 dataType: 'json'
//     }
// }
//   },
//   highlight: function(element, errorClass, validClass) {
//       $(element).addClass(errorClass).removeClass(validClass);
//       console.log("highlight",$(element).attr("class"));
//     },
//     unhighlight: function(element, errorClass, validClass) {
//      $(element).removeClass(errorClass).addClass(validClass);
//       console.log("unhighlight",$(element).attr("class"));
//     }
// });

$(document).on('submit','#profileForm',function(){
    if(this.valid()){
        return true;
    }else{
        return false;
    }

});

$(document).on('submit','#paymentDetailsForm',function(){
    if(this.valid()){
        return true;
    }else{
        return false;
    }

});

function showImage(filename){
    $("#imgDrawingArea").attr("src",filename);
    $("#modal1").modal("open");
}
//method for viewing uploaded customer icon 
// function showImage(id){
//   var imageId = $('#'+id).val();
//   if(imageId){
//         $.ajax({
//               url : "/products/get-token",
//               type: "GET",
//               success : function(response){
//                 response = JSON.parse(response);
//                 token = response["token"];
//                 host_url = response["host"];
//                 token = token.replace(/\+/g,'%2B');
//                 //console.log(token);
//                 url = host_url+'download/resource/'+imageId+'?token='+token;
//                 // console.log(url);
//                 $("#imgDrawingArea").attr("src",url);
//             }
//         }); 

//         $('#iconModal').modal("show");
//     }else{
//         toastr.warning("File doesn't exist.");
//     }

// }

