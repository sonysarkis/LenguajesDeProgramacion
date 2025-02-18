
<body style="display:flex;
justify-content: center;
align-items:center;
background-color: dimgray;
flex-direction: column;
font-family:sans-serif;
"

>
<h1 style="display: block;">Create new post</h1>

<form  style="display: flex;
flex-direction:column;
justify-content:center;
border-radius:1em;
box-shadow: 0px 0px 7px 0px #000;
background: #fff;
padding: 16px;
position:relative;

" method="POST" action="{{route('posts.store')}}" >
    @csrf
    <label style= "display: flex;
    flex-direction:column;
    justify-content:center;">
        Title<br>
        <input style="border-radius: 1em;
        border: 2px solid dimgray;" name="title" type="text" value="{{ old('title') }}"><br>
        @error('title')
            <small style="color: red">{{ $message}}</small>
            <br>
        @enderror
    </label>
    <label >
        Body <br>
        <textarea style="border-radius: 1em;
        border: 2px solid dimgray;"name="body"  cols="30" rows="10">{{ old('body') }}</textarea><br>
        @error('body')
            <small style="color: red">{{ $message}}</small>
            <br>
        @enderror
    </label>
    <button style="width:20vw;
    margin-left: 8vw;
    margin-top: 2vh;
    border-radius:1em;
    border: 2px solid dimgray;
    
   
    "

     type="submit">Enviar</button>
</form>

<a style="border-radius: 1em;
     text-decoration:none;
     Color:#000;"href="{{route('posts.index')}}">  <==Regresar</a>
</body>