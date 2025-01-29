<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/Dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('css/abonne.css') }}">
    <title>Article View</title>
</head>
<body>
    <div class="dashboard-container">
        @auth
            @if(Auth::user()->rule == 'Subscriber')
                @include('subscriber.sidebar')
            @elseif(Auth::user()->rule == 'Admin')
                @include('admin.sidebar')
            @elseif(Auth::user()->rule == 'Responsable')
                @include('responsable.sidebar')
            @endif
        @else
            <div class="sidebar" id="sidebar">
                <div class="logo-section">
                    <img src="{{ asset('images/HTLogo.png') }}" alt="Logo" class="logo-img">
                </div>
                <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
                <nav class="nav-menu">
                    <div class="nav-item">
                        <a class="sidebarlink" href="{{ route('home') }}">
                            <svg class="nav-icon" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                            </svg>
                            <span class="nav-text">Accueil</span>
                        </a>
                    </div>
                    <div class="nav-item">
                        <a class="sidebarlink" href="{{ route('login') }}">
                            <svg class="nav-icon" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                            </svg>
                            <span class="nav-text">Login</span>
                        </a>
                    </div>
                </nav>
            </div>
        @endauth

        <div class="main-content">

            <div class="header">
                {{-- a go back ref --}}
                <a href="{{ route('articles') }}" class="back-link">
                    <svg class="nav-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 18l-6-6 6-6"/>
                    </svg>
                </a>
                <h1>{{ $article->title }}</h1>
            </div>
            <div class="article-container">
                <br>
                <div id="articleContent" class="article-content">
                    <p>{!! nl2br(e($article->content)) !!}</p>
                </div>

                @auth
                    <div class="rating-section statistic-item">
                        <h3>Rate this article</h3>
                        <form id="ratingForm" action="{{ route('add_review') }}" method="POST">
                            @csrf
                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <input type="hidden" name="rate" id="ratingInput" value="{{ $rate ?? 0 }}">
                            <div class="stars" id="ratingStars">
                                @for($i = 1; $i <= 5; $i++)
                                    <span class="star {{ $i <= $rate ? 'active' : '' }}" data-rating="{{ $i }}">★</span>
                                @endfor
                            </div>
                            <button type="submit" class="save-btn">Submit Rating</button>
                        </form>
                    </div>
                    <br>
                    <div class="comments-section statistic-item">
                        <h3>Comments</h3>
                        <form class="comment-form" action="{{ route('add_commentaire_article') }}" method="POST">
                            @csrf

                            <input type="hidden" name="article_id" value="{{ $article->id }}">
                            <textarea name="content" id="commentInput" placeholder="Write your comment..." required></textarea>
                            <button type="submit" class="save-btn">Post Comment</button>
                        </form>
                        <div id="commentsList" class="comments-list">
                            @foreach($commentaires as $comment)
                                <div class="comment">
                                    <div class="comment-header">
                                        <span class="comment-author">{{ $comment->user->name }}</span>
                                        <span class="comment-date">{{ $comment->created_at->format('Y-m-d') }}</span>
                                    </div>
                                    <p class="comment-content">{{ $comment->content }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="login-prompt statistic-item">
                        <p>Please <a href="{{ route('login') }}">login</a> to rate and comment on this article.</p>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <script src="{{ asset('js/Dashboard.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.star');
            const ratingInput = document.getElementById('ratingInput');

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = this.getAttribute('data-rating');
                    ratingInput.value = rating;

                    // Update stars visual
                    stars.forEach(s => {
                        if (s.getAttribute('data-rating') <= rating) {
                            s.classList.add('active');
                        } else {
                            s.classList.remove('active');
                        }
                    });
                });

                star.addEventListener('mouseover', function() {
                    const rating = this.getAttribute('data-rating');
                    stars.forEach(s => {
                        if (s.getAttribute('data-rating') <= rating) {
                            s.classList.add('hover');
                        } else {
                            s.classList.remove('hover');
                        }
                    });
                });

                star.addEventListener('mouseout', function() {
                    stars.forEach(s => s.classList.remove('hover'));
                });
            });
        });

        // Flash messages
        //@if(session('status'))
            alert('Action completed successfully!');
        //@endif
    </script>
</body>
</html>
