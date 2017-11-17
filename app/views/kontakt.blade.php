{{-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Kontakt</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/stylesheet.css" rel="stylesheet">

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</head> --}}
{{-- <body> --}}

@extends('layouts.home')

@section('title')
kontakt
@stop

@section('content')


<div class="container">
	{{-- <form id="contact-form" class="form-horizontal"> --}}
	{{ Form::open(array('route' => 'postKontakt', 'class' => 'form-horizontal','id'=>'contact-form')) }}
		<legend>Kontakt</legend>

        <div class="form-group ">
            <label for="fullname" class="col-sm-1 control-label">Navn</label>
            <div class="col-sm-9">
                <input type="text" id="fullname" name="name" class="form-control" />
            </div>
            <div class="col-sm-2"></div>
        </div>
        
        <div class="form-group">
            <label for="email" class="col-sm-1 control-label">E-mail</label>
            <div class="col-sm-9">
                <input type="text" id="email" name="email" class="form-control"  />
            </div>
             <div class="col-sm-2"></div>
        </div>

         <div class="form-group ">
            <label for="message" class="col-sm-1 control-label">Besked</label>
            <div class="col-sm-9">
                <textarea type="textarea" id="message" name="message" class="form-control" rows="5" cols="40"></textarea>
            </div>
             <div class="col-sm-2"></div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-9">
                <button type="submit" class="btn btn-primary">Submit</button>

            </div>
        </div>
    {{form::close()}}
		
	</div>  

<script>

  $(function () {
	$("#contact-form").validate({
		rules:{
		name:{
				required:true
			},
			email:{
				required:true,
				email:true
			},
			message:{
				required:true
			}
		},

		messages:{
			name:{
				required: "please enter your name"
			},
			email:{
				required: "please enter your email",
				email: "please enter a valid email"
			},
			message:{
				required: "write your message here"
			}
		},

		submitHandler: function(form){
			alert("form is submitting");
			form.submit();
		},
		

		 highlight: function (element, errorClass) {
                 $(element).closest('.form-group').addClass('has-error');
        } ,

          unhighlight: function (element, errorClass) {
                $(element).closest('.form-group').removeClass('has-error');
             },   
           

             	});

	});
	</script>

@stop