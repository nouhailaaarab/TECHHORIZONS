<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/Dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/abonne.css')}}">

    <title>Article View</title>
</head>
<body>
    <div class="dashboard-container">
        @include('subscriber.sidebar')
        <div class="main-content">
            <div class="header">
                <h1>Article View</h1>
            </div>
            <div class="article-container">
                <div id="articleContent" class="article-content">
                    <h2>Article Title</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        <br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        <br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit

                    </p>
                </div>
                <div class="rating-section statistic-item">
                    <h3>Rate this article</h3>
                    <div class="stars" id="ratingStars">
                        <span class="star" data-rating="1">★</span>
                        <span class="star" data-rating="2">★</span>
                        <span class="star" data-rating="3">★</span>
                        <span class="star" data-rating="4">★</span>
                        <span class="star" data-rating="5">★</span>
                    </div>
                </div>
                <br>
            </div>

            <div class="article-container">
                <div id="articleContent" class="article-content">
                    <h2>Article Title</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        <br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        <br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit

                    </p>
                </div>
                <div class="rating-section statistic-item">
                    <h3>Rate this article</h3>
                    <div class="stars" id="ratingStars">
                        <span class="star" data-rating="1">★</span>
                        <span class="star" data-rating="2">★</span>
                        <span class="star" data-rating="3">★</span>
                        <span class="star" data-rating="4">★</span>
                        <span class="star" data-rating="5">★</span>
                    </div>
                </div>
                <br>
            </div>

            <div class="article-container">
                <div id="articleContent" class="article-content">
                    <h2>Article Title</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        <br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit
                        <br>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit

                    </p>
                </div>
                <div class="rating-section statistic-item">
                    <h3>Rate this article</h3>
                    <div class="stars" id="ratingStars">
                        <span class="star" data-rating="1">★</span>
                        <span class="star" data-rating="2">★</span>
                        <span class="star" data-rating="3">★</span>
                        <span class="star" data-rating="4">★</span>
                        <span class="star" data-rating="5">★</span>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/Dashboard.js') }}"></script>
</body>
</html>
