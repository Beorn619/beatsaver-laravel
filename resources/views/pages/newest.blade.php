@extends('layout')
@section('title', 'Newest')

@section('content')
    <div class="header">
        <div class="container">
            <h4>Newest Uploads</h4>
        </div>
    </div>

    <div class="container">
        <div class="song-list">
            @for($i = 0; $i < 35; $i++)
                <a href="" class="song-item">
                    <img src="/img/test.jpg">
                    <div class="details">
                        <p class="name">Bad Behavior - The Maine</p>
                        <p class="subname secondary-text">this is subname</p>
                        <p class="downloads secondary-text">{{ number_format(45346) }} downloads</p>
                    </div>
                </a>
            @endfor
        </div>
    </div>
@endsection
<!--
<tr class="song-item">
    <td class="cover">
    </td>
    <td class="details">
        <p class="name">
            Mighty - Caravan Palace
            <span class="secondary-text">This subname</span>
        </p>
        <p class="secondary-text">Uploaded by Hummus</p>
        <p class="bottom">
            <span class="secondary-text"><i class="fas fa-music"></i> 136 BPM</span>
        </p>
    </td>
    <td class="difficulties">
        <code>Easy</code>
        <code>Normal</code>
        <code>Hard</code>
        <code>Expert</code>
        <code>Expert+</code>
    </td>
    <td class="download">
        <p class="secondary-text">{{ number_format(40583) }} Downloads</p>
        <a href="" class="btn">Download</a>
    </td>
</tr>
-->