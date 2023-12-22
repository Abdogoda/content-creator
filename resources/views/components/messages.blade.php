<div class="notifications"></div>
  @if (count($errors)>0)
    @foreach ($errors->all() as $error)
      <script>
        window.onload = function(){
          createToast('danger', "{{$error}}")
        }
      </script>
    @endforeach
  @endif

  @if ((Session()->has('success')))
    <script>
      window.onload = function(){
        createToast('success', "{{Session()->get('success')}}")
      }
    </script>
  @endif
  @if ((Session()->has('info')))
    <script>
      window.onload = function(){
        createToast('info', "{{Session()->get('info')}}")
      }
    </script>
  @endif
  @if ((Session()->has('warning')))
    <script>
      window.onload = function(){
        createToast('warning', "{{Session()->get('warning')}}")
      }
    </script>
  @endif
  @if ((Session()->has('danger')))
    <script>
      window.onload = function(){
        createToast('danger', "{{Session()->get('danger')}}")
      }
    </script>
  @endif

