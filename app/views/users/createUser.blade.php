@extends('layouts.dashboard')

@section('title')
Create User
@stop

@section('content')


<div class="container">
    
    {{ Form::open(array('route' => 'postCreateUser', 'class' => 'form-horizontal','id' => 'register-form', 'files' => true)) }}
        <legend>Create User</legend>

        <div class="form-group ">
            <label for="username" class="col-sm-2 col-md-1 control-label">Username</label>
            <div class="col-sm-8 col-md-9">
                <input type="text" id="username" name="username" class="form-control {{ ($errors->has('username')) ? 'has-error' : '' }}" />
                @if ($errors->has('username'))
            <strong style="color:red">
                {{ $errors->first('username') }}
            </strong>
        @endif
            </div>
            <div class="col-sm-2 col-md-2"></div>
        </div>
        
        <div class="form-group">
            <label for="email" class="col-sm-2 col-md-1 control-label">E-mail</label>
            <div class="col-sm-8 col-md-9 ">
                <input type="text" id="email" name="email" class="form-control"  />
            </div>
             <div class="col-sm-2 col-md-2"></div>
        </div>

        <div class="form-group ">
            <label for="password" class="col-sm-2 col-md-1 control-label">Password</label>
            <div class="col-sm-8 col-md-9">
                <input type="password" id="pass1" name="pass1" class="form-control"  />
            </div>
             <div class="col-sm-2 col-md-2"></div>
        </div>

        <div class="form-group ">
            <label for="pass2" class="col-sm-2 col-md-1 control-label">confirm Password</label>
            <div class="col-sm-8 col-md-9">
                <input type="password" id="pass2" name="pass2" class="form-control"  />
            </div>
             <div class="col-sm-2 col-md-2"></div>
        </div>

        <div class="form-group ">
            <label for="city" class="col-sm-2 col-md-1 control-label">City</label>
            <div class="col-sm-8 col-md-9">
                <input type="text" id="city" name="city" class="form-control"  />
            </div>
             <div class="col-sm-2 col-md-2"></div>
        </div>

        <div class="form-group">
            <label for="role" class="col-sm-2 col-md-1 control-label">Role</label>
            <div class="col-sm-8 col-md-9">
                <select name="role" id="role" class="col-sm-10 form-control"> 
                    <option value="0">user</option>
                    <option value="1">admin</option>
                    <option value="2">editor</option>
                </select>
            </div>
        </div>

         <div class="form-group">
            <label for="picture" class="col-sm-2 col-md-1 control-label">Billede</label>
            <div class="col-sm-8 col-md-9">
                <input type="file" name="picture" id="file" class="formm-control" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-primary">Submit</button>

            </div>
        </div>
    {{form::close()}}
        

</div>  

<script>


  $(function () {
    $("#register-form").validate({
        rules:{
            username:{
                required:true,

            },
            email:{
                required:true,
                email:true
            },

            pass1:{
                required: true,
                minlength: 6
            },

            pass2:{
                required: true,
                equalTo: '#pass1'                               
            }
            
        },

        messages:{
            username:{
                required: "attribute feltet skal udfyldes",
            },
            email:{
                required: "attribute feltet skal udfyldes",
                email: "skriv en gyldig email adresse"
            },
            pass1:{
                required: "attribute feltet skal udfyldes",
                minlength: "attribute feltet skal være min 6 tegn"
            },
            pass2:{
                required: "attribute feltet skal udfyldes",
                equalTo: "koderne er ikke ens"
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