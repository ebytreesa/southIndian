@extends('layouts.home')

@section('title')
Edit User
@stop

@section('content')


<div class="container">
    
    {{ Form::open(array('route' => 'postEditUser', 'class' => 'form-horizontal','id' => 'editUser-form', 'files' => true)) }}
     {{ Form::hidden('id', $user->id) }} 
        <legend>Edit User</legend>

        <div class="form-group ">
            <label for="username" class="col-sm-2 col-md-1 control-label">Username</label>
            <div class="col-sm-8 col-md-9">
                <input type="text" id="username" name="username" value="{{ $user->username }}" class="form-control {{ ($errors->has('username')) ? 'has-error' : '' }}" />
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
                <input type="text" id="email" name="email" value="{{ $user->email }}" class="form-control"  />
            </div>
             <div class="col-sm-2 col-md-2"></div>
        </div>

         <div class="form-group ">
            <label for="city" class="col-sm-2 col-md-1 control-label">City</label>
            <div class="col-sm-8 col-md-9">
                <input type="text" id="city" name="city" value="{{ $user->city }}" class="form-control"  />
            </div>
             <div class="col-sm-2 col-md-2"></div>
        </div>

        <div class="form-group">
            <label for="role" class="col-sm-2 col-md-1 control-label">Role</label>
            <div class="col-sm-8 col-md-9">

                <select name="role" id="role" class="col-sm-10 form-control">                     
                    <option value="0"  {{ $user->admin == 0 ? 'selected' : 'user' }}>user</option>
                    <option value="1"  {{ $user->admin == 1 ? 'selected' : 'admin' }}>admin</option>
                    <option value="2"  {{ $user->admin == 2 ? 'selected' : 'editor' }}>editor</option>
                
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
            <div class="col-sm-offset-1   col-sm-11  ">
                <button type="submit" class="btn btn-primary">Submit</button>

            </div>
        </div>
    {{form::close()}}
        

</div>  

<script>


  $(function () {
    $("#editUser-form").validate({
        rules:{
            username:{
                required:true,

            },
            email:{
                required:true,
                email:true
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