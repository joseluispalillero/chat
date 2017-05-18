<?php
if (!function_exists('chat_live')) {
    function chat_live($options)
    {
        $chat__appKey = config('Chat.broadcast.pusher.app_key');
        $chat__appName = config('Chat.broadcast.app_name');

        $chat__userChannel['name'] = isset($options['user']['id']) ? $chat__appName.'-user-'.$options['user']['id'] : '';
        $chat__conversationChannel['name'] = isset($options['conversation']['id']) ? $chat__appName.'-conversation-'.$options['conversation']['id'] : '';
        $chat__userChannel['callback'] = isset($options['user']['callback']) ? $options['user']['callback'] : [];
        $chat__conversationChannel['callback'] = isset($options['conversation']['callback']) ? $options['conversation']['callback'] : [];

        return view('Chat::pusherjs', compact('chat__appKey', 'chat__userChannel', 'chat__conversationChannel'))->render();
    }
}
