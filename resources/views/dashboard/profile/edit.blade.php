@extends('layouts.dashboard')
@section('title', 'Edit Profile')
@section('breadcrumb')
  @parent
  <li class="breadcrumb-item active">Edit Profile</li>    
@endsection
@section('content')

<x-alert type='success'/>

<form action="{{ route('dashboard.profile.update') }}" method="post" enctype="multipart/form-data"> 
    @csrf
    @method('patch')
    <div class="form-row">
        <div class="col-md-6">
            <x-form.input type="text" label="First Name" name="first_name" :value="$user->profile->first_name" />
        </div>
    </div>

    <br>

    <div class="form-row">
        <div class="col-md-6">
            <x-form.input type="text" label="Last Name" name="last_name" :value="$user->profile->last_name" />
        </div>
    </div>

    <br>

    <div class="form-row">
        <div class="col-md-6">
            <x-form.input label="Birthday" name="birthday" type="date" :value="$user->profile->birthday" />
        </div>
    </div>

    <br>

    <div class="form-group">
    <label for="">Gender</label>
        <div>
            <div class="form-check">
                    <input class="form-check-input  @error('gender') is-invalid @enderror" type="radio" name="gender" value="male" @if( $user->profile->gender == "male") checked @endif>
                <label class="form-check-label">
                    Male
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" value="female" @if( $user->profile->gender == "female") checked @endif>
                <label class="form-check-label">
                    Female
                </label>
            </div>
        </div>
    </div> 

    <br>


    <div class="form-row">
        <div class="col-md-6">
            <label for="">Country</label>
            <select name="country" class="form-control form-select">
                <option value="">Country</option>
                @foreach ($countries as $value => $text)
                    <option value="{{ $value }}" @if($value == $user->profile->country) selected @endif>
                        {{ $text }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <br>

    <div class="form-row">
        <div class="col-md-6">
            <label for="">Locale</label>
            <select name="locale" class="form-control form-select">
                <option value="">Locale</option>
                @foreach ($locales as $value => $text)
                    <option value="{{ $value }}" @if($value == $user->profile->locale) selected @endif>
                        {{ $text }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <br>

    <div class="form-row">
        <div class="col-md-6">
            <x-form.input type="text" label="Postal Code" name="postal_code" :value="$user->profile->postal_code" />
        </div>
    </div>

    <br>

    <div class="form-row">
        <div class="col-md-6">
            <x-form.input type="text" label="State" name="state" :value="$user->profile->state" />
        </div>
    </div>

    <br>

    <div class="form-row">
        <div class="col-md-6">
            <x-form.input type="text" label="City" name="city" :value="$user->profile->city" />
        </div>
    </div>

    <br>

    <div class="form-row">
        <div class="col-md-6">
            <x-form.input type="text" label="Street Address	" name="street_address" :value="$user->profile->street_address" />
        </div>
    </div>

    <br>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
    
@endsection