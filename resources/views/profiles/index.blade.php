@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
      <div class="col-3 p-5">
         <img src="{{ $user->profile->profileImage() }}" alt="profile-image" class="rounded-circle w-100" />
      </div>
      <div class="col-9 pt-5">
         <div class="d-flex justify-content-between align-items-baseline pr-3 pb-4">
            <div class="d-flex align-items-center pb-3">
               <h2>{{ $user->username }}</h2>

               <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
            </div>
            
            @can('update', $user->profile)
               <a href="/post/create">Add new post</a>
            @endcan

         </div>
         
         @can('update', $user->profile)
            <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
         @endcan

         <div class="d-flex pb-3">
            <div class="pr-5"><strong>{{ $postsCount }}</strong> posts</div>
            <div class="pr-5"><strong>{{ $followersCount }}</strong> friends</div>
            <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
         </div>
         <div class="pb-1 font-weight-bold">{{$user->profile->title ?? ''}}</div>
         <div>{{ $user->profile->description ?? '' }}</div>
         <div><a href="#">{{ $user->profile->url ?? ''}}</a></div>
      </div>
   </div>

   <div class="row pt-5">
      @foreach($user->posts as $post)
      <div class="col-4 pb-4">
         <a href="/post/{{ $post->id }}">
            <img src="/storage/{{ $post->image }}" class="w-100 pt-5" />
         </a>
      </div>
      @endforeach
   </div>
</div>
@endsection
