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
        <div class="select_rolet">
            <select id="emp_role" name="emp_role" required>
                <option>Select Role</option>
                @foreach ($items as $item)
                    {{-- <option value="{{ $key }}" {{ ( $key == $selectedID) ? 'selected' : '' }}> 
                        {{ $value }} 
                    </option> --}}
                    <option value="{{ $item->{'emp_role'} }}">{{$item->{'emp_role'} }}</option>
                @endforeach    
            </select>
            {{-- <input type="number" id="name" placeholder="Enter Employee Id" name="Employee_ID" required> --}}
        </div>
        <div class="name">
            {{-- <input type="number" id="name" placeholder="Enter Employee Id" name="Employee_ID" required> --}}
            <select id="Employee_ID" name="Employee_ID" required>
            </select>
        </div>
        <button type="submit" style="background:url('pathology/noun_Search_4341145 2.png');"> </button>
    </form>
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
                        $("#Employee_ID").append('<option value=0 selected disabled> Select Doctor </option>');
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
