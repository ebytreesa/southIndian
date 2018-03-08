@extends('layouts.dashboard')

@section('title')
Edit cityegory
@stop

@section('content')


<div class="container">
    
    {{ Form::open(array('route' => 'postEditCity', 'class' => 'form-horizontal','id' => 'editcity-form', 'files' => true)) }}

    {{ Form::hidden('id', $city->id) }}
        <legend>Edit city</legend>

        <div class="form-group ">
            <label for="name" class="col-sm-2 col-md-1 control-label">Name</label>
            <div class="col-sm-8 col-md-9">
                <input type="text" id="name" name="name" value="{{$city->name}}" class="form-control {{ ($errors->has('name')) ? 'has-error' : '' }}" />
                @if ($errors->has('name'))
                    <strong style="color:red">
                        {{ $errors->first('name') }}
                    </strong>
                   @endif
            </div>
            <div class="col-sm-2 col-md-2"></div>
        </div>

        

        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-8">
                <button type="submit" class="btn btn-primary">Ret</button>

            </div>
        </div>
    {{form::close()}}
        

</div>  

<script>


  $(function () {
    $("#editcity-form").validate({
        rules:{
             name:{
                required:true,

            }
            
        },

        messages:{
            name:{
                required: "attribute feltet skal udfyldes"
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