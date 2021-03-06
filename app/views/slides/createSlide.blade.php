@extends('layouts.dashboard')

@section('title')
Create Slide
@stop

@section('content')


<div class="container">
    
    {{ Form::open(array('route' => 'postCreateSlide', 'class' => 'form-horizontal','id' => 'createSlide-form', 'files' => true)) }}
        <legend>Create Slide</legend>

        <div class="form-group ">
            <label for="image" class="col-sm-2 col-md-1 control-label">Billede</label>
            <div class="col-sm-8 col-md-9">
                <input type="file" id="file" name="picture"  class="form-control {{ ($errors->has('picture')) ? 'has-error' : '' }}" />
                @if ($errors->has('picture'))
                    <strong style="color:red">
                        {{ $errors->first('picture') }}
                    </strong>
                   @endif
            </div>
       </div>
        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-8">
                <button type="submit" class="btn btn-primary">Create</button>

            </div>
        </div>
    {{form::close()}}
        

</div>  

@stop