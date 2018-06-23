@extends('layout')
@section('title', 'Newest')

@section('content')
    <div class="header">
        <div class="container">
            <h4>Newest Uploads</h4>
        </div>
    </div>

    <div class="song-list">
        <div class="container">

            <table class="table">
                @for($i = 0; $i < 35; $i++)
                    <tr class="song-item">
                        <td class="cover">
                            <img src="/img/test.jpg">
                        </td>
                        <td class="details">
                            <p class="name">
                                Mighty - Caravan Palace
                                <span class="secondary-text">This subname</span>
                            </p>
                            <p class="secondary-text">Uploaded by Hummus</p>
                            <p class="bottom">
                                <span class="secondary-text">136 BPM</span>
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
                @endfor
            </table>
        </div>
    </div>
@endsection