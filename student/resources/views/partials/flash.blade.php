@if(Session::has('message'))
    <div class="message_flash">
        {{Session::get('message')}}
    </div>
@endif