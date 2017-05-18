<script src="https://js.pusher.com/3.2/pusher.min.js"></script>
<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    console.log('Chat');
    var pusher = new Pusher('{{$chat__appKey}}', {
        encrypted: true
    });

    @if(!empty($chat__userChannel['name']))
    var userChannel = pusher.subscribe('{{$chat__userChannel['name']}}');
    userChannel.bind('chat-send-message', function(data) {
        @foreach($chat__userChannel['callback'] as $callback)
        {!! $callback . '(data)'  !!}
        @endforeach
    });
    @endif

    @if(!empty($chat__conversationChannel['name']))
    var conversationChannel = pusher.subscribe('{{$chat__conversationChannel['name']}}');
    conversationChannel.bind('chat-send-message', function(data) {
        @foreach($chat__conversationChannel['callback'] as $callback)
        {!! $callback . '(data)'  !!}
        @endforeach
    });
    @endif
</script>
