
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="{{asset('css/bouth.css')}}">
    <link rel="stylesheet" href="{{asset('css/Dashboard.css')}}">
</head>
<body>
    <div class="dashboard-container">
        @include('subscriber.sidebar')

    <div class="container">

        <div class="categories-container">
            <header class="categories-header">
                <h1>Categories</h1>
            </header>

            <div class="categories-grid">

                @foreach ($subed_themes as $theme)

                <div class="category-card">
                    <form action="{{ route('unfollow_themes') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" value="{{$theme->id}}" name="theme_id">
                    <div class="category-header">
                        <span class="category-icon">🎨</span>
                        <h2>{{$theme->name}}</h2>
                        <button class="follow-btn following">Following</button>
                    </div>
                    <div class="recent-articles">
                        <h3>Recent Articles</h3>
                        <ul>
                            <li>{{$theme->description}}</li>
                        </ul>
                    </div>
                </form>
                </div>
                @endforeach


                @foreach ($other_themes as $theme )
                <div class="category-card">
                    <form action="{{ route('follow_themes') }}"  method="post">
                    @csrf
                        <input type="hidden" value="{{$theme->id}}" name="theme_id">
                        <div class="category-header">
                            <span class="category-icon">🎨</span>
                            <h2>{{$theme->name}}</h2>
                            <button class="follow-btn ">Follow</button>
                        </div>
                        <div class="recent-articles">
                            <h3>Recent Articles</h3>
                            <ul>
                                <li>{{$theme->description}}</li>
                            </ul>
                        </div>
                    </form>
                </div>
                @endforeach


            </div>

        </div>
    </div>
</div>
    <script src="{{asset('js/bouth.js')}}"></script>
    <script src="{{asset('js/Dashboard.js')}}"></script>
</body>
</html>
