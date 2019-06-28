$(function(){

    //Method to set validation on email.
    $.validator.addMethod('regex', function(value, element, regexp) {
    if (regexp.constructor != RegExp)
                regexp = new RegExp(regexp);
            else if (regexp.global)
                regexp.lastIndex = 0;
        return this.optional(element) || regexp.test(value);
    });


	$("#profileForm").validate({
        rules: {
            email_address:{
                required: true,
		        regex: /\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i,
            },
            institute_name: {
                required: true,                
            },
            team_name: {
    		    required: true,
    	    },
	        project_name:"required",
	        team_size:{
    		    required: true,
    	    },
            check_declaration:{
                required: true,
            },         
            'team_members_name[]': {
		       required: true,
            },
	        'team_department[]': {
		        required: true,
            },
	        'team_mobileno[]': {
        		required: true,
                number:true,
        		minlength: 10,
                maxlength:10,
            },
    	    'team_emailId[]': {
        		required: true,
        		regex: /\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i,
            },
            'team_file_type_id[]': {
		        required: true,		
            },
        },
        //For custom messages
        messages: {            
    	    email_address:{
                required: "Enter email address",
                regex: "Please enter valid email address.",
            },
            institute_name: {
                required: "Enter institute name",                
            },
            team_name: {
                required: "Enter team name",
    	    },
    	    project_name:{
    		    required: "Select project name",
    	    },
    	    team_size:{
    		    required: "Select team size",
    	    },
    	    check_declaration: {
                required: "Field is mandatory",
            },            
            'team_members_name[]': {
    		    required: "Enter name",
            },
    	    'team_department[]': {
    		    required: "Enter department",
            },
    	    'team_mobileno[]': {
                required: "Enter mobile no.",
        		number: "Enter valid number",
        		maxlength:"Enter no more than 10 digits",
            },
    	    'team_emailId[]': {
        		required: "Enter email address",
        		regex: "Please enter valid email address.",
            },
            'team_file_type_id[]': {
    		    required: "Select file type",		
            },
        },
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error 
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
           } else if($(element).attr("id") == "declaration"){
             element.parent().parent().parent().append(error);
           }else {
            error.insertAfter(element);
          }
        },
        highlight: function (element) { // hightlight error inputs
                 $(element).closest('.input-field').addClass('has-error');
                 $(element).next().children().children().attr('style','border-color:#dd4b39!important');
           // set error class to the control group
           //console.log($(element).attr("name"));
           if($(element).attr("name") == "team_file_type_id[]" || $(element).attr("name") == "project_name" || $(element).attr("name") == "team_size" || $(element).attr("id") == "declaration"){
                $(element).closest('div').addClass('has-error');
                $(element).next().children().children().attr('style','border-color:#dd4b39!important');
           }
        },
    });

    $("#paymentDetailsForm").validate({
        rules: {
            payment_type:{
                required: true,
            },
            transaction_id: {
                required: true,                
            },
            payment_amount: {
                required: true,
                number:true,
            },
        },
        messages: { 
            payment_type: {
                required: "Select payment method",
            },
            transaction_id:{
                required: "Enter transaction Id",
            },
            payment_amount:{
                required: "Enter Amount",
            },
        },
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error 
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error);
          }else {
            error.insertAfter(element);
          }
        },
        highlight: function (element) { // hightlight error inputs
                 $(element).closest('.input-field').addClass('has-error');
                 $(element).next().children().children().attr('style','border-color:#dd4b39!important');
           // set error class to the control group
           //console.log($(element).attr("name"));
           if($(element).attr("name") == "payment_type"){
                $(element).closest('div').addClass('has-error');
                $(element).next().children().children().attr('style','border-color:#dd4b39!important');
           }
        },

    });

});