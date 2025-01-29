<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/Dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/article.css')}}">
    <title>Create Article - Dashboard</title>
</head>
<body>
    <div class="dashboard-container">
        @include('subscriber.sidebar')
        <div class="main-content">
            <div class="header">
                <h1>Create New Article</h1>
            </div>
            <div class="article-container">
                <form id="articleForm" class="article-form" method="Post" action='{{ route('create_article') }}'>
                    @csrf
                    <div class="form-group">
                        <label for="articleTitle">Article Title</label>
                        <input type="text" id="articleTitle" name="title" required>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="articleCategory">Theme</label>
                            <select id="articleCategory" name="theme" required>
                                <option value="" selected disabled>Select a category</option>
                                @foreach ($themes as $theme)
                                <option value="{{$theme->id}}">{{$theme->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="articleVisibility">Visibility</label>
                            <select id="articleVisibility" name="privacy" required>
                                <option value="" selected disabled>Choose visibility</option>
                                <option value="public">Public</option>
                                <option value="private">Private</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="articleContent">Content</label>
                        <textarea id="articleContent" name="content" rows="10" required></textarea>
                    </div>

                    <div class="form-actions">
                        <button type="submit" name="action" value="publish" class="btn primary-btn">Publish Article</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('js/Dashboard.js')}}"></script>
</body>
</html>
