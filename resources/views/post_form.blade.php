@extends('welcome')
@section('browser_title', 'Tweet')
@section('content')
<div class="position-ref full-height">
  <h1>Mini Twitter</h1>
  <h3>Post your update (Tweet)</h3>
  <div class="top-right links">
      <a href="{{ url('/')}}" class="btn btn-primary">Recent Tweets</a>
  </div>
  <div class="alert alert-danger" style="display:none"></div>
  <div class="container">
    <form id="form" name="form" method="POST" action="{{url('/post-save')}}">
      @csrf
    <div class="row">
      <div class="col-25">
        <label for="fname">Your name</label>
      </div>
      <div class="col-75">
        <input type="text" id="full_name" name="full_name" placeholder="Your name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Your message</label>
      </div>
      <div class="col-75">
        <textarea id="message" name="message" placeholder="Write something.." style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
    </form>
  </div>
</div>
@endsection

@section('footer_scripts')
<script type="text/javascript">
  var get_list_route = "{{url('/')}}";

  $(document).ready(function() {
// alert('asdfad');
    $("#message").focusout( function(e) {
        var reg =/<(.|\n)*?>/g; 
        if (reg.test($('#message').val()) == true) {
            alert('HTML Tag are not allowed');
        }
        e.preventDefault();
    });

    $.validator.addMethod("nameRegex", function(value, element) {
        return this.optional(element) || /^[a-zA-Z0-9_\-\s]*$/i.test(value);
    }, "Name must contain only letters, numbers, hyphens, or underscore.");

    $.validator.addMethod("messageRegex", function(value, element) {
        return this.optional(element) || /^[a-zA-Z/\\/_.,\/#$!-\s]+$/i.test(value);
    }, "Message must contain only letters, hyphen, comma, or underscore.");
    var form_id = "#form";
     jQuery(form_id).validate({
      ignore: '',
      rules: {
        'full_name': {
          required: true,
          minlength: 3,
          maxlength: 50,
          nameRegex: true,
        },
        'message': {
          required: true,
          minlength: 50,
          maxlength: 500,
          messageRegex: true,
        },
      },
      submitHandler: function(form) { //alert('asdf');
        let formData = new FormData($(form_id)[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          url: "{{url('/post-save')}}",
          method: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) { console.log(response);
            if (response.success == false) {
            $.each(response.errors, function(key,value) {
              $('.alert-danger').show();
              $('.alert-danger').append('<p>'+value+'</p>');
            });
          } else {
            $('.alert-success').show();
            $('.alert-success').append('<p>'+response.message+'</p>');
            window.location = get_list_route;
          }
          }
        });
      }
     });
  });
</script>
@endsection