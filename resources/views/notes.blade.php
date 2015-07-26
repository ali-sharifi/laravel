@extends('app')

@section('content')
    <h2><b><?php echo Session::get('email');?> - <a href="{{ URL::to('logout') }}">Logout</a></b></h2>


    {!! Form::open(array('files'=>true)) !!}

    @if($errors->any())
        @foreach ($errors->all() as $error)
            <h4><strong style="color: red;">{{$error}}</strong></h4>
        @endforeach
    @endif


    <div class="form-group">
        {!! Form::label('notes', 'Notes') !!}
        @if($notes!=null)
            {!! Form::textarea('notes',$notes->note,['class'=>'form-control']) !!}
        @else
            {!! Form::textarea('notes',null,['class'=>'form-control']) !!}
        @endif
        <hr/>
    </div>

    <div class="form-group">
        {!! Form::label('website', 'Websites') !!}
        <?php
        if ($notes != null) {
            $array = explode("\n", $notes->website);
            $i = 1;
            foreach ($array as $site) {
                echo '<input type="text" class="form-control" value="' . $site . '" name="website' . $i . '" />';
                $i++;
            }
            echo '<input type="text" class="form-control" value="" name="website' . $i . '" />';
        } else {
            echo '<input type="text" class="form-control" value="" name="website1" />';
        }
        ?>
        {{--{!! Form::text('website',$notes->tbd,['class'=>'form-control']) !!}--}}
        <hr/>
    </div>

    <div class="form-group">
        {!! Form::label('images', 'Images') !!}
        @if($notes!=null)
            {!! Form::file('file') !!}
            <br/>
            <?php
            if ($notes->image1 != null) {
                $image = $notes->image1;
                file_put_contents("img1.png", $image);
                echo "<img height='200' width='200' class='img-thumbnail'  src='img1.png'>";
            }?>

            @if($notes->image1 != null)
                {!! Form::label('delete1', 'Delete') !!}
                {!! Form::checkbox('delete1') !!}
            @endif
            <br/>
            <?php
            if ($notes->image2 != null) {
                $image = $notes->image2;
                file_put_contents("img2.png", $image);
                echo "<img height='200' width='200' class='img-thumbnail' src='img2.png'>";
            }?>

            @if($notes->image2 != null)
                {!! Form::label('delete2', 'Delete') !!}
                {!! Form::checkbox('delete2') !!}
            @endif
            <br/>
            <?php
            if ($notes->image3 != null) {
            $image = $notes->image3;
            file_put_contents("img3.png", $image);
            echo "<img height='200' width='200' class='img-thumbnail' src='img3.png'>";
            }?>

            @if($notes->image3 != null)
                {!! Form::label('delete3', 'Delete') !!}
                {!! Form::checkbox('delete3') !!}
            @endif
            <br/>
            <?php
            if ($notes->image4 != null) {
            $image = $notes->image4;
            file_put_contents("img4.png", $image);
            echo "<img height='200' width='200' class='img-thumbnail' src='img4.png'>";
            }?>
            @if($notes->image4 != null)
                {!! Form::label('delete4', 'Delete') !!}
                {!! Form::checkbox('delete4') !!}
            @endif
            <br/>
        @else
            {!! Form::file('file') !!}
        @endif

    </div>

    <hr/>

    <div class="form-group">
        {!! Form::label('tbd', 'tbd') !!}
        @if($notes!=null)
            {!! Form::textarea('tbd',$notes->tbd,['class'=>'form-control']) !!}
        @else
            {!! Form::textarea('tbd',null,['class'=>'form-control']) !!}
        @endif
        <hr/>
    </div>


    <div class="form-group">
        {!! Form::submit('Save',['class'=>'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}

    <br/>



@stop