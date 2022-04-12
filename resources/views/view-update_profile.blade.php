<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css">
    *{
        padding: 0;
        margin:0;
    }
    body{
        background: rgba(131, 103, 123, 0.4);
        /* justify-content: center; */
        /* padding: 140px */
        margin-top: 50px;
        text-align: center;
    }
    select{
        width: 70%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        /* border-radius: 30px; */
    }
    .name{
        display: flex;
        flex-wrap: wrap;
        padding: 20px;
        justify-content: center;
    }
    .name input[type=number]{
        width: 70%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        /* border-radius: 30px; */
    }
    button {
        width: 62px;
        height: 69px;
        background:url("pathology/noun_Search_4341145 2.png");
        border: none;
    }
    button:hover {
        opacity: 0.8;
        cursor: pointer;
    }
    </style>
</head>
<body>
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="/search" enctype="multipart/form-data">
        @csrf
        @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
        <div class="select_rolet">
            <select name="emp_role" required>
                <option>Select Role</option>
                @foreach ($items as $item)
                    {{-- <option value="{{ $key }}" {{ ( $key == $selectedID) ? 'selected' : '' }}> 
                        {{ $value }} 
                    </option> --}}
                    <option value="{{ $item->{'id'} }}">{{$item->{'emp_role'} }}</option>
                @endforeach    
            </select>
            {{-- <input type="number" id="name" placeholder="Enter Employee Id" name="Employee_ID" required> --}}
        </div>
        <div class="name">
            <input type="number" id="name" placeholder="Enter Employee Id" name="Employee_ID" required>
        </div>
        <button type="submit" style="background:url('pathology/noun_Search_4341145 2.png');"> </button>
    </form>
</body>
</html>
