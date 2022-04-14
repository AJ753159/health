<script>
    setTimeout(function () {
      $("#flashmessage").hide();
    }, 2000);
</script>
<style>
    .success{
      background: #00C851;
      width: 10%;
    }

    .fail{
        background: #ff4444;
        width: 10%;
        color: white;
        padding-left: 10px;
        padding-right: 10px;
    }
    .info{
        background: #33b5e5;
        width: 10%;
    }
</style>
@if (session()->has('success'))
  <div class="success" id="flashmessage">
      <p>{{ session('success') }}</p>
  </div>
@endif


@if (session()->has('fail'))
  <div class="fail" id="flashmessage">
      <p>{{ session('fail') }}</p>
  </div>
@endif


@if (session()->has('info'))
  <div class="info" id="flashmessage">
      <p>{{ session('info') }}</p>
  </div>
@endif
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>