
@extends('layouts.home')

@section('title')
User Login
@stop

@section('content')


<div class="container">
    
    {{ Form::open(array('route' => 'postLogin', 'class' => 'form-horizontal','id' => 'login-form')) }}
        <legend>Login</legend>

        <div class="form-group ">
            <label for="username" class="col-sm-2 col-md-1 control-label">Username</label>
            <div class="col-sm-8 col-md-9">
                <input type="text" id="username" name="username" class="form-control " />
               
            </div>
            <div class="col-sm-2 col-md-2"></div>
        </div>
        
        
        <div class="form-group ">
            <label for="password" class="col-sm-2 col-md-1 control-label">Password</label>
            <div class="col-sm-8 col-md-9">
                <input type="password" id="password" name="password" class="form-control"  />
            </div>
             <div class="col-sm-2 col-md-2"></div>
        </div>

       
        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-8">
                <button type="submit" class="btn btn-primary">Login</button>

            </div>
        </div>
    {{form::close()}}
        

</div>  

<script>


  $(function () {
    $("#login-form").validate({
        rules:{
            username:{
                required:true,

            },
            

            password:{
                required: true
               
            }
            
        },

        messages:{
           username:{
                required: "attribute feltet skal udfyldes",
            },
           
            password:{
                required: "attribute feltet skal udfyldes",
            }
           
        },

        submitHandler: function(form){
            
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