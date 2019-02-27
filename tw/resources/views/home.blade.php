@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}さんのタイムライン</div>

                @foreach ($tweets as $tweet)

                <div class="card-body">
                    {{ $tweet->tweet }}
                    
                    
<?php
                      // dd(strpos($tweet,'https://www.youtube.com/watch?v=') !== false);

                      if (strpos($tweet->tweet,'https://www.youtube.com/watch?v=') !== false) {
                        //URLからYoutubeIDを取得
                        $youtubeUrl = $tweet->tweet;
                        list($url , $id) = explode('=' , $youtubeUrl);               
?>
                        <iframe width="400" height="225" src="https://www.youtube.com/embed/{{$id}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


<?php


                      }else{


                      }
?>
                        





                    @if(empty($tweet->image))
                    @else
                    <br>
                    <img alt="" width="220" height="auto" src="{{ asset($tweet->image) }}" >
                    @endif

                    <br>
                    <div style="display:flex; justify-content: left;align-items: center;">
                        <div style="float:left">
                          {{ $tweet->getUser() }} / {{ $tweet->created_at }} 
                      </div>
                      <div style="float:left" class="heart"></div>

                      @if($tweet->user_id == Auth::id())
                      <?php
                        //formのIDを作る

                      ?>
                      <form
                      id=""
                      style="display: inline-block;"
                      method="POST"
                      action="{{ route('tweet_delete',['tweet' => $tweet]) }}"
                      >
                      @csrf
                      <?php //@method('DELETE') ?>

                      <button class="btn far fa-trash-alt"></button>
                      
                      
                  </form>
                    @else
                    @endif


                  </div>
                  
              </div>

              <hr style="margin-top:0px; margin-bottom:0px">

              

          @endforeach

                <!-- <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div> -->
            </div>

            <?php //{{ $tweets->links() }} ?>
        </div>
    </div>
</div>
@endsection
