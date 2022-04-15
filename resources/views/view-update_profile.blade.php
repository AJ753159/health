<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <style type="text/css">
    *{
        padding: 0;
        margin:0;
    }
    body{
        background: rgba(131, 103, 123, 0.4);
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
    .danger{
        padding: 12px 20px;
        color: #CC0000
    }
    </style>
    <title>View Update Profile</title>
</head>
<body>
    <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="/search" enctype="multipart/form-data">
        @csrf
        <div class="select_role">
            <select id="emp_role" name="emp_role">
                <option>Select Role</option>
                @foreach ($items as $item)
                    <option value="{{ $item->{'emp_role'} }}">{{$item->{'emp_role'} }}</option>
                @endforeach    
            </select>
            @if ($errors->has('emp_role'))
                <span class="danger">{{ $errors->first('emp_role') }}</span>
            @endif
        </div>
        <div class="name">
            <select id="Employee_ID" name="Employee_ID">
            </select>
            @if ($errors->has('Employee_ID'))
                <span class="danger">{{ $errors->first('Employee_ID') }}</span>
            @endif
        </div>
        <button type="submit" style="background:url('pathology/noun_Search_4341145 2.png');"> </button>
    </form>
    @include('footer')
    <script>
        $("#Employee_ID").append('<option value="0" selected disabled> Select Employee </option>');
        jQuery(document).ready(function(){
            jQuery('#emp_role').change(function(){
                var did=jQuery(this).val();
                // console.log(did);

                var div=jQuery(this).parent()

                var op=" ";
                $.ajax({
                    url: '{!!URL::to('getemployee')!!}',
                    type: "GET",
                    data: {'emp_role':did},
                    success:function(data) {
                        // console.log('success');
                        console.log(data);
                        $("#Employee_ID").empty();
                        $("#Employee_ID").append('<option value=0 selected disabled> Select Employee </option>');
                        for(var i=0; i<data.length;i++){
                            $("#Employee_ID").append('<option value="' +data[i].Employee_ID+'">'+data[i].Employee_name+
                                '</option>');
                        };
                    },
                    error:function(){
                        console.log();
                    }
                });
            });
        });      
    </script>
</body>
</html>
