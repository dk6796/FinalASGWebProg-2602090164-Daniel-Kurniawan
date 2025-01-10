@extends('components.navbar')

@section('title', 'My Profile')

@section('content')
     <div class="d-flex flex-column gap-3 mt-5">
          <div class="text-center fs-1">{{ __('messages.profileTitle') }}</div>
          <div class="d-flex flex-column justify-content-center align-items-center gap-1 mb-5">
               @if (Auth::user()->ProfilePicture == '')         
                    <img src="./profile_picture/Default.png" alt="" class="rounded" style="width:200px; height: 200px;">
               @else
                    <img src="{{ Auth::user()->ProfilePicture }}" alt="" class="rounded" style="width:200px; height: 200px;">
               @endif
               <div class="fs-3 fw-bold">{{ Auth::user()->Username }}</div>
               <div class="fs-4 fw-bold">My Coins : {{ Auth::user()->Coins }}</div>
               <form action="{{ route('topup') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary">Top Up</button>
               </form>
               @error('coins')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
               @enderror
               <div class="d-flex flex-column align-items-center gap-2 mt-3">
                    <div class="fs-3 fw-bold">Avatar Shop</div>
                    <div class="container">
                         <div class="row">
                             @foreach ($avatarList as $a)
                                 <div class="col-md-4">
                                     <div class="d-flex flex-column align-items-center gap-1 mb-4 p-3 rounded bg-light shadow">
                                        <img src="{{ $a->AvatarImage }}" class="rounded" alt="" style="width:150px; height: 150px;">
                                        <div class="fs-4 fw-bold">{{ $a->AvatarName }}</div>
                                        <div class="fs-5 fw-bold">${{ $a->AvatarPrice }}</div>
                                        @if (in_array($a->id, $purchasedAvatars))
                                             @if ($currentAvatar == $a->AvatarImage)
                                                  <button class="btn btn-secondary" disabled>Applied</button>
                                             @else
                                                  <form action="{{ route('applyAvatar') }}" method="POST">
                                                       @csrf
                                                       @method('PUT')
                                                       <input type="hidden" name="avatarImage" value="{{ $a->AvatarImage }}">
                                                       <input type="hidden" name="avatarID" value="{{ $a->id }}">
                                                       <button type="submit" class="btn btn-success">Apply</button>
                                                  </form>
                                             @endif
                                        @else
                                             <form action="{{ route('buyAvatar') }}" method="POST">
                                                  @csrf
                                                  <input type="hidden" name="avatarID" value="{{ $a->id }}">
                                                  <button type="submit" class="btn btn-primary">Buy</button>
                                             </form>
                                        @endif
                                     </div>
                                 </div>
                             @endforeach
                         </div>
                    </div>
               </div>
          </div>
     </div>
@endsection